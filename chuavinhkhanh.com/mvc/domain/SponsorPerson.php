<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class SponsorPerson extends Object{

    private $Id;
	private $IdSponsor;
	private $Name;
    private $Time;
	private $Address;
	private $Value;
	private $Unit;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdSponsor=null, $Name=null, $Time=null, $Address=null, $Value=null, $Unit=null){
        $this->Id = $Id;
		$this->IdSponsor = $IdSponsor;
		$this->Name = $Name;
		$this->Time = $Time;
		$this->Address = $Address;
		$this->Value = $Value;
		$this->Unit = $Unit;
		
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
	
	function setIdSponsor( $IdSponsor ){$this->IdSponsor = $IdSponsor;$this->markDirty();}
    function getIdSponsor( ) {return $this->IdSponsor;}
	function getSponsor( ) {$mSponsor = new \MVC\Mapper\Sponsor();$Sponsor = $mSponsor->find( $this->getIdSponsor() );return $Sponsor;}
	
    function setName( $Name ){$this->Name = $Name;$this->markDirty();}
    function getName( ) {return $this->Name;}
	
	function setTime( $Time ) {$this->Time = $Time;$this->markDirty();}
    function getTime( ) {return $this->Time;}
	function getTimePrint( ) {return $this->Time;}
	
	function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}
    function getAddress( ) {return $this->Address;}
		
	function setValue( $Value ) {$this->Value = $Value;$this->markDirty();}
	function getValue( ) {return $this->Value;}
	function getValuePrint( ) { $num = new Number($this->Value);return $num->formatCurrency();}
	
	function getUnit( ){return $this->Unit;}
	function setUnit( $Unit ) {$this->Unit = $Unit;$this->markDirty();}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){ return "/sponsor/".$this->getIdSponsor()."/".$this->getId();}
	function getURLUpdLoad(){return "/app/sponsor/".$this->getIdSponsor()."/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/sponsor/".$this->getIdSponsor()."/".$this->getId()."/upd/exe";}	
	function getURLDelLoad(){return "/app/sponsor/".$this->getIdSponsor()."/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/sponsor/".$this->getIdSponsor()."/".$this->getId()."/del/exe";}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}

?>
