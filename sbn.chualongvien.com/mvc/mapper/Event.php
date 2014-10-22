<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Event extends Mapper implements \MVC\Domain\EventFinder{

    function __construct() {
        parent::__construct();
				
		$tblEvent = "buddhismtv_event";
		
		$selectAllStmt 		= sprintf("select * from %s ORDER BY id", $tblEvent);
		$selectStmt 		= sprintf("select *  from %s where id=?", $tblEvent);
		$updateStmt 		= sprintf("update %s set id_pagoda=?, name=?, `date`=?, content=? where id=?", $tblEvent);
		$insertStmt 		= sprintf("insert into %s ( id_pagoda, name, `date`, content) values(?, ?, ?, ?)", $tblEvent);
		$deleteStmt 		= sprintf("delete from %s where id=?", $tblEvent);
		$findByStmt 		= sprintf("select *  from %s where id_pagoda=?", $tblEvent);
		$findByPageStmt 	= sprintf("SELECT * FROM  %s WHERE id_pagoda=:id_pagoda LIMIT :start,:max", $tblEvent);
						
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new EventCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Event( 
			$array['id'],
			$array['id_pagoda'],
			$array['name'],
			$array['date'],
			$array['content']			
		);
        return $obj;
    }

    protected function targetClass() {return "Event";}
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
        return new EventCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ) {				
		$this->findByPageStmt->bindValue(':id_pagoda', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new EventCollection( $this->findByPageStmt->fetchAll(), $this );
    }
		
}
?>