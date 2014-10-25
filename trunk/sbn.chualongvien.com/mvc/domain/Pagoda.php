<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Pagoda extends Object{

    private $Id;
	private $IdDistrict;
	private $Name;
	private $Address;
	private $Phone;
	private $Email;
	private $Website;
	private $Monk;	
	private $Latitude;
	private $Longitude;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdDistrict=null, $Name=null, $Address=null, $Phone=null, $Email=null, $Website=null, $Monk=null,  $Latitude=0, $Longitude=0, $Key=null){
		$this->Id 			= $Id;
		$this->IdDistrict 	= $IdDistrict;
		$this->Name 		= $Name;
		$this->Address 		= $Address;
		$this->Phone 		= $Phone;
		$this->Email 		= $Email;
		$this->Website 		= $Website;
		$this->Monk 		= $Monk;
		$this->Latitude 	= $Latitude;
		$this->Longitude 	= $Longitude;
		$this->Key 			= $Key;
		
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
		
    function setIdDistrict( $IdDistrict ) {$this->IdDistrict = $IdDistrict;$this->markDirty();}   
	function getIdDistrict( ) {return $this->IdDistrict;}
	function getDistrict( ) {
		$mDistrict = new \MVC\Mapper\District();
		$District = $mDistrict->find($this->getIdDistrict());
		return $District;
	}
	
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
	
	function setMonk( $Monk ) {$this->Monk = $Monk;$this->markDirty();}   
	function getMonk( ) {return $this->Monk;}
	
	function setLatitude( $Latitude ) {$this->Latitude = $Latitude;$this->markDirty();}   
	function getLatitude( ) {return $this->Latitude;}
	
	function setLongitude( $Longitude ) {$this->Longitude = $Longitude;$this->markDirty();}   
	function getLongitude( ) {return $this->Longitude;}	
		
	function setKey( $Key ){$this->Key = $Key;$this->markDirty();}
	function getKey( ) {return $this->Key;}
	function reKey( ){
		$Id = $this->getId();		
		$Str = new \MVC\Library\String($this->Name." ".$Id);
		$this->Key = $Str->converturl();		
	}
	
	function getMonkAll(){
		$mMonk 		= new \MVC\Mapper\Monk();
		$MonkAll 	= $mMonk->findByPagoda(array($this->getId()));
		return $MonkAll;
	}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdDistrict' 	=> $this->getIdDistrict(),
			'Name'			=> $this->getName(),			
			'Address'		=> $this->getAddress(),
			'Phone'			=> $this->getPhone(),
			'Email'			=> $this->getEmail(),
			'Website'		=> $this->getWebsite(),
			'Monk'			=> $this->getMonk(),
		 	'Latitude'		=> $this->getLatitude(),
			'Longitude'		=> $this->getLongitude(),
			'Key'			=> $this->getLongitude()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 			= $Data[0];
		$this->IdDistrict 	= $Data[1];
		$this->Name 		= $Data[2];
		$this->Address 		= $Data[3];
		$this->Phone 		= $Data[4];
		$this->Email 		= $Data[5];
		$this->Website 		= $Data[6];
		$this->Monk 		= $Data[7];
		$this->Latitude 	= $Data[8];		
		$this->Longitude	= $Data[9];
		$this->reKey();
    }
			
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------			
	function getURLView(){
		return "/danh-ba/".$this->getKey();
	}
	
	function getURLSettingEvent(){
		return "/app/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getId()."/event";
	}
	function getURLSettingMonk(){
		return "/app/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getId()."/monk";
	}
	function getURLSettingPost(){
		return "/app/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getId()."/post";
	}
	function getURLSettingVideo(){
		return "/app/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getId()."/video";
	}
	function getURLSettingAlbum(){
		return "/app/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getId()."/album";
	}
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>