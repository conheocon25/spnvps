<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class RssLink extends Object{

    private $Id;	
	private $Name;
	private $Date;
	private $Picture;
	private $Content;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Date=null, $Picture=null, $Content=null, $Key=null){
		$this->Id 			= $Id;		
		$this->Name 		= $Name; 
		$this->Date 		= $Date;
		$this->Picture		= $Picture;
		$this->Content 		= $Content;
		$this->Key 			= $Key;
		
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
		
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setDate( $Date ) {$this->Date = $Date;$this->markDirty();}   
	function getDate( ) {return $this->Date;}
	function getDatePrint( ){$D = new \MVC\Library\Date($this->Date);return $D->getDateFormat();}
	
	function setPicture( $Picture ) {$this->Picture = $Picture;$this->markDirty();}   
	function getPicture( ) {return $this->Picture;}
	
	function setContent( $Content ) {$this->Content = $Content;$this->markDirty();}   
	function getContent( ) {return $this->Content;}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}   
	function getKey( ) {return $this->Key;}
	
	function reKey( ){
		$Id = $this->getId();
		if (!isset($Id)||$Id==0) $Id = time();
		$Str = new \MVC\Library\String($this->Name." ".$Id);
		$this->Key = $Str->converturl();		
	}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),			
			'Name'			=> $this->getName(),
			'Date'			=> $this->getDate(),
			'Picture' 		=> $this->getPicture(),
		 	'Content'		=> $this->getContent(),
			'Key'			=> $this->getKey()			
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];
		$this->Date 	= $Data[2];
		$this->Picture	= $Data[3];
		$this->Content 	= $Data[4];
		$this->Key	 	= $Data[5];
    }
			
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){return "/su-kien/".$this->getKey();}
	function getURLUpdLoad(){return "/app/event/".$this->getId()."/upd/load";}	
	function getURLUpdExe()	{return "/app/event/".$this->getId()."/upd/exe";}
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}
?>