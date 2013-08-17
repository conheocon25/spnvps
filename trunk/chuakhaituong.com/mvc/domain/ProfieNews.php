<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class ProfileNews extends Object{

    private $Id;
	private $Name;
	private $IdCategory;
	private $RSS;
		
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=Null, $IdCategory=null, $RSS=Null){
        $this->Id = $Id;
		$this->Name = $Name;
		$this->IdCategory = $IdCategory;		
		$this->RSS = $RSS;
		
        parent::__construct( $Id );
    }
    function getId() {return $this->Id;}	
		
	function setName( $Name ){$this->Name = $Name; $this->markDirty();}   
	function getName( ) {return $this->Name;}
	
    function setIdCategory( $IdCategory ) {$this->IdCategory = $IdCategory;$this->markDirty();}
	function getIdCategory( ) {return $this->IdCategory;}
	function getCategory(){$mCategory = new \MVC\Mapper\CategoryProfileNews();$Category = $mCategory->find($this->getIdCategory());return $Category;}
	
	function setRSS( $RSS ){$this->RSS = $RSS;$this->markDirty();}   
	function getRSS( ) {return $this->RSS;}
		
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){return "/app/category/news/".$this->getIdCategory()."/profile/".$this->getId()."/detail";}
	function getURLUpdateAllExe(){return "/app/category/news/".$this->getIdCategory()."/profile/".$this->getId()."/updateall/exe";}
	function getURLUpdLoad(){return "/app/category/news/".$this->getIdCategory()."/profile/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/category/news/".$this->getIdCategory()."/profile/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/category/news/".$this->getIdCategory()."/profile/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/category/news/".$this->getIdCategory()."/profile/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>