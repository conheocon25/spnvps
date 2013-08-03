<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class Ask extends Mapper implements \MVC\Domain\AskFinder{
    function __construct() {
        parent::__construct();
				
		$tblAsk = "chuavinhkhanh_ask";
				
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblAsk);
		$selectStmt = sprintf("select *  from %s where id=?", $tblAsk);
		$updateStmt = sprintf("update %s set id_category=?, question=?, author1=?, time=?, answer=?, author2=? where id=?", $tblAsk);
		$insertStmt = sprintf("insert into %s ( id_category, question, author1, answer, author2) values(?, ?, ?, ?, ?)", $tblAsk);
		$deleteStmt = sprintf("delete from %s where id=?", $tblAsk);
		$findByStmt = sprintf("select *  from %s where id_category=? ORDER BY time DESC", $tblAsk);
		$findBy1Stmt = sprintf("select *  from %s where id_category=? AND id<>? AND answer<>' ' ORDER BY time DESC", $tblAsk);
		$findBy2Stmt = sprintf("select *  from %s where id_category=? AND answer<>' ' ORDER BY time DESC", $tblAsk);
		$findBy3Stmt = sprintf("select *  from %s where answer='' ORDER BY time DESC", $tblAsk);
		$findByTopStmt = sprintf("select *  from %s limit 6", $tblAsk);
		$findByPageStmt = sprintf("SELECT * FROM  %s WHERE id_category=:id_category LIMIT :start,:max", $tblAsk);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findBy1Stmt = self::$PDO->prepare($findBy1Stmt);
		$this->findBy2Stmt = self::$PDO->prepare($findBy2Stmt);
		$this->findBy3Stmt = self::$PDO->prepare($findBy3Stmt);
		$this->findByTopStmt = self::$PDO->prepare($findByTopStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {
        return new AskCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Ask(
			$array['id'],
			$array['id_category'],
			$array['question'],
			$array['author1'],
			$array['time'],
			$array['answer'],
			$array['author2']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Ask";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getQuestion(),
			$object->getAuthor1(),			
			$object->getAnswer(),
			$object->getAuthor2()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getQuestion(),
			$object->getAuthor1(),
			$object->getTime(),
			$object->getAnswer(),
			$object->getAuthor2(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new AskCollection( $this->findByStmt->fetchAll(), $this);
    }
	function findBy1( $values ){
        $this->findBy1Stmt->execute( $values );
        return new AskCollection( $this->findBy1Stmt->fetchAll(), $this);
    }
	function findBy2( $values ){
        $this->findBy2Stmt->execute( $values );
        return new AskCollection( $this->findBy2Stmt->fetchAll(), $this);
    }
	function findBy3( $values ){
        $this->findBy3Stmt->execute( $values );
        return new AskCollection( $this->findBy3Stmt->fetchAll(), $this);
    }
	
	function findByTop( $values ){
        $this->findByTopStmt->execute( $values );
        return new AskCollection( $this->findByTopStmt->fetchAll(), $this);
    }
	function findByPage( $values ) {
		$this->findByPageStmt->bindValue(':id_category', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new AskCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>