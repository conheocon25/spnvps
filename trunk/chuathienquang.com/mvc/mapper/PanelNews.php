<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PanelNews extends Mapper implements \MVC\Domain\PanelNewsFinder {

    function __construct() {
        parent::__construct();
				
		$tblPanelNews = "chuathienquang_panel_news";
		
		$selectAllStmt = sprintf("select * from %s", $tblPanelNews);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPanelNews);
		$updateStmt = sprintf("update %s set id_news=? where id=?", $tblPanelNews);
		$insertStmt = sprintf("insert into %s (id_news) values(?)", $tblPanelNews);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPanelNews);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
    }
	
    function getCollection( array $raw ) {
        return new PanelNewsCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PanelNews( 
			$array['id'],
			$array['id_news']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "PanelNews";
    }

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

	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }

    function selectStmt() {
        return $this->selectStmt;
    }
    function selectAllStmt() {
        return $this->selectAllStmt;
    }
}
?>
