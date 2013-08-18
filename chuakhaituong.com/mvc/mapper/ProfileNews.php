<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class ProfileNews extends Mapper implements \MVC\Domain\ProfileNewsFinder{

    function __construct() {
        parent::__construct();
				
		$tblProfileNews = "chuakhaituong_profile_news";
		
		$selectAllStmt = sprintf("select * from %s", $tblProfileNews);
		$selectStmt = sprintf("select *  from %s where id=?", $tblProfileNews);
		$updateStmt = sprintf("update %s set name=?, id_category=?, rss=?, ctitle=?, cauthor=?, ccontent=? where id=?", $tblProfileNews);
		$insertStmt = sprintf("insert into %s ( name, id_category, rss, ctitle, cauthor, ccontent) values(?, ?, ?, ?, ?, ?)", $tblProfileNews);
		$deleteStmt = sprintf("delete from %s where id=?", $tblProfileNews);
		$findByStmt = sprintf("select *  from %s where id_category=?", $tblProfileNews);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max" , $tblProfileNews);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);

		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);

    } 
    function getCollection( array $raw ) {return new ProfileNewsCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\ProfileNews( 
			$array['id'],
			$array['name'],
			$array['id_category'],
			$array['rss'],
			$array['ctitle'],
			$array['cauthor'],
			$array['ccontent']
		);
        return $obj;
    }

    protected function targetClass() {return "ProfileNews";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getIdCategory(),			
			$object->getRSS(),
			$object->getCTitle(),
			$object->getCAuthor(),
			$object->getCContent()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getIdCategory(),
			$object->getRSS(),
			$object->getCTitle(),
			$object->getCAuthor(),
			$object->getCContent(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new ProfileNewsCollection( $this->findByStmt->fetchAll(), $this);
    }
					
	function findByPage( $values ){
		$this->findByPageStmt->bindValue(':id_category', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new ProfileNewsCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>