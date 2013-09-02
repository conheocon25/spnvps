<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class Album extends Object{

    private $Id;
	private $Name;
    private $Time;
	private $URL;
	private $Note;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Time=null, $URL=null, $Note=null){
        $this->Id = $Id;
		$this->Name = $Name;
		$this->Time = $Time;
		$this->URL = $URL;
		$this->Note = $Note;
        parent::__construct( $Id );
    }
    function getId( ) {
        return $this->Id;
    }
	function getIdPrint( ) {
        return "album".$this->Id;
    }
	
    function setName( $Name ){
        $this->Name = $Name;
        $this->markDirty();
    }
    function getName( ) {
        return $this->Name;
    }
	
	function setTime( $Time ) {
        $this->Time = $Time;
        $this->markDirty();
    }
    function getTime( ) {
        return $this->Time;
    }
	
	function setURL( $URL ) {
        $this->URL = $URL;
        $this->markDirty();
    }
    function getURL( ) {
        return $this->URL;
    }
	
	function getTimePrint( ) {
        $num = new Number($this->Time);
		return $num->formatCurrency()." đ";
    }
	function getNote( ) {
        return $this->Note;
    }
	function setNote( $Note ) {
        $this->Note = $Note;
        $this->markDirty();
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){		
		return "/library/album/".$this->getId();
	}
	
	function getURLUpdLoad(){		
		return "/app/album/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){
		return "/app/album/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){
		return "/app/album/".$this->getId()."/del/load";
	}
	function getURLDelExe(){
		return "/app/album/".$this->getId()."/del/exe";
	}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}

?>
