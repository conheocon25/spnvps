<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class EventMP3 extends Mapper implements \MVC\Domain\EventMP3Finder{

    function __construct() {
        parent::__construct();
				
		$tblEventMP3 = "buddhismtv_event_mp3";
		
		$selectAllStmt 		= sprintf("select * from %s ORDER BY id", $tblEventMP3);
		$selectStmt 		= sprintf("select *  from %s where id=?", $tblEventMP3);
		$updateStmt 		= sprintf("update %s set id_pagoda=?, name=?, `date`=?, content=? where id=?", $tblEventMP3);
		$insertStmt 		= sprintf("insert into %s ( id_pagoda, name, `date`, content) values(?, ?, ?, ?)", $tblEventMP3);
		$deleteStmt 		= sprintf("delete from %s where id=?", $tblEventMP3);
		$findByStmt 		= sprintf("select *  from %s where id_pagoda=?", $tblEventMP3);
		$findByPageStmt 	= sprintf("SELECT * FROM  %s WHERE id_pagoda=:id_pagoda LIMIT :start,:max", $tblEventMP3);
						
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new EventMP3Collection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\EventMP3( 
			$array['id'],
			$array['id_event'],
			$array['name'],
			$array['date_created'],
			$array['date_updated'],
			$array['id_mp3'],
			$array['note'],
			$array['viewed'],
			$array['rated']			
		);
        return $obj;
    }
			
    protected function targetClass() {return "EventMP3";}
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
        return new EventMP3Collection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ) {				
		$this->findByPageStmt->bindValue(':id_pagoda', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new EventMP3Collection( $this->findByPageStmt->fetchAll(), $this );
    }
		
}
?>