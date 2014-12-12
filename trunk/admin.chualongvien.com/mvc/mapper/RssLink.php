<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class RssLink extends Mapper implements \MVC\Domain\RssLinkFinder{

    function __construct() {
        parent::__construct();
				
		$tblRssLink = "chualongvien_rss_link";
		
		$selectAllStmt 		= sprintf("select * from %s ORDER BY `date` DESC", $tblRssLink);
		$selectStmt 		= sprintf("select *  from %s where id=?", $tblRssLink);
		$updateStmt 		= sprintf("update %s set name=?, `date`=?, picture=?, content=?, `key`=? where id=?", $tblRssLink);
		$insertStmt 		= sprintf("insert into %s ( name, `date`, picture, content, `key`) values(?, ?, ?, ?, ?)", $tblRssLink);
		$deleteStmt 		= sprintf("delete from %s where id=?", $tblRssLink);
		$findByStmt 		= sprintf("select *  from %s where id_pagoda=?", $tblRssLink);
		$findByPageStmt 	= sprintf("SELECT * FROM  %s WHERE id_pagoda=:id_pagoda LIMIT :start,:max", $tblRssLink);
		$findByKeyStmt 		= sprintf("select *  from %s where `key`=?", $tblRssLink);	
						
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);
		$this->findByKeyStmt 	= self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt 	= self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new RssLinkCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\RssLink( 
			$array['id'],			
			$array['name'],
			$array['date'],
			$array['picture'],
			$array['content'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() {return "RssLink";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),
			$object->getDate(),
			$object->getPicture(),
			$object->getContent(),
			$object->getKey()
		);
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(			
			$object->getName(),
			$object->getDate(),
			$object->getPicture(),
			$object->getContent(),
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
        return new RssLinkCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ) {				
		$this->findByPageStmt->bindValue(':id_pagoda', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new RssLinkCollection( $this->findByPageStmt->fetchAll(), $this );
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
}
?>