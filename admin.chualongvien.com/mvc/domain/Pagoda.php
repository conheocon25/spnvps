<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Pagoda extends Object{

    private $Id;
	private $Name;
	private $Address;
	private $Latitude;
	private $Longitude;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Address=null, $Latitude=0, $Longitude=0) {
		$this->Id 			= $Id;
		$this->Name 		= $Name; 
		$this->Address 		= $Address;
		$this->Latitude 	= $Latitude;
		$this->Longitude 	= $Longitude;
		
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
		
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}   
	function getAddress( ) {return $this->Address;}
	
	function setLatitude( $Latitude ) {$this->Latitude = $Latitude;$this->markDirty();}   
	function getLatitude( ) {return $this->Latitude;}	
	
	function setLongitude( $Longitude ) {$this->Longitude = $Longitude;$this->markDirty();}   
	function getLongitude( ) {return $this->Longitude;}	
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name'			=> $this->getName(),
			'Address'		=> $this->getAddress(),
		 	'Latitude'		=> $this->getLatitude(),
			'Longitude'		=> $this->getLongitude()			
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];
		$this->Address 	= $Data[2];
		$this->Latitude = $Data[3];		
		$this->Longitude= $Data[4];		
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
	function getURLSettingEvent(){return "/app/pagoda/".$this->getId()."/event";}
				
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>