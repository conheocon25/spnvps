<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PPost extends Mapper implements \MVC\Domain\PPostFinder {

    function __construct() {
        parent::__construct();
				
		$tblPPost = "buddhismtv_ppost";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY type DESC, date DESC", $tblPPost);
		$selectStmt = sprintf("select *  from %s where id=?", $tblPPost);
		$updateStmt = sprintf("update %s set id_pagoda=?, author=?, `date`=?, content=?, title=?, type=?, `key`=? where id=?", $tblPPost);
		$insertStmt = sprintf("insert into %s ( id_pagoda, author, `date`, content, title, type, `key`) values(?, ?, ?, ?, ?, ?, ?)", $tblPPost);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPPost);

		$findByStmt = sprintf("select *  from %s where id_pagoda=? ORDER BY type DESC, date DESC", $tblPPost);		
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblPPost);
		
		$findByCategoryDateStmt = sprintf(
			"select *  
			from %s 
			where id_pagoda=? AND date<=?
			ORDER BY type DESC, date DESC LIMIT 10"
		, $tblPPost);
			
		$findByCategoryPageStmt = sprintf(
			"SELECT 
				*
			FROM 
				%s 			
			WHERE id_pagoda=:id_pagoda
			ORDER BY date desc			
			LIMIT :start,:max"
		, $tblPPost);		
		$findByPageStmt = sprintf("SELECT * FROM  %s ORDER BY date desc LIMIT :start,:max" , $tblPPost);
		
		$findByTop6Stmt = sprintf("SELECT * FROM  %s ORDER BY date desc LIMIT 6" , $tblPPost);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);		
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
				
		$this->findByCategoryDateStmt = self::$PDO->prepare($findByCategoryDateStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		$this->findByCategoryPageStmt = self::$PDO->prepare($findByCategoryPageStmt);
		$this->findByTop6Stmt = self::$PDO->prepare($findByTop6Stmt);

    } 
    function getCollection( array $raw ) {
        return new PPostCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PPost( 
			$array['id'],
			$array['id_pagoda'],
			$array['author'],
			$array['date'],
			$array['content'],
			$array['title'],
			$array['type'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "PPost";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdPagoda(),
			$object->getAuthor(),
			$object->getDate(),
			$object->getContent(),
			$object->getTitle(),
			$object->getType(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdPagoda(),
			$object->getAuthor(),
			$object->getDate(),
			$object->getContent(),
			$object->getTitle(),
			$object->getType(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }
	
	function deleteByCategoryDate( $values ){        
        return $this->deleteByCategoryStmt->execute( $values );
    }	
	
    function selectStmt() {
        return $this->selectStmt;
    }
    function selectAllStmt() {
        return $this->selectAllStmt;
    }
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new PPostCollection( $this->findByStmt->fetchAll(), $this);
    }
		
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new PPostCollection( $this->findByPageStmt->fetchAll(), $this );
    }
	function findByCategoryPage( $values ) {
		$this->findByCategoryPageStmt->bindValue(':id_pagoda', $values[0], \PDO::PARAM_INT);
		$this->findByCategoryPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByCategoryPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByCategoryPageStmt->execute();
        return new PPostCollection( $this->findByCategoryPageStmt->fetchAll(), $this );
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
	
	function findByTop6( $values ){
        $this->findByTop6Stmt->execute( $values );
        return new PPostCollection( $this->findByTop6Stmt->fetchAll(), $this);
    }
	
}
?>