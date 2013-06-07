<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Task extends Mapper implements \MVC\Domain\TaskFinder{

    function __construct() {
        parent::__construct();
				
		$tblTask = "chuathienquang_task";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY date", $tblTask);
		$selectStmt = sprintf("select *  from %s where id=?", $tblTask);
		$updateStmt = sprintf("update %s set type=?, date=?, title=?, description=?, url=? where id=?", $tblTask);
		$insertStmt = sprintf("insert into %s ( type, date, title, description, url) values(?, ?, ?, ?, ?)", $tblTask);
		$deleteStmt = sprintf("delete from %s where id=?", $tblTask);
		$findTopStmt = sprintf("select *  from %s order by date desc limit 1", $tblTask);
		$findByFinishStmt = sprintf("select *  from %s where date < now() order by date desc", $tblTask);
		$findByNearStmt = sprintf("select *  from %s where date >= now() order by date desc", $tblTask);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findTopStmt = self::$PDO->prepare($findTopStmt);
		$this->findByFinishStmt = self::$PDO->prepare($findByFinishStmt);
		$this->findByNearStmt = self::$PDO->prepare($findByNearStmt);
	}
	
    function getCollection( array $raw ){
        return new TaskCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Task( 
			$array['id'],			
			$array['date'],
			$array['type'],
			$array['title'],
			$array['description'],
			$array['url']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Task";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getType(),
			$object->getDate(),			
			$object->getTitle(),
			$object->getDescription(),
			$object->getURL()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getType(),
			$object->getDate(),
			$object->getTitle(),
			$object->getDescription(),
			$object->getURL(),
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
    function selectAllStmt() {
        return $this->selectAllStmt;
    }
	
	function findTop( $values ){
        $this->findTopStmt->execute( $values );
        return new TaskCollection( $this->findTopStmt->fetchAll(), $this);
    }
	function findByNear( $values ){
        $this->findByNearStmt->execute( $values );
        return new TaskCollection( $this->findByNearStmt->fetchAll(), $this);
    }
	function findByFinish( $values ){
        $this->findByFinishStmt->execute( $values );
        return new TaskCollection( $this->findByFinishStmt->fetchAll(), $this);
    }
}
?>