<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class SponsorPerson extends Mapper implements \MVC\Domain\SponsorPersonFinder{

    function __construct() {
        parent::__construct();
				
		$tblSponsorPerson = "chuathienquang_sponsor_person";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblSponsorPerson);
		$selectStmt = sprintf("select *  from %s where id=?", $tblSponsorPerson);
		$updateStmt = sprintf("update %s set name=?, time=?, address=?, value=?, unit=? where id=?", $tblSponsorPerson);
		$insertStmt = sprintf("insert into %s ( name, time, address, value, unit) values(?, ?, ?, ?, ?)", $tblSponsorPerson);
		$deleteStmt = sprintf("delete from %s where id=?", $tblSponsorPerson);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		
    } 
    function getCollection( array $raw ) {
        return new SponsorPersonCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\SponsorPerson(
			$array['id'],
			$array['name'],
			$array['time'],
			$array['address'],
			$array['value'],
			$array['unit']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "SponsorPerson";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getName(),
			$object->getTime(),
			$object->getAddress(),
			$object->getValue(),
			$object->getUnit()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getTime(),
			$object->getAddress(),
			$object->getValue(),
			$object->getUnit(),
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
    function selectAllStmt(){
        return $this->selectAllStmt;
    }
	
}
?>