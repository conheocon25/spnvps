<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class VideoMonk extends Mapper implements \MVC\Domain\VideoMonkFinder {

    function __construct() {
        parent::__construct();
				
		$tblVideoMonk = "chuagiacquang_video_monk";
		$tblVideo = "chuagiacquang_video";
				
		$selectAllStmt = sprintf("select * from %s", $tblVideoMonk);
		$selectStmt = sprintf("select *  from %s where id=?", $tblVideoMonk);
		$updateStmt = sprintf("update %s set id_video=?, id_monk=?, id_category=? where id=?", $tblVideoMonk);
		$insertStmt = sprintf("insert into %s ( id_video, id_monk, id_category) values(?, ?, ?)", $tblVideoMonk);
		$deleteStmt = sprintf("delete from %s where id=?", $tblVideoMonk);
		$findByMonkStmt = sprintf("select *  from %s VM where id_monk=? order by (select time from %s V where V.id=VM.id_video ) DESC", $tblVideoMonk, $tblVideo);	
		$findByCategoryStmt = sprintf("select *  from %s VM where id_category=? order by (select time from %s V where V.id=VM.id_video ) DESC", $tblVideoMonk, $tblVideo);
		
		$findByCategoryLimit10Stmt = sprintf("select *  from %s where id_category=? limit 10", $tblVideoMonk);
		
		$findByTopLocalStmt = sprintf("select *  from %s VM where id_category=1 order by (select time from %s V where V.id=VM.id_video ) DESC limit 8", $tblVideoMonk, $tblVideo);
		$findByTop10Stmt = sprintf("select *  from %s limit 10", $tblVideoMonk);
		$findByUpdateTopStmt = sprintf("select *  from %s VM order by (select time from %s V where V.id=VM.id_video ) DESC limit 24", $tblVideoMonk, $tblVideo);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByMonkStmt = self::$PDO->prepare($findByMonkStmt);
		$this->findByCategoryStmt = self::$PDO->prepare($findByCategoryStmt);
		$this->findByCategoryLimit10Stmt = self::$PDO->prepare($findByCategoryLimit10Stmt);
		
		$this->findByTopLocalStmt = self::$PDO->prepare($findByTopLocalStmt);		
		$this->findByTop10Stmt = self::$PDO->prepare($findByTop10Stmt);
		$this->findByUpdateTopStmt = self::$PDO->prepare($findByUpdateTopStmt);
    } 
    function getCollection( array $raw ) {
        return new VideoMonkCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\VideoMonk(
			$array['id'],			
			$array['id_video'],
			$array['id_monk'],
			$array['id_category']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "VideoMonk";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),
			$object->getIdMonk(),			
			$object->getIdCategory()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),
			$object->getIdMonk(),
			$object->getIdCategory(),
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
	function findByMonk( $values ){
        $this->findByMonkStmt->execute( $values );
        return new VideoMonkCollection( $this->findByMonkStmt->fetchAll(), $this);
    }
	
	function findByCategory( $values ){
        $this->findByCategoryStmt->execute( $values );
        return new VideoMonkCollection( $this->findByCategoryStmt->fetchAll(), $this);
    }
	function findByCategoryLimit10( $values ){
        $this->findByCategoryLimit10Stmt->execute( $values );
        return new VideoMonkCollection( $this->findByCategoryLimit10Stmt->fetchAll(), $this);
    }
	
	function findByTopLocal( $values ){
        $this->findByTopLocalStmt->execute( $values );
        return new VideoMonkCollection( $this->findByTopLocalStmt->fetchAll(), $this);
    }
		
	function findByTop10( $values ){
        $this->findByTop10Stmt->execute( $values );
        return new VideoMonkCollection( $this->findByTop10Stmt->fetchAll(), $this);
    }
	function findByUpdateTop( $values ){
        $this->findByUpdateTopStmt->execute( $values );
        return new VideoMonkCollection( $this->findByUpdateTopStmt->fetchAll(), $this);
    }
}
?>