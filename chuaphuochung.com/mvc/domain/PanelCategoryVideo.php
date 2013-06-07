<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class PanelCategoryVideo extends Object{

    private $Id;
	private $IdCategory;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdCategory=null){
        $this->Id = $Id;
		$this->IdCategory = $IdCategory;
		
        parent::__construct( $Id );
    }
    function getId() {
        return $this->Id;
    }
	
    function setIdCategory( $IdCategory ) {
        $this->IdCategory = $IdCategory;
        $this->markDirty();
    }   
	function getIdCategory( ) {
        return $this->IdCategory;
    }

	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getCategoryVideo(){
		$mCategory = new \MVC\Mapper\CategoryVideo();
		$Category = $mCategory->find($this->getIdCategory());
		return $Category;
	}
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLDelLoad(){		
		return "/app/panel/category/video/".$this->getId()."/del/load";
	}	
	function getURLDelExe(){		
		return "/app/panel/category/video/".$this->getId()."/del/exe";
	}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>