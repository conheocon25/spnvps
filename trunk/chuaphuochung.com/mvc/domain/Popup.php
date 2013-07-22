<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Popup extends Object{

    private $Id;
	private $Command;
	private $Enable;
	private $URL;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Command=null , $Enable=Null, $URL=Null) {$this->Id = $Id;$this->Command = $Command;$this->Enable = $Enable;$this->URL = $URL;parent::__construct( $Id );}
    function getId() {return $this->Id;}
		
    function setCommand( $Command ) {$this->Command = $Command;$this->markDirty();}   
	function getCommand( ) {return $this->Command;}
	
	function setEnable( $Enable ) {$this->Enable = $Enable;$this->markDirty();}
	function getEnable( ) {return $this->Enable;}
	function getEnablePrint( ) {return $this->Enable==1?'Bật':'Tắt';}
	
	function setURL( $URL ) {$this->URL = $URL;$this->markDirty();}
	function getURL( ) {return $this->URL;}
	
	function getSource(){
		return "data/ads/".$this->Command.".swf";
	}
	function getSourceExits(){
		return file_exists("data/ads/".$this->Command.".swf");
	}
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
	function getURLView(){return "/app/popup/".$this->getId();}
	
	function getURLUpdLoad(){return "/app/popup/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/popup/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/popup/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/popup/".$this->getId()."/del/exe";}
					
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>