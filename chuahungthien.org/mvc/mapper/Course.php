<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Course extends Mapper implements \MVC\Domain\CourseFinder{

    function __construct() {
        parent::__construct();			
		$tblCourse = "chuahungthien_course";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY date_start DESC", $tblCourse);
		$selectStmt = sprintf("select *  from %s where id=?", $tblCourse);
		$updateStmt = sprintf("update %s set name=?, date_start=?, date_end=?, description=?, `order`=?, `key`=? where id=?", $tblCourse);
		$insertStmt = sprintf("insert into %s ( name, date_start, date_end, description, `order`, `key`) values(?, ?, ?, ?, ?, ?)", $tblCourse);
		$deleteStmt = sprintf("delete from %s where id=?", $tblCourse);
		$findTopStmt = sprintf("select *  from %s order by date_end desc limit 1", $tblCourse);
		$findByYearStmt = sprintf("select *  from %s where year(date_end)=? order by date_end desc", $tblCourse);
		$findByNearStmt = sprintf("select *  from %s where date_end >= NOW( ) AND date_start <= NOW( )", $tblCourse);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblCourse);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblCourse);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findTopStmt = self::$PDO->prepare($findTopStmt);
		$this->findByYearStmt = self::$PDO->prepare($findByYearStmt);
		$this->findByNearStmt = self::$PDO->prepare($findByNearStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);		
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
	}
	
    function getCollection( array $raw ){
        return new CourseCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Course( 
			$array['id'],			
			$array['name'],
			$array['date_start'],
			$array['date_end'],
			$array['description'],
			$array['order'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Course";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getName(),
			$object->getDateStart(),
			$object->getDateEnd(),
			$object->getDescription(),
			$object->getOrder(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),
			$object->getDateStart(),
			$object->getDateEnd(),
			$object->getDescription(),
			$object->getOrder(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findTop( $values ){
        $this->findTopStmt->execute( $values );
        return new CourseCollection( $this->findTopStmt->fetchAll(), $this);
    }
	function findByYear( $values ){
        $this->findByYearStmt->execute( $values );
        return new CourseCollection( $this->findByYearStmt->fetchAll(), $this);
    }
	function findByNear( $values ){
        $this->findByNearStmt->execute( $values );
        return new CourseCollection( $this->findByNearStmt->fetchAll(), $this);
    }
	
	function findByKey( $values ) {	
		$this->findByKeyStmt->execute( array($values) );
        $array = $this->findByKeyStmt->fetch();
        $this->findByKeyStmt->closeCursor();
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->doCreateObject( $array );
        return $object;		
    }
	
	function findByPage( $values ){
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new CourseCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>