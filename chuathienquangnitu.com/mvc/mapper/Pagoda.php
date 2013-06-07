<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Pagoda extends Mapper implements \MVC\Domain\PagodaFinder {

    function __construct() {
        parent::__construct();				
		$tblPagoda = "chuathienquang_pagoda";
				
		$selectAllStmt = sprintf("SELECT * FROM %s", $tblPagoda);
		$selectStmt = sprintf("select * from %s where id=?", $tblPagoda);
		$updateStmt = sprintf("update %s set name=?, address=?, phone=?, website=?, master=? where id=?", $tblPagoda);
		$insertStmt = sprintf("insert into %s (name, address, phone,  website, master) values(?, ?, ?, ?, ?)", $tblPagoda);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPagoda);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		
    } 
    function getCollection( array $raw ) {
        return new PagodaCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Pagoda( 
			$array['id'],
			$array['name'],			
			$array['address'],
			$array['phone'],
			$array['website'],
			$array['master']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Pagoda";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),						
			$object->getAddress(),
			$object->getPhone(),
			$object->getWebsite(),
			$object->getMaster()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(			
			$object->getName(),			
			$object->getAddress(),
			$object->getPhone(),
			$object->getWebsite(),
			$object->getMaster(),
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