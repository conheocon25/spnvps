<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PanelNews extends Mapper implements \MVC\Domain\PanelNewsFinder {

    function __construct() {
        parent::__construct();
				
		$tblPanelNews = "chualongvien_panel_news";
		
		$selectAllStmt = sprintf("select * from %s", $tblPanelNews);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPanelNews);
		$updateStmt = sprintf("update %s set id_news=? where id=?", $tblPanelNews);
		$insertStmt = sprintf("insert into %s (id_news) values(?)", $tblPanelNews);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPanelNews);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblPanelNews);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    }

    function getCollection( array $raw ) {return new PanelNewsCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PanelNews( 
			$array['id'],
			$array['id_news']
		);
        return $obj;
    }
    protected function targetClass() {return "PanelNews";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdNews()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdNews(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new PanelAdsCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>
