<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Linked extends Mapper implements \MVC\Domain\LinkedFinder {

    function __construct() {
        parent::__construct();
				
		$tblLinked = "chuaphuochung_linked";
		
		$selectAllStmt = sprintf("select * from %s", $tblLinked);
		$selectStmt = sprintf("select *  from %s where id=?", $tblLinked);
		$updateStmt = sprintf("update %s set name=?, url=? where id=?", $tblLinked);
		$insertStmt = sprintf("insert into %s ( name, url) values(?, ?)", $tblLinked);
		$deleteStmt = sprintf("delete from %s where id=?", $tblLinked);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		
    } 
    function getCollection( array $raw ) {
        return new LinkedCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Linked( 
			$array['id'],
			$array['name'],
			$array['url']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Linked";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getURL()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getURL(),
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