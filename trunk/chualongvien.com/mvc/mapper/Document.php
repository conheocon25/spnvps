<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Document extends Mapper implements \MVC\Domain\DocumentFinder{

    function __construct() {
        parent::__construct();
				
		$tblDocument = "chualongvien_document";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY `order`", $tblDocument);
		$selectStmt = sprintf("select *  from %s where id=?", $tblDocument);
		$updateStmt = sprintf("update %s set name=?, `order`=?, `key`=? where id=?", $tblDocument);
		$insertStmt = sprintf("insert into %s ( name, `order`, `key`) values(?, ?, ?)", $tblDocument);
		$deleteStmt = sprintf("delete from %s where id=?", $tblDocument);		
		
		$findByStmt = sprintf("select *  from %s where id_category=?", $tblDocument);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblDocument);
		$findByPageStmt = sprintf("SELECT * FROM  %s where id_category=:id_category LIMIT :start,:max", $tblDocument);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		
    } 
    function getCollection( array $raw ) {
        return new DocumentCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Document( 
			$array['id'],
			$array['id_category'],
			$array['name'],
			$array['order'],
			$array['url']
		);
        return $obj;
    }

    protected function targetClass() { return "Document";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getName(),
			$object->getOrder(),
			$object->getURL()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getName(),
			$object->getOrder(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new DocumentCollection( $this->findByStmt->fetchAll(), $this);
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
		$this->findByPageStmt->bindValue(':id_category', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new DocumentCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>