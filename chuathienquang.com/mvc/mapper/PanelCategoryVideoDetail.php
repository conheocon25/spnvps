<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PanelCategoryVideoDetail extends Mapper implements \MVC\Domain\PanelCategoryVideoDetailFinder {

    function __construct() {
        parent::__construct();
				
		$tblPanelCategoryVideoDetail = "chuathienquang_panel_category_video_detail";
		
		$selectAllStmt = sprintf("select * from %s order by `order`", $tblPanelCategoryVideoDetail);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPanelCategoryVideoDetail);
		$updateStmt = sprintf("update %s set id_category=?, id_category_video=?, `order`=? where id=?", $tblPanelCategoryVideoDetail);
		$insertStmt = sprintf("insert into %s (id_category, id_category_video, `order`) values(?, ?, ?)", $tblPanelCategoryVideoDetail);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPanelCategoryVideoDetail);
		$findByStmt = sprintf("select *  from %s where id_category=? order by `order`", $tblPanelCategoryVideoDetail);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
    }
	
    function getCollection( array $raw ) {
        return new PanelCategoryVideoDetailCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PanelCategoryVideoDetail( 
			$array['id'],
			$array['id_category'],
			$array['id_category_video'],
			$array['order']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "PanelCategoryVideoDetail";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getIdCategoryVideo(),
			$object->getOrder()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ){
        $values = array(
			$object->getIdCategory(),
			$object->getIdCategoryVideo(),
			$object->getOrder(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new PanelCategoryVideoDetailCollection( $this->findByStmt->fetchAll(), $this);
    }
}
?>