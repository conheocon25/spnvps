<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Monk extends Object{

    private $Id;
	private $PreName;
	private $Name;
	private $Pagoda;
	private $Phone;
	private $Note;
	private $Type;
	private $BType;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $PreName=null, $Name=null , $Pagoda=Null, $Phone=Null, $Note=Null, $Type=Null, $BType=Null){$this->Id = $Id;$this->PreName = $PreName;$this->Name = $Name;$this->Pagoda = $Pagoda;$this->Phone = $Phone;$this->Note = $Note;$this->Type = $Type;$this->BType = $BType;parent::__construct( $Id );}
    function getId() {return $this->Id;}	
	function getIdPrint(){return "l" . $this->getId();}	
	
	function setPreName( $PreName ) {$this->PreName = $PreName;$this->markDirty();}   
	function getPreName( ) {return $this->PreName;}
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setPagoda( $Pagoda ) {$this->Pagoda = $Pagoda;$this->markDirty();}   
	function getPagoda( ) {return $this->Pagoda;}
	
	function setPhone( $Phone ) {$this->Phone = $Phone;$this->markDirty();}   
	function getPhone( ) {return $this->Phone;}
	
	function setNote( $Note ) {$this->Note = $Note;$this->markDirty();}   
	function getNote( ){return $this->Note;}
	
	function setType( $Type ) {$this->Type = $Type;$this->markDirty();}   
	function getType( ){return $this->Type;}
	function isVIP( ){if ($this->Type == 1)return true;return false;}
	
	function setBType( $BType ) {$this->BType = $BType;$this->markDirty();} 
	function getBType( ){return $this->BType;}
	function getBTypeName( ){
		$mBType = new \MVC\Mapper\CategoryBType();
		$BType = $mBType->find($this->BType);
		if (!isset($BType))
			return "Chưa rõ";
        return $BType->getName();
    }
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getVMs(){
		$mVM = new \MVC\Mapper\VideoMonk();
		$VMs = $mVM->findBy( array($this->getId()) );
		return $VMs;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
	function getURLRead(){return "/library/video/".$this->getBType()."/monk/".$this->getId();}
	function getURLView(){return "/app/monk";}
	function getURLVideo(){return "/app/monk/".$this->getId()."/video";}
	function getURLVideoInsLoad(){return "/app/monk/".$this->getId()."/video/ins/load";}
	function getURLVideoInsExe(){return "/app/monk/".$this->getId()."/video/ins/exe";}
	
	function getURLUpdLoad(){return "/app/monk/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/monk/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/monk/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/monk/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>