<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class CourseLession extends Mapper implements \MVC\Domain\CourseLessionFinder {

    function __construct() {
        parent::__construct();
				
		$tblCourseLession = "chuaphuochung_course_lession";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY date_start DESC", $tblCourseLession);
		$selectStmt = sprintf("select *  from %s where id=?", $tblCourseLession);
		$updateStmt = sprintf("update %s set id_course=?, id_monk=?, name=?, date_start=?, date_end=?, description=?, `order`=? where id=?", $tblCourseLession);
		$insertStmt = sprintf("insert into %s ( id_course, id_monk, name, date_start, date_end, description, `order`) values(?, ?, ?, ?, ?, ?, ?)", $tblCourseLession);
		$deleteStmt = sprintf("delete from %s where id=?", $tblCourseLession);
		$findByCourseStmt = sprintf("select *  from %s where id_course=? ORDER BY date_start DESC", $tblCourseLession);
		$findByMonkStmt = sprintf("select *  from %s where id_monk=? ORDER BY date_start DESC", $tblCourseLession);
		$findByNearStmt = sprintf("select *  from %s where id_course=? AND date_start <= NOW( ) ORDER BY date_start DESC", $tblCourseLession);
		$findByNextStmt = sprintf("select *  from %s where id_course=? AND date_start > NOW( ) ORDER BY date_start", $tblCourseLession);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByCourseStmt = self::$PDO->prepare($findByCourseStmt);
		$this->findByMonkStmt = self::$PDO->prepare($findByMonkStmt);
		$this->findByNearStmt = self::$PDO->prepare($findByNearStmt);
		$this->findByNextStmt = self::$PDO->prepare($findByNextStmt);
		
	}
	
    function getCollection( array $raw ){
        return new CourseLessionCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\CourseLession( 
			$array['id'],
			$array['id_course'],
			$array['id_monk'],
			$array['name'],
			$array['date_start'],
			$array['date_end'],
			$array['description'],
			$array['order']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "CourseLession";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdCourse(),
			$object->getIdMonk(),
			$object->getName(),
			$object->getDateStart(),
			$object->getDateEnd(),
			$object->getDescription(),
			$object->getOrder()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCourse(),
			$object->getIdMonk(),
			$object->getName(),
			$object->getDateStart(),
			$object->getDateEnd(),
			$object->getDescription(),
			$object->getOrder(),
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
	
	function findByCourse( $values ){
        $this->findByCourseStmt->execute( $values );
        return new CourseLessionCollection( $this->findByCourseStmt->fetchAll(), $this);
    }
	function findByMonk( $values ){
        $this->findByMonkStmt->execute( $values );
        return new CourseLessionCollection( $this->findByMonkStmt->fetchAll(), $this);
    }
	function findByNear( $values ){
        $this->findByNearStmt->execute( $values );
        return new CourseLessionCollection( $this->findByNearStmt->fetchAll(), $this);
    }
	function findByNext( $values ){
        $this->findByNextStmt->execute( $values );
        return new CourseLessionCollection( $this->findByNextStmt->fetchAll(), $this);
    }
	
}
?>
