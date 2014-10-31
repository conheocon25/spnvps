<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PVideo extends Mapper implements \MVC\Domain\PVideoFinder {

    function __construct() {
        parent::__construct();
				
		$tblPVideo = "buddhismtv_pvideo";
		
		$selectAllStmt = sprintf("select * from %s order by `count` desc", $tblPVideo);
		$selectStmt 	= sprintf("select *  from %s where id=?", $tblPVideo);
		$updateStmt 	= sprintf("update %s set id_pagoda=?, `name`=?, `url`=?, `note`=?, `count`=?, `time`=?, `key`=? where id=?", $tblPVideo);
		$insertStmt 	= sprintf("insert into %s ( id_pagoda, `name`, `url`, `note`, `count`, `key`) values(?, ?, ?, ?, ?, ?)", $tblPVideo);
		$deleteStmt 	= sprintf("delete from %s where id=?", $tblPVideo);
		$findByKeyStmt 	= sprintf("select *  from %s where `key`=?", $tblPVideo);
		$findByStmt 	= sprintf("select *  from %s where id_pagoda=?", $tblPVideo);
		$findByTop8Stmt = sprintf("select *  from %s order by `time` DESC limit 16", $tblPVideo);
		
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);		
		$this->findByKeyStmt 	= self::$PDO->prepare($findByKeyStmt);		
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);		
		$this->findByTop8Stmt 	= self::$PDO->prepare($findByTop8Stmt);
    }
	
    function getCollection( array $raw ) {return new PVideoCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PVideo(
			$array['id'],
			$array['id_pagoda'],
			$array['name'],
			$array['time'],
			$array['url'],
			$array['note'],
			$array['count'],
			$array['key'] 
		);
        return $obj;
    }

    protected function targetClass() {return "PVideo";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 		
			$object->getIdPagoda(),
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
			$object->getIdPagoda(),
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
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new PVideoCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByTop8( $values ){
        $this->findByTop8Stmt->execute( $values );
        return new PVideoCollection( $this->findByTop8Stmt->fetchAll(), $this);
    }
	
}
?>