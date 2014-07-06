<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class EventVideo extends Mapper implements \MVC\Domain\EventVideoFinder{

    function __construct() {
        parent::__construct();
				
		$tblEventVideo = "buddhismtv_event_video";
		
		$selectAllStmt 		= sprintf("select * from %s ORDER BY id", $tblEventVideo);
		$selectStmt 		= sprintf("select *  from %s where id=?", $tblEventVideo);
		$updateStmt 		= sprintf("update %s set id_pagoda=?, name=?, `date`=?, content=? where id=?", $tblEventVideo);
		$insertStmt 		= sprintf("insert into %s ( id_pagoda, name, `date`, content) values(?, ?, ?, ?)", $tblEventVideo);
		$deleteStmt 		= sprintf("delete from %s where id=?", $tblEventVideo);
		$findByStmt 		= sprintf("select *  from %s where id_event=?", $tblEventVideo);
		$findByPageStmt 	= sprintf("SELECT * FROM  %s WHERE id_event=:id_event LIMIT :start,:max", $tblEventVideo);
						
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new EventVideoCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\EventVideo( 
			$array['id'],
			$array['id_event'],
			$array['name'],
			$array['date_created'],
			$array['date_updated'],
			$array['id_youtube'],
			$array['note'],
			$array['viewed'],
			$array['rated']			
		);
        return $obj;
    }
			
    protected function targetClass() {return "EventVideo";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdPagoda(),
			$object->getName(),
			$object->getDate(),			
			$object->getContent()
		);
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdPagoda(),
			$object->getName(),
			$object->getDate(),			
			$object->getContent(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}	
	
	function findBy( $values ){
		$this->findByStmt->execute($values);
        return new EventVideoCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ) {				
		$this->findByPageStmt->bindValue(':id_event', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new EventVideoCollection( $this->findByPageStmt->fetchAll(), $this );
    }
		
}
?>