<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Pagoda extends Mapper implements \MVC\Domain\PagodaFinder{

    function __construct() {
        parent::__construct();
				
		$tblPagoda = "buddhismtv_pagoda";
		
		$selectAllStmt 		= sprintf("select * from %s ORDER BY id", $tblPagoda);
		$selectStmt 		= sprintf("select *  from %s where id=?", $tblPagoda);
		$updateStmt 		= sprintf("update %s set id_province=?, id_district=?, name=?, address=?, latitude=?, longitude=? where id=?", $tblPagoda);
		$insertStmt 		= sprintf("insert into %s ( id_province, id_district, name, address, latitude, longitude) values(?, ?, ?, ?, ?, ?)", $tblPagoda);
		$deleteStmt 		= sprintf("delete from %s where id=?", $tblPagoda);
		$findByStmt 		= sprintf("select *  from %s where id_province=?", $tblPagoda);
		$findByPageStmt 	= sprintf("SELECT * FROM  %s where id_province=:id_province LIMIT :start,:max", $tblPagoda);
		$findByPage1Stmt 	= sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblPagoda);
						
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);		
		$this->findByPage1Stmt 	= self::$PDO->prepare($findByPage1Stmt);
    }
	
    function getCollection( array $raw ) {return new PagodaCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Pagoda( 
			$array['id'],
			$array['id_province'],
			$array['id_district'],
			$array['id_monk'],
			$array['name'],
			$array['address'],
			$array['phone'],
			$array['email'],
			$array['website'],
			$array['latitude'],
			$array['longitude']
		);
        return $obj;
    }

    protected function targetClass() {return "Pagoda";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdProvince(),
			$object->getIdDistrict(),
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
			$object->getIdProvince(),
			$object->getIdDistrict(),
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
	
	function findBy( $values ){
		$this->findByStmt->execute($values);
        return new PagodaCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ) {				
		$this->findByPageStmt->bindValue(':id_province', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new PagodaCollection( $this->findByPageStmt->fetchAll(), $this );
    }
	
	function findByPage1( $values ) {		
		$this->findByPage1Stmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPage1Stmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPage1Stmt->execute();
        return new PagodaCollection( $this->findByPage1Stmt->fetchAll(), $this );
    }
		
}
?>