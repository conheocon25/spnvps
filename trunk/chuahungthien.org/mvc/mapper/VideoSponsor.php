<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class VideoSponsor extends Mapper implements \MVC\Domain\VideoSponsorFinder {

    function __construct() {
        parent::__construct();
				
		$tblVideoSponsor = "chuahungthien_video_sponsor";
				
		$selectAllStmt = sprintf("select * from %s", $tblVideoSponsor);
		$selectStmt = sprintf("select *  from %s where id=?", $tblVideoSponsor);
		$updateStmt = sprintf("update %s set id_video=?, id_sponsor=? where id=?", $tblVideoSponsor);
		$insertStmt = sprintf("insert into %s ( id_video, id_sponsor) values(?, ?)", $tblVideoSponsor);
		$deleteStmt = sprintf("delete from %s where id=?", $tblVideoSponsor);
		$findByStmt = sprintf("select *  from %s where id_sponsor=?", $tblVideoSponsor);
		$findByPageStmt = sprintf("
			SELECT *  
			FROM %s 
			WHERE id_sponsor=:id_sponsor
			LIMIT :start,:max", $tblVideoSponsor
		);
								
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    } 
    function getCollection( array $raw ) {
        return new VideoSponsorCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\VideoSponsor(
			$array['id'],			
			$array['id_video'],
			$array['id_sponsor']			
		);
        return $obj;
    }

    protected function targetClass() {        
		return "VideoSponsor";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),
			$object->getIdSponsor()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),
			$object->getIdSponsor(),
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
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new VideoSponsorCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ){
		$this->findByPageStmt->bindValue(':id_sponsor', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new VideoSponsorCollection( $this->findByPageStmt->fetchAll(), $this);
    }
	
}
?>