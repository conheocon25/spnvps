<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Monk extends Mapper implements \MVC\Domain\MonkFinder {

    function __construct() {
        parent::__construct();
				
		$tblMonk = "chuagiacquang_monk";
		$tblVideo = "chuagiacquang_video_monk";
		
		$selectAllStmt = sprintf("
			SELECT * FROM %s M
			ORDER BY 
			type DESC, (SELECT count(*) FROM %s V WHERE M.id=V.id_monk ) DESC
		", $tblMonk, $tblVideo);
		$selectStmt = sprintf("select * from %s where id=?", $tblMonk);
		$updateStmt = sprintf("update %s set pre_name=?, name=?, pagoda=?, phone=?, note=?, type=? where id=?", $tblMonk);
		$insertStmt = sprintf("insert into %s (pre_name, name, pagoda, phone, note, type) values(?, ?, ?, ?, ?, ?)", $tblMonk);
		$deleteStmt = sprintf("delete from %s where id=?", $tblMonk);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		
    } 
    function getCollection( array $raw ) {
        return new MonkCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Monk( 
			$array['id'],
			$array['pre_name'],
			$array['name'],
			$array['pagoda'],
			$array['phone'],
			$array['note'],
			$array['type']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Monk";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getPreName(),
			$object->getName(),
			$object->getPagoda(),
			$object->getPhone(),
			$object->getNote(),
			$object->getType()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getPreName(),
			$object->getName(),
			$object->getPagoda(),
			$object->getPhone(),
			$object->getNote(),
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