<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );
class Pagoda extends Object{

    private $Id;	
	private $Name;	
	private $Address;
	private $Phone;
	private $Website;
	private $Master;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null , $Address=Null, $Phone=Null, $Website=Null, $Master=Null, $Key=Null) {$this->Id = $Id;$this->Name = $Name;$this->Address = $Address;$this->Phone = $Phone;$this->Website = $Website;$this->Master = $Master; $this->Key = $Key; parent::__construct( $Id );}
    function getId() {return $this->Id;}	
	function getIdPrint(){return "p" . $this->getId();}	
			
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}   
	function getAddress( ) {return $this->Address;}
	
	function setPhone( $Phone ) {$this->Phone = $Phone;$this->markDirty();}   
	function getPhone( ) {return $this->Phone;}
	
	function setWebsite( $Website ) {$this->Website = $Website;$this->markDirty();}   
	function getWebsite( ){return $this->Website;}
	
	function setMaster( $Master ) {$this->Master = $Master;$this->markDirty();}   
	function getMaster( ){return $this->Master;}
	
	function setKey( $Key ){$this->Key = $Key;$this->markDirty();}
	function getKey( ) {return $this->Key;}
	function reKey( ){
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getVPs(){
		$mVP = new \MVC\Mapper\VideoPagoda();
		$VPs = $mVP->findBy( array($this->getId()) );
		return $VPs;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
	function getURLRead(){return "/chua-ban/".$this->getKey();}
	
	function getURLViewVideo(){return "/app/pagoda/".$this->getId()."/video";}	
	function getURLVideoInsLoad(){return "/app/pagoda/".$this->getId()."/video/ins/load";}
	function getURLVideoInsExe(){return "/app/pagoda/".$this->getId()."/video/ins/exe";}
	
	function getURLUpdLoad(){return "/app/pagoda/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/pagoda/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/pagoda/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/pagoda/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>