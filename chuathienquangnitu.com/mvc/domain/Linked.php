<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Linked extends Object{

    private $Id;
	private $Name;
	private $URL;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null , $URL=Null) {
        $this->Id = $Id;
		$this->Name = $Name;
		$this->URL = $URL;
        parent::__construct( $Id );
    }
    function getId() {
        return $this->Id;
    }	
	function getIdPrint(){
        return "u" . $this->getId();
    }	
	
    function setName( $Name ) {
        $this->Name = $Name;
        $this->markDirty();
    }
   
	function getName( ) {
        return $this->Name;
    }
	
	function setURL( $URL ) {
        $this->URL = $URL;
        $this->markDirty();
    }
   
	function getURL( ) {
        return $this->URL;
    }
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
		
	function getURLUpdLoad(){
		return "/app/linked/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/app/linked/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){		
		return "/app/linked/".$this->getId()."/del/load";
	}
	function getURLDelExe(){	
		return "/app/linked/".$this->getId()."/del/exe";
	}
		
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>