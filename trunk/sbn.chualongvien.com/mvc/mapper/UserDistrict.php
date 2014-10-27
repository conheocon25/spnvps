<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class UserDistrict extends Mapper implements \MVC\Domain\UserDistrictFinder {

    function __construct() {
        parent::__construct();
		$tblUserDistrict = "buddhismtv_user_district";
		
		$selectAllStmt = sprintf("select * from %s", $tblUserDistrict);
		$selectStmt = sprintf("select * from %s where id=?", $tblUserDistrict);
		$updateStmt = sprintf("update %s set name=?, email=?, pass=?, gender=?, note=?, datecreate=?, dateupdate=?, dateactivity=?, type=?, code=? where id=?", $tblUserDistrict);
		$insertStmt = sprintf("insert into %s (					
					id_user, 
					id_district,					
				) 
				values(?, ?)", $tblUserDistrict);
		$deleteStmt = sprintf("delete from %s where id=?", $tblUserDistrict);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblUserDistrict);
		
		$checkStmt = sprintf("select distinct id_district from %s where id_user=?", $tblUserDistrict);
						
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->checkStmt = self::$PDO->prepare($checkStmt);		
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);

    } 
    function getCollection( array $raw ) {
        return new UserDistrictCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {		
        $obj = new \MVC\Domain\UserDistrict( 
			$array['id'],  
			$array['id_user'],
			$array['id_District']			
		);
        return $obj;
    }
	
    protected function targetClass() {        
		return "UserDistrict";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdUser(),
			$object->getIdDistrict()
		);		
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdUser(),
			$object->getIdDistrict(),
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
        return new UserDistrictCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>