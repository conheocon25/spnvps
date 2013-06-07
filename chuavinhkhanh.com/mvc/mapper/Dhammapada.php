<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Dhammapada extends Mapper implements \MVC\Domain\DhammapadaFinder {

    function __construct() {
        parent::__construct();
				
		$tblDhammapada = "chuavinhkhanh_dhammapada";
		
		$selectAllStmt = sprintf("select * from %s", $tblDhammapada);
		$selectStmt = sprintf("select *  from %s where id=?", $tblDhammapada);
		$updateStmt = sprintf("update %s set name=?, picture=?, `order`=?, type=? where id=?", $tblDhammapada);
		$insertStmt = sprintf("insert into %s ( name, picture, `order`, type) values(?, ?, ?, ?)", $tblDhammapada);
		$deleteStmt = sprintf("delete from %s where id=?", $tblDhammapada);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		
    } 
    function getCollection( array $raw ) {
        return new DhammapadaCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Dhammapada( 
			$array['id'],
			$array['name_vi'],
			$array['name_en']			
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Dhammapada";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getPicture(),
			$object->getOrder(),
			$object->getType()
		);
		
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getPicture(),
			$object->getOrder(),
			$object->getType(),
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
    function selectAllStmt() {
        return $this->selectAllStmt;
    }
}
?>