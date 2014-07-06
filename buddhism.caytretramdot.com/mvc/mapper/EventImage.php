<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class EventImage extends Mapper implements \MVC\Domain\EventImageFinder{

    function __construct() {
        parent::__construct();
				
		$tblEventImage = "buddhismtv_event_image";
		
		$selectAllStmt 		= sprintf("select * from %s ORDER BY id", $tblEventImage);
		$selectStmt 		= sprintf("select *  from %s where id=?", $tblEventImage);
		$updateStmt 		= sprintf("update %s set id_pagoda=?, name=?, `date`=?, content=? where id=?", $tblEventImage);
		$insertStmt 		= sprintf("insert into %s ( id_pagoda, name, `date`, content) values(?, ?, ?, ?)", $tblEventImage);
		$deleteStmt 		= sprintf("delete from %s where id=?", $tblEventImage);
		$findByStmt 		= sprintf("select *  from %s where id_event=?", $tblEventImage);
		$findByPageStmt 	= sprintf("SELECT * FROM  %s WHERE id_event=:id_event LIMIT :start,:max", $tblEventImage);
						
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new EventImageCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\EventImage( 
			$array['id'],
			$array['id_event'],
			$array['name'],
			$array['date_created'],
			$array['date_updated'],
			$array['id_image'],
			$array['note'],
			$array['viewed'],
			$array['rated']			
		);
        return $obj;
    }
			
    protected function targetClass() {return "EventImage";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getContent()
		);
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(			
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}	
	
	function findBy( $values ){
		$this->findByStmt->execute($values);
        return new EventImageCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ) {				
		$this->findByPageStmt->bindValue(':id_event', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new EventImageCollection( $this->findByPageStmt->fetchAll(), $this );
    }
		
}
?>