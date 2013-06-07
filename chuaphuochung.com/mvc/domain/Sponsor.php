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
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $TimeStart=null, $TimeEnd=null, $Content=null, $Type=null){$this->Id = $Id;$this->Name = $Name;$this->TimeStart = $TimeStart;$this->TimeEnd = $TimeEnd;$this->Content = $Content;$this->Type = $Type;parent::__construct( $Id );}
    function getId( ) {return $this->Id;}
		
    function setName( $Name ){$this->Name = $Name;$this->markDirty();}
    function getName( ) {return $this->Name;}
	
	function setTimeStart( $TimeStart ) {$this->TimeStart = $TimeStart;$this->markDirty();}
    function getTimeStart( ){return $this->TimeStart;}
	function getTimeStartPrint( ){return $this->TimeStart;}
	
	function setTimeEnd( $TimeEnd ){$this->TimeEnd = $TimeEnd;$this->markDirty();}
    function getTimeEnd( ) {return $this->TimeEnd;}
	function getTimeEndPrint( ){return $this->TimeEnd;}
		
	function setContent( $Content ) {$this->Content = $Content;$this->markDirty();}
	function getContent( ) {return $this->Content;}
		
	function setType( $Type ) {$this->Type = $Type;$this->markDirty();}
	function getType(){return $this->Type;}

	//-------------------------------------------------------------------------------
	//GET LIST
	//-------------------------------------------------------------------------------
	function getPersonAll(){
		$mSP = new \MVC\Mapper\SponsorPerson();
		$SPAll = $mSP->findBy(array($this->getId()));
		return $SPAll;
	}
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){return "/sponsor/".$this->getId();}
	function getURLSetting(){return "/app/sponsor/".$this->getId();}
	function getURLUpdLoad(){return "/app/sponsor/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/sponsor/".$this->getId()."/upd/exe";}	
	function getURLDelLoad(){return "/app/sponsor/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/sponsor/".$this->getId()."/del/exe";}
	
	function getURLPersonInsLoad(){return "/app/sponsor/".$this->getId()."/ins/load";}
	function getURLPersonInsExe(){return "/app/sponsor/".$this->getId()."/ins/exe";}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>