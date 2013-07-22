<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class CategoryVideo extends Mapper implements \MVC\Domain\CategoryVideoFinder {

    function __construct() {
        parent::__construct();
				
		$tblCategory = "chuahonglien_category_video";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY type DESC, `order` DESC", $tblCategory);
		$selectStmt = sprintf("select *  from %s where id=?", $tblCategory);
		$updateStmt = sprintf("update %s set name=?, picture=?, `order`=?, type=?, btype=? where id=?", $tblCategory);
		$insertStmt = sprintf("insert into %s ( name, picture, `order`, type, btype) values(?, ?, ?, ?, ?)", $tblCategory);
		$deleteStmt = sprintf("delete from %s where id=?", $tblCategory);		
		$findByBTypeStmt = sprintf("select * from %s where btype=?", $tblCategory);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByBTypeStmt = self::$PDO->prepare($findByBTypeStmt);
		
    } 
    function getCollection( array $raw ) {
        return new CategoryVideoCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\CategoryVideo( 
			$array['id'],
			$array['name'],
			$array['picture'],
			$array['order'],
			$array['type'],
			$array['btype']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "CategoryVideo";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getPicture(),
			$object->getOrder(),
			$object->getType(),
			$object->getBType()
		);
		
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getPicture(),
			$object->getOrder(),
			$object->getType(),
			$object->getBType(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	function findByBType( $values ){		
		$this->findByBTypeStmt->execute($values);
        return new CategoryVideoCollection( $this->findByBTypeStmt->fetchAll(), $this);
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