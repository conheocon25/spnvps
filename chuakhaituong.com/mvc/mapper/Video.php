<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Video extends Mapper implements \MVC\Domain\VideoFinder {

    function __construct() {
        parent::__construct();
				
		$tblVideo = "chuakhaituong_video";
		
		$selectAllStmt = sprintf("select * from %s order by `count` desc", $tblVideo);
		$selectStmt = sprintf("select *  from %s where id=?", $tblVideo);
		$updateStmt = sprintf("update %s set `name`=?, `url`=?, `note`=?, `count`=?, `time`=? where id=?", $tblVideo);
		$insertStmt = sprintf("insert into %s ( `name`, `url`, `note`, `count`) values(?, ?, ?, ?)", $tblVideo);
		$deleteStmt = sprintf("delete from %s where id=?", $tblVideo);
						
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);		
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
			$array['count'] 
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
			$object->getCount()
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
    function selectAllStmt(){
        return $this->selectAllStmt;
    }
}
?>