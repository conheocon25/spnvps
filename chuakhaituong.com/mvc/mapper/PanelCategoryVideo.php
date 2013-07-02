<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PanelCategoryVideo extends Mapper implements \MVC\Domain\PanelCategoryVideoFinder {

    function __construct() {
        parent::__construct();
				
		$tblPanelCategoryVideo = "chuakhaituong_panel_category_video";
		
		$selectAllStmt = sprintf("select * from %s order by `order`", $tblPanelCategoryVideo);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPanelCategoryVideo);
		$updateStmt = sprintf("update %s set name=?, `order`=? where id=?", $tblPanelCategoryVideo);
		$insertStmt = sprintf("insert into %s (name, `order`) values(?, ?)", $tblPanelCategoryVideo);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPanelCategoryVideo);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
    }
	
    function getCollection( array $raw ) {
        return new PanelCategoryVideoCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PanelCategoryVideo( 
			$array['id'],
			$array['name'],
			$array['order']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "PanelCategoryVideo";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getOrder()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getOrder(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
}
?>