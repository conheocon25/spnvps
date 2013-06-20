<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class PanelAds extends Object{

    private $Id;
	private $IdNews;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdNews=null){
        $this->Id = $Id;
		$this->IdNews = $IdNews;
		
        parent::__construct( $Id );
    }
    function getId() {
        return $this->Id;
    }
	
    function setIdNews( $IdNews ) {
        $this->IdNews = $IdNews;
        $this->markDirty();
    }   
	function getIdNews( ) {
        return $this->IdNews;
    }

	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getNews(){
		$mNews = new \MVC\Mapper\News();
		$News = $mNews->find($this->getIdNews());
		return $News;
	}
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){
		return "/news/".$this->getIdNews()."/".$this->getId();
	}
	function getURLDelLoad(){		
		return "/app/panel/ads/".$this->getId()."/del/load";
	}	
	function getURLDelExe(){		
		return "/app/panel/ads/".$this->getId()."/del/exe";
	}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>