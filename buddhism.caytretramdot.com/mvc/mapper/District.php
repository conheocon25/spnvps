<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class District extends Mapper implements \MVC\Domain\DistrictFinder{

    function __construct() {
        parent::__construct();
				
		$tblDistrict = "buddhismtv_district";
		
		$selectAllStmt 		= sprintf("select * from %s ORDER BY id", $tblDistrict);
		$selectStmt 		= sprintf("select *  from %s where id=?", $tblDistrict);
		$updateStmt 		= sprintf("update %s set name=?, address=?, latitude=?, longitude=? where id=?", $tblDistrict);
		$insertStmt 		= sprintf("insert into %s ( name, address, latitude, longitude) values(?, ?, ?, ?)", $tblDistrict);
		$deleteStmt 		= sprintf("delete from %s where id=?", $tblDistrict);		
		$findByPageStmt 	= sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblDistrict);
						
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);		
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);		
    }
	
    function getCollection( array $raw ) {return new DistrictCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\District( 
			$array['id'],
			$array['id_province'],
			$array['name'],			
			$array['latitude'],
			$array['longitude']
		);
        return $obj;
    }

    protected function targetClass() {return "District";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdProvince(),
			$object->getName(),			
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
			$object->getName(),			
			$object->getLatitude(),
			$object->getLongitude(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}	
			
	function findByPage( $values ) {
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new DistrictCollection( $this->findByPageStmt->fetchAll(), $this );
    }	
}
?>