<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryNews extends Object{

    private $Id;
	private $Name;
	private $Order;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null , $Order=Null) {
        $this->Id = $Id;
		$this->Name = $Name;
		$this->Order = $Order;
        parent::__construct( $Id );
    }
    function getId() {
        return $this->Id;
    }	
	function getIdPrint(){
        return "c" . $this->getId();
    }	
	
    function setName( $Name ) {
        $this->Name = $Name;
        $this->markDirty();
    }
   
	function getName( ) {
        return $this->Name;
    }
	
	function setOrder( $Order ) {
        $this->Order = $Order;
        $this->markDirty();
    }
   
	function getOrder( ) {
        return $this->Order;
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
		return "/news/".$this->getId();
	}
	function getURLView(){
		return "/app/news/".$this->getId();
	}
	
	function getURLUpdLoad(){
		return "/app/category/news/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/app/category/news/".$this->getId()."/upd/exe";			
	}
	
	function getURLDelLoad(){		
		return "/app/category/news/".$this->getId()."/del/load";						
	}
	function getURLDelExe(){	
		return "/app/category/news/".$this->getId()."/del/exe";
	}
	
	function getURLNewsInsLoad(){
		return "/app/news/".$this->getId()."/ins/load";
	}
	function getURLNewsInsExe(){
		return "/app/news/".$this->getId()."/ins/exe";
	}
	
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>