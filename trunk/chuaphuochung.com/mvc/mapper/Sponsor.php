<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class Sponsor extends Mapper implements \MVC\Domain\SponsorFinder{
    function __construct() {
        parent::__construct();
				
		$tblSponsor = "chuaphuochung_sponsor";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time_start DESC", $tblSponsor);
		$selectStmt = sprintf("select *  from %s where id=?", $tblSponsor);
		$updateStmt = sprintf("update %s set name=?, time_start=?, time_end=?, content=?, type=?, `key`=? where id=?", $tblSponsor);
		$insertStmt = sprintf("insert into %s ( name, time_start, time_end, content, type, `key`) values(?, ?, ?, ?, ?, ?)", $tblSponsor);
		$deleteStmt = sprintf("delete from %s where id=?", $tblSponsor);
		$findByPageStmt = sprintf("SELECT * FROM  %s ORDER BY type DESC LIMIT :start,:max", $tblSponsor);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new SponsorCollection( $raw, $this );}
    protected function doCreateObject( array $array ){
        $obj = new \MVC\Domain\Sponsor(
			$array['id'],
			$array['name'],
			$array['time_start'],
			$array['time_end'],
			$array['content'],
			$array['type'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() {return "Sponsor";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getName(),
			$object->getTimeStart(),
			$object->getTimeEnd(),
			$object->getContent(),
			$object->getType(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getName(),
			$object->getTimeStart(),
			$object->getTimeEnd(),
			$object->getContent(),
			$object->getType(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}	
	
	function findByPage( $values ){
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new SponsorCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>