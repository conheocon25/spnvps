<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class SponsorPaid extends Mapper implements \MVC\Domain\SponsorPaidFinder{

    function __construct() {
        parent::__construct();
				
		$tblSponsorPaid = "chuahonglien_sponsor_paid";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblSponsorPaid);
		$selectStmt = sprintf("select *  from %s where id=?", $tblSponsorPaid);
		$updateStmt = sprintf("update %s set idsponsor=?, time=?, value=?, unit=?, note=? where id=?", $tblSponsorPaid);
		$insertStmt = sprintf("insert into %s ( idsponsor, time, value, unit, note) values(?, ?, ?, ?, ?)", $tblSponsorPaid);
		$deleteStmt = sprintf("delete from %s where id=?", $tblSponsorPaid);
		$findByStmt = sprintf("select *  from %s where idsponsor=?", $tblSponsorPaid);
		$trackByStmt = sprintf("select *  from %s where idsponsor=? and date(time)>=? and date(time)<=?", $tblSponsorPaid);
		$trackBy1Stmt = sprintf("select *  from %s where date(time)>=? and date(time)<=?", $tblSponsorPaid);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->trackByStmt = self::$PDO->prepare($trackByStmt);
		$this->trackBy1Stmt = self::$PDO->prepare($trackBy1Stmt);
    } 
    function getCollection( array $raw ) {return new SponsorPaidCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\SponsorPaid(
			$array['id'],
			$array['idsponsor'],
			$array['time'],
			$array['value'],
			$array['unit'],
			$array['note']
		);
        return $obj;
    }
    protected function targetClass() {return "SponsorPaid";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdSponsor(),
			$object->getTime(),
			$object->getValue(),
			$object->getUnit(),
			$object->getNote()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdSponsor(),
			$object->getTime(),
			$object->getValue(),
			$object->getUnit(),
			$object->getNote(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new SponsorPaidCollection( $this->findByStmt->fetchAll(), $this);
    }
	function trackBy( $values ){
        $this->trackByStmt->execute( $values );
        return new SponsorPaidCollection( $this->trackByStmt->fetchAll(), $this);
    }
	function trackBy1( $values ){
        $this->trackBy1Stmt->execute( $values );
        return new SponsorPaidCollection( $this->trackBy1Stmt->fetchAll(), $this);
    }
}
?>