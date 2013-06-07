<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PanelAds extends Mapper implements \MVC\Domain\PanelAdsFinder {

    function __construct() {
        parent::__construct();
				
		$tblPanelAds = "chuavinhkhanh_panel_ads";
		
		$selectAllStmt = sprintf("select * from %s", $tblPanelAds);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPanelAds);
		$updateStmt = sprintf("update %s set id_news=? where id=?", $tblPanelAds);
		$insertStmt = sprintf("insert into %s (id_news) values(?)", $tblPanelAds);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPanelAds);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
    }
	
    function getCollection( array $raw ) {
        return new PanelAdsCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PanelAds( 
			$array['id'],
			$array['id_news']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "PanelAds";
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
