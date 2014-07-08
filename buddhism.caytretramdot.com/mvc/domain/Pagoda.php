<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Pagoda extends Object{

    private $Id;
	private $IdProvince;
	private $IdDistrict;
	private $IdMonk;
	private $Name;
	private $Address;
	private $Phone;
	private $Email;
	private $Website;
	private $Latitude;
	private $Longitude;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( 
		$Id=null, 
		$IdProvince=null, 
		$IdDistrict=null, 
		$IdMonk=null, 
		$Name=null, 
		$Address=null, 
		$Phone=null, 
		$Email=null, 
		$Website=null, 
		$Latitude=0, 
		$Longitude=0) 
	{
		$this->Id 			= $Id;
		$this->IdProvince	= $IdProvince;
		$this->IdDistrict	= $IdDistrict;
		$this->IdMonk		= $IdMonk;
		$this->Name 		= $Name; 
		$this->Address 		= $Address;
		$this->Phone 		= $Phone;
		$this->Email 		= $Email;
		$this->Website 		= $Website;
		$this->Latitude 	= $Latitude;
		$this->Longitude 	= $Longitude;
		
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
	
	function setIdProvince( $IdProvince ) {$this->IdProvince = $IdProvince;$this->markDirty();}   
	function getIdProvince( ) {return $this->IdProvince;}
	
	function setIdDistrict( $IdDistrict ) {$this->IdDistrict = $IdDistrict;$this->markDirty();}   
	function getIdDistrict( ) {return $this->IdDistrict;}
	
	function setIdMonk( $IdMonk ) {$this->IdMonk = $IdMonk;$this->markDirty();}   
	function getIdMonk( ) {return $this->IdMonk;}
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}   
	function getAddress( ) {return $this->Address;}
	
	function setPhone( $Phone ) {$this->Phone = $Phone;$this->markDirty();}   
	function getPhone( ) {return $this->Phone;}
	
	function setEmail( $Email ) {$this->Email = $Email;$this->markDirty();}   
	function getEmail( ) {return $this->Email;}
	
	function setWebsite( $Website ) {$this->Website = $Website;$this->markDirty();}   
	function getWebsite( ) {return $this->Website;}
	
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
			<id_monk>".$this->getIdMonk()."</id_monk>
			<name>".$this->getName()."</name>
			<address>".$this->getAddress()."</address>
			<phone>".$this->getPhone()."</phone>
			<email>".$this->getEmail()."</email>
			<website>".$this->getWebsite()."</website>
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