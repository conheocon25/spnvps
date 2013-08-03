<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class CategoryVideo extends Mapper implements \MVC\Domain\CategoryVideoFinder {

    function __construct() {
        parent::__construct();
				
		$tblCategory = "chuavinhkhanh_category_video";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY type DESC, `order` DESC", $tblCategory);
		$selectStmt = sprintf("select *  from %s where id=?", $tblCategory);
		$updateStmt = sprintf("update %s set name=?, picture=?, `order`=?, type=?, btype=?, `key`=? where id=?", $tblCategory);
		$insertStmt = sprintf("insert into %s ( name, picture, `order`, type, btype, `key`) values(?, ?, ?, ?, ?, ?)", $tblCategory);
		$deleteStmt = sprintf("delete from %s where id=?", $tblCategory);		
		$findByBTypeStmt = sprintf("select * from %s where btype=?", $tblCategory);
		$findByKeyStmt = sprintf("select * from %s where `key`=?", $tblCategory);
		$findByPageStmt = sprintf("SELECT * FROM  %s ORDER BY type DESC, `order` DESC LIMIT :start,:max", $tblCategory);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByBTypeStmt = self::$PDO->prepare($findByBTypeStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);		
    } 
    function getCollection( array $raw ) {return new CategoryVideoCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\CategoryVideo( 
			$array['id'],
			$array['name'],
			$array['picture'],
			$array['order'],
			$array['type'],
			$array['btype'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "CategoryVideo";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getPicture(),
			$object->getOrder(),
			$object->getType(),
			$object->getBType(),
			$object->getKey()
		);
		
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getPicture(),
			$object->getOrder(),
			$object->getType(),
			$object->getBType(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
		
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}	

	function findByBType( $values ){
		$this->findByBTypeStmt->execute($values);
        return new CategoryVideoCollection( $this->findByBTypeStmt->fetchAll(), $this);
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
	
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new CategoryVideoCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>