<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class SponsorPaid extends Object{

    private $Id;
	private $IdSponsor;	
    private $Time;
	private $Value;
	private $Unit;
	private $Note;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdSponsor=null, $Time=null, $Value=null, $Unit=null, $Note=null){
        $this->Id = $Id;
		$this->IdSponsor = $IdSponsor;		
		$this->Time = $Time;		
		$this->Value = $Value;
		$this->Unit = $Unit;
		$this->Note = $Note;
		
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
	
	function setIdSponsor( $IdSponsor ){$this->IdSponsor = $IdSponsor;$this->markDirty();}
    function getIdSponsor( ) {return $this->IdSponsor;}
	function getSponsor( ) {$mSponsor = new \MVC\Mapper\Sponsor();$Sponsor = $mSponsor->find( $this->getIdSponsor() );return $Sponsor;}
	    	
	function setTime( $Time ) {$this->Time = $Time;$this->markDirty();}
    function getTime( ) {return $this->Time;}
	function getTimePrint( ) {
		$Date = \date("d/m/Y", strtotime($this->getTime()));
		return $Date;
	}
	
	function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}
    function getAddress( ) {return $this->Address;}
		
	function setValue( $Value ) {$this->Value = $Value;$this->markDirty();}
	function getValue( ) {return $this->Value;}
	function getValuePrint( ) { $num = new Number($this->Value);return $num->formatCurrency()." ".$this->getUnit();}
	
	function getUnit( ){return $this->Unit;}
	function setUnit( $Unit ) {$this->Unit = $Unit;$this->markDirty();}
	
	function getNote( ){return $this->Note;}
	function setNote( $Note ) {$this->Note = $Note;$this->markDirty();}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){ return "/sponsor/".$this->getIdSponsor()."/".$this->getId();}
	function getURLUpdLoad(){return "/app/sponsor/".$this->getIdSponsor()."/paid/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/sponsor/".$this->getIdSponsor()."/paid/".$this->getId()."/upd/exe";}	
	function getURLDelLoad(){return "/app/sponsor/".$this->getIdSponsor()."/paid/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/sponsor/".$this->getIdSponsor()."/paid/".$this->getId()."/del/exe";}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}

?>
