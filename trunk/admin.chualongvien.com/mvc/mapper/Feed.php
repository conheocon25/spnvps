<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class Feed extends Mapper implements \MVC\Domain\FeedFinder {

    function __construct() {
        parent::__construct();
		$tblFeed = "chualongvien_feed";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblFeed);
		$selectStmt = sprintf("select *  from %s where id=?", $tblFeed);
		$updateStmt = sprintf("update %s set name=?, url=?, note=?, time=?, `key`=? where id=?", $tblFeed);
		$insertStmt = sprintf("insert into %s ( name, url, note, `key`) values(?, ?, ?, ?)", $tblFeed);
		$deleteStmt = sprintf("delete from %s where id=?", $tblFeed);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblFeed);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblFeed);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    } 
    function getCollection( array $raw ) {
        return new FeedCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Feed(
			$array['id'],
			$array['email']			
		);
        return $obj;
    }

    protected function targetClass(){return "Feed";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getEmail()			
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getEmail(),			
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}
	
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
        return new FeedCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>