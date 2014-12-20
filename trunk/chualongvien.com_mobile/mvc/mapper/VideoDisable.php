<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class VideoDisable extends Mapper implements \MVC\Domain\VideoDisableFinder {

    function __construct() {
        parent::__construct();
				
		$tblVideoDisable = "chualongvien_video_disable";
		$tblVideo = "chualongvien_video";
				
		$selectAllStmt 			= sprintf("select * from %s", $tblVideoDisable);
		$selectStmt 			= sprintf("select *  from %s where id=?", $tblVideoDisable);
		$updateStmt 			= sprintf("update %s set id_video=? where id=?", $tblVideoDisable);
		$insertStmt 			= sprintf("insert into %s ( id_video)  values(?)", $tblVideoDisable);
		$deleteStmt 			= sprintf("delete from %s where id=?", $tblVideoDisable);
				
        $this->selectAllStmt 		= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 			= self::$PDO->prepare($selectStmt);
        $this->updateStmt 			= self::$PDO->prepare($updateStmt);
        $this->insertStmt 			= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 			= self::$PDO->prepare($deleteStmt);		
    } 
	
    function getCollection( array $raw ) {return new VideoDisableCollection( $raw, $this );}
    protected function doCreateObject( array $array ){
        $obj = new \MVC\Domain\VideoDisable(
			$array['id'],
			$array['id_video']
		);
        return $obj;
    }

    protected function targetClass(){return "VideoDisable";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo()			
		);
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),			
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}
}
?>