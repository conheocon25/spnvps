<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class PAlbum extends Mapper implements \MVC\Domain\PAlbumFinder {

    function __construct() {
        parent::__construct();
		$tblPAlbum = "buddhismtv_palbum";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblPAlbum);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPAlbum);
		$updateStmt = sprintf("update %s set id_pagoda=?, name=?, url=?, note=?, time=?, `key`=? where id=?", $tblPAlbum);
		$insertStmt = sprintf("insert into %s ( id_pagoda, name, url, note, `key`) values(?, ?, ?, ?, ?)", $tblPAlbum);
		$deleteStmt = sprintf("delete from %s WHERE id=?", $tblPAlbum);
		$findByKeyStmt = sprintf("select *  from %s WHERE `key`=?", $tblPAlbum);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblPAlbum);
		$findByStmt 	= sprintf("SELECT * FROM  %s WHERE id_pagoda=?", $tblPAlbum);
		
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByKeyStmt 	= self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);
    } 
    function getCollection( array $raw ) {return new PAlbumCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PAlbum(
			$array['id'],
			$array['id_pagoda'],
			$array['name'],
			$array['time'],
			$array['url'],
			$array['note'],
			$array['key'] 
		);
        return $obj;
    }

    protected function targetClass(){return "PAlbum";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdPagoda(),
			$object->getName(),
			$object->getURL(),
			$object->getNote(),
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
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new PAlbumCollection( $this->findByPageStmt->fetchAll(), $this );
    }
	
	function findBy( $values ){		
        $this->findByStmt->execute( $values );
        return new PAlbumCollection( $this->findByStmt->fetchAll(), $this);
    }
}
?>