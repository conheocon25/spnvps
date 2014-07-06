<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class EventMP3 extends Object{

    private $Id;
	private $IdEvent;
	private $Name;
	private $DateCreated;
	private $DateUpdated;
	private $IdMP3;
	private $Note;
	private $Viewed;
	private $Rated;
			
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( 
		$Id=null, 
		$IdEvent=null, 
		$Name=null, 
		$DateCreated=null, 
		$DateUpdated=null,
		$IdMP3=null,
		$Note=null,
		$Viewed=null,
		$Rated=null,
		$Content=null){
		
		$this->Id 			= $Id;
		$this->IdEvent 		= $IdEvent;
		$this->Name 		= $Name; 
		$this->DateCreated 	= $DateCreated;
		$this->DateUpdated 	= $DateUpdated;
		$this->IdMP3 	= $IdMP3;
		$this->Note 		= $Note;
		$this->Viewed		= $Viewed;
		$this->Rated		= $Rated;
		
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
		
	function setIdEvent( $IdEvent ) {$this->IdEvent = $IdEvent;$this->markDirty();}
	function getIdEvent( ) {return $this->IdEvent;}
	
	function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setDateCreated( $DateCreated ) {$this->DateCreated = $DateCreated;$this->markDirty();}   
	function getDateCreated( ) {return $this->DateCreated;}
	
	function setDateUpdated( $DateUpdated ) {$this->DateUpdated = $DateUpdated;$this->markDirty();}   
	function getDateUpdated( ) {return $this->DateUpdated;}
			
	function setIdMP3( $IdMP3 ) {$this->IdMP3 = $IdMP3;$this->markDirty();}   
	function getIdMP3( ) {return $this->IdMP3;}	
	
	function setNote( $Note ) {$this->Note = $Note;$this->markDirty();}   
	function getNote( ) {return $this->Note;}
	
	function setViewed( $Viewed ) {$this->Viewed = $Viewed;$this->markDirty();}   
	function getViewed( ) {return $this->Viewed;}	
	
	function setRated( $Rated ) {$this->Rated = $Rated;$this->markDirty();}   
	function getRated( ) {return $this->Rated;}	
	
	function toXML(){
		$S = "
		<object>
			<id>".$this->getId()."</id>
			<id_event>".$this->getIdEvent()."</id_event>
			<name>".$this->getName()."</name>
			<date_created>".$this->getDateCreated()."</date_created>
			<date_updated>".$this->getDateUpdated()."</date_updated>
			<id_mp3>".$this->getIdMP3()."</id_mp3>
			<note>".$this->getNote()."</note>
			<viewed>".$this->getViewed()."</viewed>
			<rated>".$this->getRated()."</rated>
		</object>
		";
		return $S;
	}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
					
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}
?>