<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryTask extends Object{

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
        return "t" . $this->getId();
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
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){
		return "/ask/".$this->getId();
	}
	function getURLView(){
		return "/app/category/task/".$this->getId();
	}
	
	function getURLUpdLoad(){
		return "/app/category/task/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/app/category/task/".$this->getId()."/upd/exe";			
	}
	
	function getURLDelLoad(){		
		return "/app/category/task/".$this->getId()."/del/load";						
	}
	function getURLDelExe(){	
		return "/app/category/task/".$this->getId()."/del/exe";
	}
	
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>