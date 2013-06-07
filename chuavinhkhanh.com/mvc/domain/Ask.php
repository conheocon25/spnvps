<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Ask extends Object{

    private $Id;
	private $IdCategory;
	private $Question;
	private $Author1;
	private $Time;
	private $Answer;
	private $Author2;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdCategory=null , $Question=Null, $Author1=Null, $Time=Null, $Answer=Null, $Author2=Null) {
        $this->Id = $Id;
		$this->IdCategory = $IdCategory;
		$this->Question = $Question;
		$this->Author1 = $Author1;
		$this->Time = $Time;
		$this->Answer = $Answer;
		$this->Author2 = $Author2;
	
        parent::__construct( $Id );
    }
    function getId() {
        return $this->Id;
    }	
	function getIdPrint(){
        return "c" . $this->getId();
    }	
	
    function setIdCategory( $IdCategory ) {
        $this->IdCategory = $IdCategory;
        $this->markDirty();
    }   
	function getIdCategory( ) {
        return $this->IdCategory;
    }
	function getCategory( ) {
		$mCategory = new \MVC\Mapper\CategoryAsk();
		$Category = $mCategory->find($this->IdCategory);
        return $Category;
    }
	
	function setQuestion( $Question ) {
        $this->Question = $Question;
        $this->markDirty();
    }   
	function getQuestion( ) {
        return $this->Question;
    }
	function setAuthor1( $Author1 ) {
        $this->Author1 = $Author1;
        $this->markDirty();
    }   
	function getAuthor1( ) {
        return $this->Author1;
    }
	
	function setTime( $Time ){
        $this->Time = $Time;
        $this->markDirty();
    }   
	function getTime( ) {
        return $this->Time;
    }
	function getTimePrint( ){
		$D = new \MVC\Library\Date($this->Time);
        return $D->getDateTimeFormat();
    }
	
	function setAnswer( $Answer ) {
        $this->Answer = $Answer;
        $this->markDirty();
    }   
	function getAnswer( ) {
        return $this->Answer;
    }
	function getAnswerState( ) {
		if ($this->Answer=="")
			return false;
        return true;
    }
	function getAnswerStatePrint( ) {
		if ($this->Answer=="")
			return "Chưa trả lời";
        return "Đã trả lời";
	}
	
	function setAuthor2( $Author2 ) {
        $this->Author2 = $Author2;
        $this->markDirty();
    }   
	function getAuthor2( ) {
        return $this->Author2;
    }
	
	function getQuestionReduce(){
		$S = new \MVC\Library\String($this->Question);
		return $S->reduce(120);
	}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getNews(){
		$mNews = new \MVC\Mapper\News();
		$News = $mNews->findBy(array($this->getId()));
		return $News;
	}
	
	function getNewsLimit(){
		$mNews = new \MVC\Mapper\News();
		$News = $mNews->findByLimit(array($this->getId()));
		return $News;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){
		return "/ask/".$this->getIdCategory()."/".$this->getId();
	}
	function getURLView(){
		return "/app/ask/".$this->getId();
	}
	
	function getURLUpdLoad(){
		return "/app/category/ask/".$this->getIdCategory()."/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/app/category/ask/".$this->getIdCategory()."/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){
		return "/app/category/ask/".$this->getIdCategory()."/".$this->getId()."/del/load";
	}
	function getURLDelExe(){
		return "/app/category/ask/".$this->getIdCategory()."/".$this->getId()."/del/exe";
	}
		
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>