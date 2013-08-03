<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Monk extends Mapper implements \MVC\Domain\MonkFinder {

    function __construct() {
        parent::__construct();
				
		$tblMonk = "chuavinhkhanh_monk";
		$tblVideo = "chuavinhkhanh_video_monk";
		
		$selectAllStmt = sprintf("
			SELECT * FROM %s M
			ORDER BY 
			type DESC, (SELECT count(*) FROM %s V WHERE M.id=V.id_monk ) DESC
		", $tblMonk, $tblVideo);
		
		$findByKeyStmt = sprintf("SELECT * FROM %s M WHERE `key`=?", $tblMonk);
		
		$findVIPStmt = sprintf("
			SELECT * FROM %s M
			WHERE type=1
			ORDER BY 
			type DESC, (SELECT count(*) FROM %s V WHERE M.id=V.id_monk ) DESC
		", $tblMonk, $tblVideo);
		
		$selectStmt = sprintf("select * from %s where id=?", $tblMonk);
		$updateStmt = sprintf("update %s set pre_name=?, name=?, pagoda=?, phone=?, note=?, type=?, btype=?, url_pic=?, `key`=? where id=?", $tblMonk);
		$insertStmt = sprintf("insert into %s (pre_name, name, pagoda, phone, note, type, btype, url_pic, `key`) values(?, ?, ?, ?, ?, ?, ?, ?, ?)", $tblMonk);
		$deleteStmt = sprintf("delete from %s where id=?", $tblMonk);
		$findByBTypeStmt = sprintf("
			SELECT *  from %s M
			WHERE btype=?
			ORDER BY 
			type DESC, (SELECT count(*) FROM %s V WHERE M.id=V.id_monk ) DESC
		", $tblMonk, $tblVideo);
		$findByPageStmt = sprintf("SELECT * FROM  %s ORDER BY type DESC LIMIT :start,:max", $tblMonk);		
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);		
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findVIPStmt = self::$PDO->prepare($findVIPStmt);
		$this->findByBTypeStmt = self::$PDO->prepare($findByBTypeStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		
    } 
    function getCollection( array $raw ) {return new MonkCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Monk( 
			$array['id'],
			$array['pre_name'],
			$array['name'],
			$array['pagoda'],
			$array['phone'],
			$array['note'],
			$array['type'],
			$array['btype'],
			$array['url_pic'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Monk";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getPreName(),
			$object->getName(),
			$object->getPagoda(),
			$object->getPhone(),
			$object->getNote(),
			$object->getType(),
			$object->getBType(),
			$object->getURLPic(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getPreName(),
			$object->getName(),
			$object->getPagoda(),
			$object->getPhone(),
			$object->getNote(),
			$object->getType(),
			$object->getBType(),
			$object->getURLPic(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findByBType( $values ){
        $this->findByBTypeStmt->execute( $values );
        return new EventCollection( $this->findByBTypeStmt->fetchAll(), $this);
    }
	function findVIP( $values ){
        $this->findVIPStmt->execute( $values );
        return new EventCollection( $this->findVIPStmt->fetchAll(), $this);
    }
	
	function findByKey( $values ){
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
        return new MonkCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>