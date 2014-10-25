<?php
namespace MVC\Mapper;
use MVC\Library\Encrypted;
require_once( "mvc/base/Mapper.php" );
class UserProvince extends Mapper implements \MVC\Domain\UserProvinceFinder {

    function __construct() {
        parent::__construct();
		$tblUserProvince = "buddhismtv_user_province";
		
		$selectAllStmt = sprintf("select * from %s", $tblUserProvince);
		$selectStmt = sprintf("select * from %s where id=?", $tblUserProvince);
		$updateStmt = sprintf("update %s set name=?, email=?, pass=?, gender=?, note=?, datecreate=?, dateupdate=?, dateactivity=?, type=?, code=? where id=?", $tblUserProvince);
		$insertStmt = sprintf("insert into %s (					
					id_user, 
					id_province,					
				) 
				values(?, ?)", $tblUserProvince);
		$deleteStmt = sprintf("delete from %s where id=?", $tblUserProvince);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblUserProvince);
		
		$checkStmt = sprintf("select distinct id_province from %s where id_user=?", $tblUserProvince);
						
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->checkStmt = self::$PDO->prepare($checkStmt);		
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);

    } 
    function getCollection( array $raw ) {
        return new UserProvinceCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {		
        $obj = new \MVC\Domain\UserProvince( 
			$array['id'],  
			$array['id_user'],
			$array['id_province']			
		);
        return $obj;
    }
	
    protected function targetClass() {        
		return "UserProvince";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdUser(),
			$object->getIdProvince()
		);		
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdUser(),
			$object->getIdProvince(),
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
        return new UserProvinceCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>