<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class Anime extends Mapper implements \MVC\Domain\AnimeFinder {

    function __construct() {
        parent::__construct();
		$tblAnime = "chualongvien_anime";
		
		$selectAllStmt = sprintf("select * from %s", $tblAnime);
		$selectStmt = sprintf("select *  from %s where id=?", $tblAnime);
		$updateStmt = sprintf("update %s set name=?, html=? where id=?", $tblAnime);
		$insertStmt = sprintf("insert into %s ( name, html) values(?, ?)", $tblAnime);
		$deleteStmt = sprintf("delete from %s where id=?", $tblAnime);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);		
    } 
    function getCollection( array $raw ) {
        return new AnimeCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Anime(
			$array['id'],
			$array['name'],
			$array['html']			
		);
        return $obj;
    }

    protected function targetClass(){return "Anime";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getHtml()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getHtml(),			
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}
		
}
?>