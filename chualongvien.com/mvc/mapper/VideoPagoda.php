<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class VideoPagoda extends Mapper implements \MVC\Domain\VideoPagodaFinder {

    function __construct() {
        parent::__construct();
				
		$tblVideoPagoda = "chualongvien_video_pagoda";
				
		$selectAllStmt = sprintf("select * from %s", $tblVideoPagoda);
		$selectStmt = sprintf("select *  from %s where id=?", $tblVideoPagoda);
		$updateStmt = sprintf("update %s set id_video=?, id_pagoda=? where id=?", $tblVideoPagoda);
		$insertStmt = sprintf("insert into %s ( id_video, id_pagoda) values(?, ?)", $tblVideoPagoda);
		$deleteStmt = sprintf("delete from %s where id=?", $tblVideoPagoda);
		$findByStmt = sprintf("select *  from %s where id_pagoda=?", $tblVideoPagoda);
		$findByPageStmt = sprintf("
			SELECT *  
			FROM %s VM
			WHERE id_pagoda=:id_pagoda
			LIMIT :start,:max", $tblVideoPagoda
		);
								
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new VideoPagodaCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\VideoPagoda(
			$array['id'],			
			$array['id_video'],
			$array['id_pagoda']			
		);
        return $obj;
    }

    protected function targetClass() {        
		return "VideoPagoda";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),
			$object->getIdPagoda()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getIdVideo(),
			$object->getIdPagoda(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new VideoPagodaCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ){
		$this->findByPageStmt->bindValue(':id_pagoda', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new VideoPagodaCollection( $this->findByPageStmt->fetchAll(), $this);
    }	
}
?>