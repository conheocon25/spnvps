<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class Monk extends Mapper implements \MVC\Domain\MonkFinder {

    function __construct() {
        parent::__construct();
				
		$tblMonk = "buddhismtv_monk";
				
		$selectAllStmt = sprintf("
			SELECT * FROM %s M
			ORDER BY name			
		", $tblMonk);
			
		$selectStmt = sprintf("select * from %s where id=?", $tblMonk);
		$updateStmt = sprintf("update %s set pre_name=?, name=?, pagoda=?, phone=?, note=?, type=?, btype=?, url_pic=?, `key`=? where id=?", $tblMonk);
		$insertStmt = sprintf("insert into %s (pre_name, name, pagoda, phone, note, type, btype, url_pic, `key`) values(?, ?, ?, ?, ?, ?, ?, ?, ?)", $tblMonk);
		$deleteStmt = sprintf("delete from %s where id=?", $tblMonk);		
		$findByPageStmt = sprintf("SELECT * FROM  %s ORDER BY name LIMIT :start,:max", $tblMonk);		
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);				
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		
    } 
    function getCollection( array $raw ) {return new MonkCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Monk( 
			$array['id'],		
			$array['name'],
			$array['alias'],
			$array['birthday'],
			$array['note'],
			$array['picture'],
			$array['viewed'],
			$array['rated']			
		);
        return $obj;
    }
    protected function targetClass() { return "Monk";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),
			$object->getAlias(),
			$object->getBirthday(),
			$object->getNote(),
			$object->getPicture(),
			$object->getViewed(),
			$object->getRated()			
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getName(),
			$object->getAlias(),
			$object->getBirthday(),
			$object->getNote(),
			$object->getPicture(),
			$object->getViewed(),
			$object->getRated(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
		
	function findByPage( $values ){
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new MonkCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>