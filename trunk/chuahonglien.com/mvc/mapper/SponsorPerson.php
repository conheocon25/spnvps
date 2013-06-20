<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class SponsorPerson extends Mapper implements \MVC\Domain\SponsorPersonFinder{

    function __construct() {
        parent::__construct();
				
		$tblSponsorPerson = "chuahonglien_sponsor_person";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblSponsorPerson);
		$selectStmt = sprintf("select *  from %s where id=?", $tblSponsorPerson);
		$updateStmt = sprintf("update %s set idsponsor=?, name=?, time=?, address=?, value=?, unit=? where id=?", $tblSponsorPerson);
		$insertStmt = sprintf("insert into %s ( idsponsor, name, time, address, value, unit) values(?, ?, ?, ?, ?, ?)", $tblSponsorPerson);
		$deleteStmt = sprintf("delete from %s where id=?", $tblSponsorPerson);
		$findByStmt = sprintf("select *  from %s where idsponsor=?", $tblSponsorPerson);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		
    } 
    function getCollection( array $raw ) {return new SponsorPersonCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\SponsorPerson(
			$array['id'],
			$array['idsponsor'],
			$array['name'],
			$array['time'],
			$array['address'],
			$array['value'],
			$array['unit']
		);
        return $obj;
    }
    protected function targetClass() {return "SponsorPerson";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdSponsor(),
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
			$object->getIdSponsor(),
			$object->getName(),
			$object->getTime(),
			$object->getAddress(),
			$object->getValue(),
			$object->getUnit(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new SponsorPersonCollection( $this->findByStmt->fetchAll(), $this);
    }
}
?>