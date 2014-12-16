<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class RssLink extends Object{

    private $Id;	
	private $Name;
	private $Weburl;
	private $Rssurl;
	private $Type;
	private $Enable;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Weburl=null, $Rssurl=null, $Type=null, $Enable=null){
		$this->Id 			= $Id;		
		$this->Name 		= $Name; 
		$this->Weburl 		= $Weburl;
		$this->Rssurl		= $Rssurl;
		$this->Type 		= $Type;
		$this->Enable 			= $Enable;
		
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
		
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setWeburl( $Weburl ) {$this->Weburl = $Weburl;$this->markDirty();}   
	function getWeburl( ) {return $this->Weburl;}
	
	
	function setRssurl( $Rssurl ) {$this->Rssurl = $Rssurl;$this->markDirty();}   
	function getRssurl( ) {return $this->Rssurl;}
	
	function setType( $Type ) {$this->Type = $Type;$this->markDirty();}   
	function getType( ) {return $this->Type;}
	
	function setEnable( $Enable ) {$this->Enable = $Enable;$this->markDirty();}   
	function getEnable( ) {return $this->Enable;}
	
	
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),			
			'Name'			=> $this->getName(),
			'Weburl'		=> $this->getWeburl(),
			'Rssurl' 		=> $this->getRssurl(),
		 	'Type'			=> $this->getType(),
			'Enable'		=> $this->getEnable()			
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];
		$this->Weburl 	= $Data[2];
		$this->Rssurl	= $Data[3];
		$this->Type 	= $Data[4];
		$this->Enable	 	= $Data[5];
    }
			
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){return "/rss/".$this->getKey();}
	function getURLUpdLoad(){return "/app/rss/".$this->getId()."/upd/load";}	
	function getURLUpdExe()	{return "/app/rss/".$this->getId()."/upd/exe";}
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}
?>