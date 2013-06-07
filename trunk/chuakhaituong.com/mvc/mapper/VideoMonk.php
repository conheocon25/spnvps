<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class VideoMonk extends Mapper implements \MVC\Domain\VideoMonkFinder {

    function __construct() {
        parent::__construct();
				
		$tblVideoMonk = "chuakhaituong_video_monk";
		$tblVideo = "chuakhaituong_video";
		$tblMonk = "chuakhaituong_monk";
		
		$selectAllStmt = sprintf("select * from %s", $tblVideoMonk);
		$selectStmt = sprintf("select *  from %s where id=?", $tblVideoMonk);
		$updateStmt = sprintf("update %s set id_video=?, id_monk=? where id=?", $tblVideoMonk);
		$insertStmt = sprintf("insert into %s ( id_video, id_monk)  values(?, ?)", $tblVideoMonk);
		$deleteStmt = sprintf("delete from %s where id=?", $tblVideoMonk);
		$findByStmt = sprintf("select *  from %s VM where id_monk=? order by (select time from %s V where V.id=VM.id_video ) DESC", $tblVideoMonk, $tblVideo);	
				
		$findByTopLocalStmt = sprintf("select *  from %s VM limit 8", $tblVideoMonk, $tblVideo);
		$findByTop10Stmt = sprintf("select *  from %s limit 10", $tblVideoMonk);
		
		$findByUpdateTopStmt = sprintf("
			select 
				*  
			from 
				%s VM
			where
				id_monk in (select id from %s where btype = ? )
			order by (select time from %s V where V.id=VM.id_video ) 
			DESC limit 24
		", $tblVideoMonk, $tblMonk, $tblVideo);
		
		$findByUpdateTop1Stmt = sprintf("
			select 
				*  
			from 
				%s VM			
			order by (select time from %s V where V.id=VM.id_video ) 
			DESC limit 24
		", $tblVideoMonk, $tblVideo);
		
		$findByViewTopStmt = sprintf("
			select 
				*  
			from 
				%s VM
			where
				id_monk in (select id from %s where btype = ? )
			order by (select count from %s V where V.id=VM.id_video ) 
			DESC limit 24
		", $tblVideoMonk, $tblMonk, $tblVideo);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
				
		$this->findByTopLocalStmt = self::$PDO->prepare($findByTopLocalStmt);		
		$this->findByTop10Stmt = self::$PDO->prepare($findByTop10Stmt);
		
		$this->findByUpdateTopStmt = self::$PDO->prepare($findByUpdateTopStmt);
		$this->findByUpdateTop1Stmt = self::$PDO->prepare($findByUpdateTop1Stmt);
		$this->findByViewTopStmt = self::$PDO->prepare($findByViewTopStmt);
    } 
    function getCollection( array $raw ) {
        return new VideoMonkCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\VideoMonk(
			$array['id'],			
			$array['id_video'],
			$array['id_monk']			
		);
        return $obj;
    }

    protected function targetClass() {        
		return "VideoMonk";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),
			$object->getIdMonk()
		);
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),
			$object->getIdMonk(),			
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
        return new VideoMonkCollection( $this->findByStmt->fetchAll(), $this);
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
	function findByUpdateTop1( $values ){
        $this->findByUpdateTop1Stmt->execute( $values );
        return new VideoMonkCollection( $this->findByUpdateTop1Stmt->fetchAll(), $this);
    }
	
	function findByViewTop( $values ){
        $this->findByViewTopStmt->execute( $values );
        return new VideoMonkCollection( $this->findByViewTopStmt->fetchAll(), $this);
    }
}
?>