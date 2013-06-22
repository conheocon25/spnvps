<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryPaid extends Object{
    private $Id;
	private $Name;
	private $Order;
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Order=null) {$this->Id = $Id;$this->Name = $Name;$this->Order = $Order;parent::__construct( $Id );}
    function getId() {return $this->Id;}	
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}
	function getName( ) {return $this->Name;}
	
	function setOrder( $Order ) {$this->Order = $Order;$this->markDirty();}
	function getOrder( ) {return $this->Order;}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getPaidAll(){
		$mPaid = new \MVC\Mapper\Paid();
		$PaidAll = $mPaid->findBy(array($this->Id));
		return $PaidAll;
	}
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){return "/app/paid/".$this->getId();}
	function getURLPaidInsLoad(){return "/app/paid/".$this->getId()."/ins/load";}
	function getURLPaidInsExe(){return "/app/paid/".$this->getId()."/ins/exe";}
	
	function getURLUpdLoad(){return "/app/category/paid/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/category/paid/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/category/paid/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/category/paid/".$this->getId()."/del/exe";}
		
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>