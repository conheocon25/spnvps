<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class CategoryNews extends Mapper implements \MVC\Domain\CategoryNewsFinder {

    function __construct() {
        parent::__construct();
				
		$tblCategory = "chuahonglien_category_news";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY `order`", $tblCategory);
		$selectStmt = sprintf("select *  from %s where id=?", $tblCategory);
		$updateStmt = sprintf("update %s set name=?, `order`=? where id=?", $tblCategory);
		$insertStmt = sprintf("insert into %s ( name, `order`) values(?, ?)", $tblCategory);
		$deleteStmt = sprintf("delete from %s where id=?", $tblCategory);		
		$findByAllStmt = sprintf("select * from %s where id>=10 ORDER BY `order`", $tblCategory);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByAllStmt = self::$PDO->prepare($findByAllStmt);
		
    } 
    function getCollection( array $raw ) {
        return new CategoryNewsCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\CategoryNews( 
			$array['id'],
			$array['name'],
			$array['order']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "CategoryNews";
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
		
	function findByAll( $values ){
        $this->findByAllStmt->execute( $values );
        return new CategoryNewsCollection( $this->findByAllStmt->fetchAll(), $this);
    }
	
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
}
?>