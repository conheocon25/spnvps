<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Pagoda extends Mapper implements \MVC\Domain\PagodaFinder{

    function __construct() {
        parent::__construct();
				
		$tblPagoda = "buddhismtv_pagoda";
		
		$selectAllStmt 		= sprintf("select * from %s ORDER BY id", $tblPagoda);
		$selectStmt 		= sprintf("select *  from %s where id=?", $tblPagoda);
		$updateStmt 		= sprintf("update %s set name=?, address=?, latitude=?, longitude=? where id=?", $tblPagoda);
		$insertStmt 		= sprintf("insert into %s ( name, address, latitude, longitude) values(?, ?, ?, ?)", $tblPagoda);
		$deleteStmt 		= sprintf("delete from %s where id=?", $tblPagoda);
		$findByKeyStmt 		= sprintf("select *  from %s where `key`=?", $tblPagoda);
		$findByPageStmt 	= sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblPagoda);		
		$findByPart1Stmt 	= sprintf("SELECT * FROM  %s WHERE id<=3", $tblPagoda);
				
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByKeyStmt 	= self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);
		$this->findByPart1Stmt 	= self::$PDO->prepare($findByPart1Stmt);
    }
	
    function getCollection( array $raw ) {return new PagodaCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Pagoda( 
			$array['id'],
			$array['name'],
			$array['address'],
			$array['latitude'],
			$array['longitude']
		);
        return $obj;
    }

    protected function targetClass() {return "Pagoda";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getAddress(),
			$object->getLatitude(),
			$object->getLongitude()
		);
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getAddress(),
			$object->getLatitude(),
			$object->getLongitude(),
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
        return new PagodaCollection( $this->findByPageStmt->fetchAll(), $this );
    }
		
}
?>