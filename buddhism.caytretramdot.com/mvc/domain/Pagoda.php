<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Pagoda extends Object{

    private $Id;
	private $IdProvince;
	private $IdDistrict;
	private $Name;
	private $Address;
	private $Latitude;
	private $Longitude;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdProvince=null, $IdDistrict=null, $Name=null, $Address=null, $Latitude=0, $Longitude=0) {
		$this->Id 			= $Id;
		$this->IdProvince	= $IdProvince;
		$this->IdDistrict	= $IdDistrict;
		$this->Name 		= $Name; 
		$this->Address 		= $Address;
		$this->Latitude 	= $Latitude;
		$this->Longitude 	= $Longitude;
		
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
	
	function setIdProvince( $IdProvince ) {$this->IdProvince = $IdProvince;$this->markDirty();}   
	function getIdProvince( ) {return $this->IdProvince;}
	
	function setIdDistrict( $IdDistrict ) {$this->IdDistrict = $IdDistrict;$this->markDirty();}   
	function getIdDistrict( ) {return $this->IdDistrict;}
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}   
	function getAddress( ) {return $this->Address;}
	
	function setLatitude( $Latitude ) {$this->Latitude = $Latitude;$this->markDirty();}   
	function getLatitude( ) {return $this->Latitude;}	
	
	function setLongitude( $Longitude ) {$this->Longitude = $Longitude;$this->markDirty();}   
	function getLongitude( ) {return $this->Longitude;}	
			
	function toXML(){
		$S = "
		<object>
			<id>".$this->getId()."</id>
			<id_province>".$this->getIdProvince()."</id_province>
			<id_district>".$this->getIdDistrict()."</id_district>
			<name>".$this->getName()."</name>
			<address>".$this->getAddress()."</address>
			<latitude>".$this->getLatitude()."</latitude>
			<longitude>".$this->getLongitude()."</longitude>			
		</object>
		";
		return $S;
	}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getEventAll(){
		$mEvent = new \MVC\Mapper\Event();
		$EventAll = $mEvent->findBy(array($this->getId()));
		return $EventAll;
	}	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------			
					
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>