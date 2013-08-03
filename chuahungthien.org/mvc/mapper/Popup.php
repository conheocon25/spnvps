<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Popup extends Mapper implements \MVC\Domain\PopupFinder {

    function __construct() {
        parent::__construct();
				
		$tblPopup = "chuahungthien_popup";
				
		$selectAllStmt = sprintf("select * from %s", $tblPopup);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPopup);
		$updateStmt = sprintf("update %s set command=?, enable=?, url=? where id=?", $tblPopup);
		$insertStmt = sprintf("insert into %s ( command, enable, url) values(?, ?, ?)", $tblPopup);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPopup);
		$findByNameStmt = sprintf("select * from %s where command=?", $tblPopup);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblPopup);
									
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByNameStmt = self::$PDO->prepare($findByNameStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new PopupCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Popup(
			$array['id'],
			$array['command'],
			$array['enable'],
			$array['url']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Popup";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getCommand(),
			$object->getEnable(),
			$object->getURL()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getCommand(),
			$object->getEnable(),
			$object->getURL(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
			
	function findByName( $Param ){
        $this->findByNameStmt->execute( array( $Param ) );
        $array = $this->findByNameStmt->fetch( ); 
        $this->findByNameStmt->closeCursor( );
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->createObject( $array );
        $object->markClean();
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