<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class ClassLession extends Mapper implements \MVC\Domain\ClassLessionFinder {

    function __construct() {
        parent::__construct();
				
		$tblClassLession = "chuathienquang_class_lession";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY date_start DESC", $tblClassLession);
		$selectStmt = sprintf("select *  from %s where id=?", $tblClassLession);
		$updateStmt = sprintf("update %s set id_class=?, id_monk=?, name=?, date_start=?, date_end=?, description=?, `order`=? where id=?", $tblClassLession);
		$insertStmt = sprintf("insert into %s ( id_class, id_monk, name, date_start, date_end, description, `order`) values(?, ?, ?, ?, ?, ?, ?)", $tblClassLession);
		$deleteStmt = sprintf("delete from %s where id=?", $tblClassLession);
		$findByClassStmt = sprintf("select *  from %s where id_class=? order by date_start", $tblClassLession);
		$findByMonkStmt = sprintf("select *  from %s where id_monk=? order by date_start", $tblClassLession);
		$findByRecentStmt = sprintf("select *  from %s where date_start <= NOW( ) ORDER BY date_start DESC LIMIT 4", $tblClassLession);
		$findByNextStmt = sprintf("select *  from %s where date_start > NOW() ORDER BY date_start", $tblClassLession);
						
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByClassStmt = self::$PDO->prepare($findByClassStmt);
		$this->findByMonkStmt = self::$PDO->prepare($findByMonkStmt);
		$this->findByRecentStmt = self::$PDO->prepare($findByRecentStmt);
		$this->findByNextStmt = self::$PDO->prepare($findByNextStmt);		
	}
	
    function getCollection( array $raw ){
        return new ClassLessionCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\ClassLession( 
			$array['id'],
			$array['id_class'],
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
		return "ClassLession";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdClass(),
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
			$object->getIdClass(),
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
	
	function findByClass( $values ){
        $this->findByClassStmt->execute( $values );
        return new ClassLessionCollection( $this->findByClassStmt->fetchAll(), $this);
    }
	function findByMonk( $values ){
        $this->findByMonkStmt->execute( $values );
        return new ClassLessionCollection( $this->findByMonkStmt->fetchAll(), $this);
    }
	function findByRecent( $values ){
        $this->findByRecentStmt->execute( $values );
        return new ClassLessionCollection( $this->findByRecentStmt->fetchAll(), $this);
    }
	function findByNext( $values ){
        $this->findByNextStmt->execute( $values );
        return new ClassLessionCollection( $this->findByNextStmt->fetchAll(), $this);
    }
}
?>
