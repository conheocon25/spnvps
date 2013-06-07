<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class News extends Mapper implements \MVC\Domain\NewsFinder {

    function __construct() {
        parent::__construct();
				
		$tblNews = "chuakhaituong_news";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY type DESC, date DESC", $tblNews);
		$selectStmt = sprintf("select *  from %s where id=?", $tblNews);
		$updateStmt = sprintf("update %s set id_category=?, author=?, date=?, content=?, title=?, type=? where id=?", $tblNews);
		$insertStmt = sprintf("insert into %s ( id_category, author, date, content, title, type) values(?, ?, ?, ?, ?, ?)", $tblNews);
		$deleteStmt = sprintf("delete from %s where id=?", $tblNews);
		$findByStmt = sprintf("select *  from %s where id_category=? ORDER BY type DESC, date DESC", $tblNews);		
		$findByLimitStmt = sprintf("select *  from %s where id_category=? ORDER BY type DESC, date DESC limit 10", $tblNews);
		$findByLimit1Stmt = sprintf("select *  from %s where id_category=? ORDER BY type DESC, date DESC limit 6", $tblNews);
		$findByLimit2Stmt = sprintf("select *  from %s where id_category=? ORDER BY type DESC, date DESC limit 6", $tblNews);
		
		$findByArrayStmt = sprintf(
			"SELECT DISTINCT * 
					FROM  `chuakhaituong_news` 					
					ORDER BY TYPE DESC , DATE DESC 
					"
		, $tblNews);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);		
		$this->findByLimitStmt = self::$PDO->prepare($findByLimitStmt);
		$this->findByLimit1Stmt = self::$PDO->prepare($findByLimit1Stmt);
		$this->findByLimit2Stmt = self::$PDO->prepare($findByLimit2Stmt);
		
		$this->findByArrayStmt = self::$PDO->prepare($findByArrayStmt);
    } 
    function getCollection( array $raw ) {
        return new NewsCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\News( 
			$array['id'],
			$array['id_category'],
			$array['author'],
			$array['date'],
			$array['content'],
			$array['title'],
			$array['type']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "News";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getAuthor(),
			$object->getDate(),
			$object->getContent(),
			$object->getTitle(),
			$object->getType()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getAuthor(),
			$object->getDate(),
			$object->getContent(),
			$object->getTitle(),
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
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new NewsCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByArray( $values ){		
		$findByArrayStmt = "SELECT DISTINCT * FROM  `chuakhaituong_news` WHERE id IN ".   $values[0] ." ORDER BY TYPE DESC , DATE DESC"	;
		$this->findByArrayStmt = self::$PDO->prepare($findByArrayStmt);
		$this->findByArrayStmt->execute(NULL);
        return new NewsCollection( $this->findByArrayStmt->fetchAll(), $this);
    }
	
	function findByLimit( $values ){
        $this->findByLimitStmt->execute( $values );
        return new NewsCollection( $this->findByLimitStmt->fetchAll(), $this);
    }
	function findByLimit1( $values ){
        $this->findByLimit1Stmt->execute( $values );
        return new NewsCollection( $this->findByLimit1Stmt->fetchAll(), $this);
    }
	function findByLimit2( $values ){
        $this->findByLimit2Stmt->execute( $values );
        return new NewsCollection( $this->findByLimit2Stmt->fetchAll(), $this);
    }
	
}
?>
