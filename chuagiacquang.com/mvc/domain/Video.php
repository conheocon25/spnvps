<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class Video extends Object{

    private $Id;	
	private $Name;
    private $Time;
    private $URL;
	private $Note;
	private $Count;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Time=null, $URL=null, $Note=null, $Count=null) {
        $this->Id = $Id;
		$this->Name = $Name;
		$this->Time = $Time;
		$this->URL = $URL;
		$this->Note = $Note;
		$this->Count = $Count;
        parent::__construct( $Id );
    }
	function setId( $Id ){
        return $this->Id = $Id;
    }
    function getId( ) {
        return $this->Id;
    }
	function getIdPrint( ) {
        return "video".$this->Id;
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
	function getIdURL( ){		
		list($http, $sym, $addr1, $addr2, $addr3) = explode("/", $this->URL);
        return $addr3;
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
	function getURLImage(){
		return "http://img.youtube.com/vi/".$this->getIdURL()."/2.jpg";
	}
		
	function setCount( $Count ) {
        $this->Count = $Count;
        $this->markDirty();
    }
	function getCount( ) {
        return $this->Count;
    }
	function getCountPrint( ) {
		$N = new \MVC\Library\Number($this->Count);		
        return $N->formatCurrency();
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLView(){
		return "/library/video/".$this->getId();
	}
	
	function getURLUpdLoad(){
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/del/load";
	}
	function getURLDelExe(){
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/del/exe";
	}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}

?>
