<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class DhammapadaDetail extends Mapper implements \MVC\Domain\DhammapadaDetailFinder {

    function __construct() {
        parent::__construct();
				
		$tblDhammapadaDetail = "chuathienquang_dhammapada_detail";
		
		$selectAllStmt = sprintf("select * from %s", $tblDhammapadaDetail);
		$selectStmt = sprintf("select *  from %s where id=?", $tblDhammapadaDetail);
		$updateStmt = sprintf("update %s set name=?, picture=?, `order`=?, type=? where id=?", $tblDhammapadaDetail);
		$insertStmt = sprintf("insert into %s ( name, picture, `order`, type) values(?, ?, ?, ?)", $tblDhammapadaDetail);
		$deleteStmt = sprintf("delete from %s where id=?", $tblDhammapadaDetail);
		$randStmt = sprintf("select *  from %s ORDER BY RAND() LIMIT 1", $tblDhammapadaDetail);
		$findByStmt = sprintf("select *  from %s where type=?", $tblDhammapadaDetail);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);		
		$this->randStmt = self::$PDO->prepare($randStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		
    } 
    function getCollection( array $raw ) {
        return new DhammapadaDetailCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\DhammapadaDetail( 
			$array['id'],
			$array['type'],
			$array['content_vi'],
			$array['content_en']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "DhammapadaDetail";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getPicture(),
			$object->getOrder(),
			$object->getType()
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
	
	function rand( $values ) {
		$this->randStmt->execute( $values );
        $array = $this->randStmt->fetch();
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->createObject( $array );
        $object->markClean();
        return $object;
    }	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new DhammapadaDetailCollection( $this->findByStmt->fetchAll(), $this);
    }
	
}
?>