<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class Sponsor extends Object{
    private $Id;
	private $Name;
    private $TimeStart;
	private $TimeEnd;
	private $Content;
	private $Type;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $TimeStart=null, $TimeEnd=null, $Content=null, $Type=null, $Key=null){$this->Id = $Id;$this->Name = $Name;$this->TimeStart = $TimeStart;$this->TimeEnd = $TimeEnd;$this->Content = $Content;$this->Type = $Type; $this->Key = $Key; parent::__construct( $Id );}
    function getId( ) {return $this->Id;}
		
    function setName( $Name ){$this->Name = $Name;$this->markDirty();}
    function getName( ) {return $this->Name;}
	
	function setTimeStart( $TimeStart ) {$this->TimeStart = $TimeStart;$this->markDirty();}
    function getTimeStart( ){return $this->TimeStart;}
	function getTimeStartPrint( ){$Time = \date("d/m/y", strtotime($this->TimeStart));return $Time;}
	
	function setTimeEnd( $TimeEnd ){$this->TimeEnd = $TimeEnd;$this->markDirty();}
    function getTimeEnd( ) {return $this->TimeEnd;}
	function getTimeEndPrint( ){$Time = \date("d/m/y", strtotime($this->TimeEnd));return $Time;}
		
	function setContent( $Content ) {$this->Content = $Content;$this->markDirty();}
	function getContent( ) {return $this->Content;}
		
	function setType( $Type ) {$this->Type = $Type;$this->markDirty();}
	function getType(){return $this->Type;}
	
	function setKey( $Key ){$this->Key = $Key;$this->markDirty();}
	function getKey( ) {return $this->Key;}
	function reKey( ){
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}

	//-------------------------------------------------------------------------------
	//GET LIST
	//-------------------------------------------------------------------------------
	function getPaidAll(){
		$mSP = new \MVC\Mapper\SponsorPaid();
		$SPAll = $mSP->findBy(array($this->getId()));
		return $SPAll;
	}
	
	function getPersonAll(){
		$mSP = new \MVC\Mapper\SponsorPerson();
		$SPAll = $mSP->findBy(array($this->getId()));
		return $SPAll;
	}
	
	function getVideoAll(){
		$mVS = new \MVC\Mapper\VideoSponsor();
		$VSAll = $mVS->findBy(array($this->getId()));
		return $VSAll;
	}
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){return "/so-vang/".$this->getKey();}
	function getURLSetting(){return "/app/sponsor/".$this->getId();}
	function getURLVideo(){return "/app/sponsor/".$this->getId()."/video";}
	function getURLPaid(){return "/app/sponsor/".$this->getId()."/paid";}
	function getURLUpdLoad(){return "/app/sponsor/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/sponsor/".$this->getId()."/upd/exe";}	
	function getURLDelLoad(){return "/app/sponsor/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/sponsor/".$this->getId()."/del/exe";}
	
	function getURLPaidInsLoad(){return "/app/sponsor/".$this->getId()."/paid/ins/load";}
	function getURLPaidInsExe(){return "/app/sponsor/".$this->getId()."/paid/ins/exe";}
	
	function getURLPersonInsLoad(){return "/app/sponsor/".$this->getId()."/ins/load";}
	function getURLPersonInsExe(){return "/app/sponsor/".$this->getId()."/ins/exe";}
	
	function getURLVideoInsLoad(){return "/app/sponsor/".$this->getId()."/video/ins/load";}
	function getURLVideoInsExe(){return "/app/sponsor/".$this->getId()."/video/ins/exe";}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>