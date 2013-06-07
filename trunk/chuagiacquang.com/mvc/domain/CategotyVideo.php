<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryVideo extends Object{

    private $Id;
	private $Name;
	private $Picture;
	private $Order;
	private $Type;
		
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Picture=null , $Order=Null, $Type=Null){
        $this->Id = $Id;
		$this->Name = $Name;
		$this->Picture = $Picture;
		$this->Order = $Order;
		$this->Type = $Type;
        parent::__construct( $Id );
    }
    function getId(){
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
	
	function setPicture( $Picture ) {
        $this->Picture = $Picture;
        $this->markDirty();
    }   
	function getPicture( ) {
        return $this->Picture;
    }
	
	function setOrder( $Order ) {
        $this->Order = $Order;
        $this->markDirty();
    }   
	function getOrder( ) {
        return $this->Order;
    }
	
	function setType( $Type ) {
        $this->Type = $Type;
        $this->markDirty();
    }   
	function getType( ) {
        return $this->Type;
    }
	function isVIP( ){
		if ($this->Type == 1)
			return true;
        return false;
    }
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getVMs(){
		$mVM = new \MVC\Mapper\VideoMonk();
		$VMs = $mVM->findByCategory( array($this->getId()) );
		return $VMs;
	}	
	function getVMsLimit10(){
		$mVM = new \MVC\Mapper\VideoMonk();
		$VMs = $mVM->findByCategoryLimit10( array($this->getId()) );
		return $VMs;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){
		return "/library/video/category/".$this->getId();
	}
	function getURLView(){
		return "/app/news/".$this->getId();
	}	
	function getURLVideo(){
		return "/app/category/video/".$this->getId();
	}
	function getURLVideoInsLoad(){
		return "/app/category/video/".$this->getId()."/ins/load";
	}
	function getURLVideoInsExe(){
		return "/app/category/video/".$this->getId()."/ins/exe";
	}
	
	function getURLUpdLoad(){
		return "/app/category/video/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/app/category/video/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){		
		return "/app/category/video/".$this->getId()."/del/load";
	}
	function getURLDelExe(){	
		return "/app/category/video/".$this->getId()."/del/exe";
	}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>