<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class VoiceBook extends Mapper implements \MVC\Domain\VoiceBookFinder {

    function __construct() {
        parent::__construct();				
		$tblVoiceBook = "chualongvien_book_voice";
		
		$selectAllStmt 			= sprintf("select * from %s ORDER BY type DESC, `order` DESC", $tblVoiceBook);
		$selectStmt 			= sprintf("select *  from %s where id=?", $tblVoiceBook);
		$updateStmt 			= sprintf("update %s set name=?, `date_time`=?, `order`=?, type=?, btype=?, `mp3_raw`=?, `note`=?, `count`=?, `key`=? where id=?", $tblVoiceBook);
		$insertStmt 			= sprintf("insert into %s ( name, `date_time`, `order`, type, btype, mp3_raw, note, `count`, `key`) values(?, ?, ?, ?, ?, ?, ?, ?, ?)", $tblVoiceBook);
		$deleteStmt 			= sprintf("delete from %s where id=?", $tblVoiceBook);
		$findByStmt 			= sprintf("select * from %s WHERE type=? ORDER BY type DESC, `order` DESC", $tblVoiceBook);
		$findByBTypeStmt 		= sprintf("select * from %s WHERE btype=? ORDER BY type DESC, `order` DESC", $tblVoiceBook);
		$findByKeyStmt 			= sprintf("select * from %s where `key`=?", $tblVoiceBook);
		$findByPageStmt 		= sprintf("SELECT * FROM  %s ORDER BY type DESC, `order` DESC LIMIT :start,:max", $tblVoiceBook);
				
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);
		$this->findByBTypeStmt 	= self::$PDO->prepare($findByBTypeStmt);
		$this->findByKeyStmt 	= self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);
    } 
    function getCollection( array $raw ) {return new VoiceBookCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\VoiceBook( 
			$array['id'],
			$array['name'],
			$array['date_time'],			
			$array['order'],
			$array['type'],
			$array['btype'],
			$array['mp3_raw'],
			$array['note'],
			$array['count'],
			$array['key']
		);
        return $obj;
    }
    protected function targetClass() {return "VoiceBook";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getDateTime(),
			$object->getOrder(),
			$object->getType(),
			$object->getBType(),
			$object->getMP3Raw(),
			$object->getNote(),
			$object->getCount(),
			$object->getKey()
		);
		
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getDateTime(),
			$object->getOrder(),
			$object->getType(),
			$object->getBType(),			
			$object->getMP3Raw(),
			$object->getNote(),
			$object->getCount(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
		
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}	
	
	function findBy( $values ){
		$this->findByStmt->execute($values);
        return new VoiceBookCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByBType( $values ){
		$this->findByBTypeStmt->execute($values);
        return new VoiceBookCollection( $this->findByBTypeStmt->fetchAll(), $this);
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
        return new VoiceBookCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>