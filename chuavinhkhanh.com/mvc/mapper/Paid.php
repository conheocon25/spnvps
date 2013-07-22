<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class Paid extends Mapper implements \MVC\Domain\PaidFinder{

    function __construct() {
        parent::__construct();
				
		$tblPaid = "chuavinhkhanh_paid";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY date", $tblPaid);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPaid);
		$updateStmt = sprintf("update %s set id_category=?, date=?, description=?, value=? where id=?", $tblPaid);
		$insertStmt = sprintf("insert into %s ( id_category, date, description, value) values(?, ?, ?, ?)", $tblPaid);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPaid);
		$findByStmt = sprintf("select *  from %s where id_category=? order by date", $tblPaid);
		$findByTrackingStmt = sprintf("select *  from %s where date>=? and date<=? order by date", $tblPaid);
						
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByTrackingStmt = self::$PDO->prepare($findByTrackingStmt);
		
	}	
    function getCollection( array $raw ){return new PaidCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Paid( 
			$array['id'],
			$array['id_category'],
			$array['date'],						
			$array['description'],
			$array['value']
		);
        return $obj;
    }

    protected function targetClass() {return "Paid";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdCategory(),			
			$object->getDate(),			
			$object->getDescription(),
			$object->getValue()
		);
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdCategory(),
			$object->getDate(),			
			$object->getDescription(),
			$object->getValue(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}	
	function findBy( $values ){$this->findByStmt->execute( $values );return new PaidCollection( $this->findByStmt->fetchAll(), $this);}
	function findByTracking( $values ){$this->findByTrackingStmt->execute( $values );return new PaidCollection( $this->findByTrackingStmt->fetchAll(), $this);}
}
?>