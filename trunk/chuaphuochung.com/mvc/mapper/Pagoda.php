<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Pagoda extends Mapper implements \MVC\Domain\PagodaFinder {

    function __construct() {
        parent::__construct();				
		$tblPagoda = "chuaphuochung_pagoda";
				
		$selectAllStmt = sprintf("SELECT * FROM %s", $tblPagoda);
		$selectStmt = sprintf("select * from %s where id=?", $tblPagoda);
		$updateStmt = sprintf("update %s set name=?, address=?, phone=?, website=?, master=?, `key`=? where id=?", $tblPagoda);
		$insertStmt = sprintf("insert into %s (name, address, phone,  website, master, `key`) values(?, ?, ?, ?, ?, ?)", $tblPagoda);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPagoda);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblPagoda);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblPagoda);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    } 
    function getCollection( array $raw ) {return new PagodaCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Pagoda( 
			$array['id'],
			$array['name'],			
			$array['address'],
			$array['phone'],
			$array['website'],
			$array['master'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() {return "Pagoda";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),						
			$object->getAddress(),
			$object->getPhone(),
			$object->getWebsite(),
			$object->getMaster(),
			$object->getKey()
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
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findByKey( $values ) {	
		$this->findByKeyStmt->execute( array($values) );
        $array = $this->findByKeyStmt->fetch();
        $this->findByKeyStmt->closeCursor();
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->doCreateObject( $array );
        return $object;		
    }
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new PagodaCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>