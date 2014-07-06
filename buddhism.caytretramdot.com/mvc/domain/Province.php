<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Province extends Object{

    private $Id;
	private $Name;	
	private $Latitude;
	private $Longitude;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Latitude=0, $Longitude=0){
		$this->Id 			= $Id;
		$this->Name 		= $Name; 		
		$this->Latitude 	= $Latitude;
		$this->Longitude 	= $Longitude;
		
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
		
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
			
	function setLatitude( $Latitude ) {$this->Latitude = $Latitude;$this->markDirty();}   
	function getLatitude( ) {return $this->Latitude;}	
	
	function setLongitude( $Longitude ) {$this->Longitude = $Longitude;$this->markDirty();}   
	function getLongitude( ) {return $this->Longitude;}	
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name'			=> $this->getName(),	
		 	'Latitude'		=> $this->getLatitude(),
			'Longitude'		=> $this->getLongitude()			
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];		
		$this->Latitude = $Data[2];		
		$this->Longitude= $Data[3];		
    }
	
	function toXML(){
		$S = "
		<object>
			<id>".$this->getId()."</id>
			<name>".$this->getName()."</name>			
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