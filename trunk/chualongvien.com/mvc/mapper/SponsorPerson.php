<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class SponsorPerson extends Mapper implements \MVC\Domain\SponsorPersonFinder{

    function __construct() {
        parent::__construct();
				
		$tblSponsorPerson = "chualongvien_sponsor_person";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblSponsorPerson);
		$selectStmt = sprintf("select *  from %s where id=?", $tblSponsorPerson);
		$updateStmt = sprintf("update %s set idsponsor=?, name=?, time=?, address=?, value=?, unit=? where id=?", $tblSponsorPerson);
		$insertStmt = sprintf("insert into %s ( idsponsor, name, time, address, value, unit) values(?, ?, ?, ?, ?, ?)", $tblSponsorPerson);
		$deleteStmt = sprintf("delete from %s where id=?", $tblSponsorPerson);
		$findByStmt = sprintf("select *  from %s where idsponsor=?", $tblSponsorPerson);
		$trackByStmt = sprintf("select *  from %s where idsponsor=? and date(time)>=? and date(time)<=?", $tblSponsorPerson);
		$trackBy1Stmt = sprintf("select *  from %s where date(time)>=? and date(time)<=?", $tblSponsorPerson);
		$findByPageStmt = sprintf("
			SELECT *  
			FROM %s 
			WHERE idsponsor=:idsponsor
			LIMIT :start,:max", $tblSponsorPerson
		);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->trackByStmt = self::$PDO->prepare($trackByStmt);
		$this->trackBy1Stmt = self::$PDO->prepare($trackBy1Stmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
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
	function trackBy( $values ){
        $this->trackByStmt->execute( $values );
        return new SponsorPersonCollection( $this->trackByStmt->fetchAll(), $this);
    }
	function trackBy1( $values ){
        $this->trackBy1Stmt->execute( $values );
        return new SponsorPersonCollection( $this->trackBy1Stmt->fetchAll(), $this);
    }
	
	function findByPage( $values ){
		$this->findByPageStmt->bindValue(':idsponsor', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new SponsorPersonCollection( $this->findByPageStmt->fetchAll(), $this);
    }
}
?>