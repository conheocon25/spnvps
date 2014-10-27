<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class UserPagoda extends Mapper implements \MVC\Domain\UserPagodaFinder {

    function __construct() {
        parent::__construct();
		$tblUserPagoda = "buddhismtv_user_pagoda";
		
		$selectAllStmt = sprintf("select * from %s", $tblUserPagoda);
		$selectStmt = sprintf("select * from %s where id=?", $tblUserPagoda);
		$updateStmt = sprintf("update %s set name=?, email=?, pass=?, gender=?, note=?, datecreate=?, dateupdate=?, dateactivity=?, type=?, code=? where id=?", $tblUserPagoda);
		$insertStmt = sprintf("insert into %s (					
					id_user, 
					id_Pagoda,					
				) 
				values(?, ?)", $tblUserPagoda);
		$deleteStmt = sprintf("delete from %s where id=?", $tblUserPagoda);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblUserPagoda);
		
		$checkStmt = sprintf("select distinct id_pagoda from %s where id_user=?", $tblUserPagoda);
						
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->checkStmt = self::$PDO->prepare($checkStmt);		
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);

    } 
    function getCollection( array $raw ) {
        return new UserPagodaCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {		
        $obj = new \MVC\Domain\UserPagoda( 
			$array['id'],  
			$array['id_user'],
			$array['id_Pagoda']			
		);
        return $obj;
    }
	
    protected function targetClass() {        
		return "UserPagoda";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdUser(),
			$object->getIdPagoda()
		);		
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdUser(),
			$object->getIdPagoda(),
			$object->getId()
		);		
        $this->updateStmt->execute( $values );
    }
	
	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }
	
    function selectStmt() {return $this->selectStmt;}	
    function selectAllStmt() {return $this->selectAllStmt;}
		
	function check($IdUser) {
        $this->checkStmt->execute( array($IdUser) );
        $result = $this->checkStmt->fetchAll();			
		return @$result[0][0];
    }
		
	
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new UserPagodaCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>