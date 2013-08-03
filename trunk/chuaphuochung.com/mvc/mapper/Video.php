<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Video extends Mapper implements \MVC\Domain\VideoFinder {

    function __construct() {
        parent::__construct();
				
		$tblVideo = "chuaphuochung_video";
		
		$selectAllStmt = sprintf("select * from %s order by `count` desc", $tblVideo);
		$selectStmt = sprintf("select *  from %s where id=?", $tblVideo);
		$updateStmt = sprintf("update %s set `name`=?, `url`=?, `note`=?, `count`=?, `time`=?, `key`=? where id=?", $tblVideo);
		$insertStmt = sprintf("insert into %s ( `name`, `url`, `note`, `count`, `key`) values(?, ?, ?, ?, ?)", $tblVideo);
		$deleteStmt = sprintf("delete from %s where id=?", $tblVideo);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblVideo);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);		
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);		
    } 
    function getCollection( array $raw ) {
        return new VideoCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Video(
			$array['id'],			
			$array['name'],
			$array['time'],
			$array['url'],
			$array['note'],
			$array['count'],
			$array['key'] 
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Video";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),
			$object->getURL(),
			$object->getNote(),
			$object->getCount(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),
			$object->getURL(),
			$object->getNote(),
			$object->getCount(),
			$object->getTime(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}
	
	function findByKey( $values ) {	
		$this->findByKeyStmt->execute( array($values) );
        $array = $this->findByKeyStmt->fetch();
        $this->findByKeyStmt->closeCursor();
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->doCreateObject( $array );
        return $object;		
    }
}
?>