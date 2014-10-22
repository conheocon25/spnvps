<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Event extends Object{

    private $Id;
	private $IdPagoda;
	private $Name;
	private $Date;
	private $Content;
		
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdPagoda=null, $Name=null, $Date=null, $Content=null){
		$this->Id 			= $Id;
		$this->IdPagoda 	= $IdPagoda;
		$this->Name 		= $Name; 
		$this->Date 		= $Date;
		$this->Content 		= $Content;
				
		parent::__construct( $Id );
	}
    function getId() {return $this->Id;}	
		
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setIdPagoda( $IdPagoda ) {$this->IdPagoda = $IdPagoda;$this->markDirty();}   
	function getIdPagoda( ) {return $this->IdPagoda;}
	
	function setDate( $Date ) {$this->Date = $Date;$this->markDirty();}   
	function getDate( ) {return $this->Date;}
			
	function setContent( $Content ) {$this->Content = $Content;$this->markDirty();}   
	function getContent( ) {return $this->Content;}	
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdPagoda' 		=> $this->getIdPagoda(),
			'Name'			=> $this->getName(),
			'Date'			=> $this->getDate(),
		 	'Content'		=> $this->getContent()			
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->IdPagoda	= $Data[1];
		$this->Name 	= $Data[2];
		$this->Date 	= $Data[3];
		$this->Content 	= $Data[4];
    }
	
	function toXML(){
		$S = "
		<object>
			<id>".$this->getId()."</id>
			<id_pagoda>".$this->getIdPagoda()."</id_pagoda>
			<name>".$this->getName()."</name>
			<date>".$this->getDate()."</date>
			<content>".$this->getContent()."</content>			
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