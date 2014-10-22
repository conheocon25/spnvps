<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Monk extends Object{

    private $Id;
	private $IdPagoda;
	private $Name;
	private $Alias;
	private $Birthday;	
	private $Note;
	private $Picture;
	private $Viewed;
	private $Rated;
		
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdPagoda=null,  $Name=null , $Alias=Null, $Birthday=Null, $Note=Null, $Picture=Null, $Viewed=Null, $Rated=Null){
		$this->Id 		= $Id;
		$this->IdPagoda = $IdPagoda;
		$this->Name 	= $Name;
		$this->Alias 	= $Alias;
		$this->Birthday = $Birthday;
		$this->Note 	= $Note;
		$this->Picture 	= $Picture;
		$this->Viewed 	= $Viewed;
		$this->Rated 	= $Rated;
		parent::__construct( $Id );
	}
	
    function getId() {return $this->Id;}
	
	function setIdPagoda( $IdPagoda ) {$this->IdPagoda = $IdPagoda;$this->markDirty();}   
	function getIdPagoda( ) {return $this->IdPagoda;}
	function getPagoda( ) {
		$mPagoda 	= new \MVC\Mapper\Pagoda();
		$Pagoda 	= $mPagoda->find($this->IdPagoda);
		return $Pagoda;
	}
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setAlias( $Alias ) {$this->Alias = $Alias;$this->markDirty();}   
	function getAlias( ) {return $this->Alias;}
	
	function setBirthday( $Birthday ) {$this->Birthday = $Birthday;$this->markDirty();}   
	function getBirthday( ) {return $this->Birthday;}
			
	function setNote( $Note ) {$this->Note = $Note;$this->markDirty();}   
	function getNote( ){return $this->Note;}

	function setPicture( $Picture ) {$this->Picture = $Picture;$this->markDirty();} 
	function getPicture( ){return $this->Picture;}
	
	function setViewed( $Viewed ) {$this->Viewed = $Viewed;$this->markDirty();} 
	function getViewed( ){return $this->Viewed;}
	
	function setRated( $Rated ) {$this->Rated = $Rated;$this->markDirty();} 
	function getRated( ){return $this->Rated;}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
				
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>