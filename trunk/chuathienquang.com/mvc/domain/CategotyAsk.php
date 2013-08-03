<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryAsk extends Object{

    private $Id;
	private $Name;
	private $Order;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null , $Order=Null, $Key=Null) {$this->Id = $Id;$this->Name = $Name;$this->Order = $Order;$this->Key = $Key; parent::__construct( $Id );}
    function getId() {return $this->Id;}	
	function getIdPrint(){return "c" . $this->getId();}	
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setOrder( $Order ) {$this->Order = $Order;$this->markDirty();}
	function getOrder( ) {return $this->Order;}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}   
	function getKey( ) {return $this->Key;}
	function reKey( ) {
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getAsks(){
		$mAsk = new \MVC\Mapper\Ask();
		$Asks = $mAsk->findBy(array($this->getId()));
		return $Asks;
	}
	
	function getAsksLimit(){
		$mAsk = new \MVC\Mapper\Ask();
		$Asks = $mAsk->findByLimit(array($this->getId()));
		return $Asks;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){return "/hoi-dap/".$this->getKey();}
	function getURLView(){return "/app/category/ask/".$this->getId();}
	
	function getURLUpdLoad(){return "/app/category/ask/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/category/ask/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/category/ask/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/category/ask/".$this->getId()."/del/exe";}
	
	function getURLAskInsLoad(){return "/app/category/ask/".$this->getId()."/ins/load";}
	function getURLAskInsExe(){return "/app/category/ask/".$this->getId()."/ins/exe";}
	
	function getURLAskInsLoad1(){return "/ask/".$this->getId()."/ins/load";}
	function getURLAskInsExe1(){return "/ask/".$this->getId()."/ins/exe";}
	
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>