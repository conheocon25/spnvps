<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Feed extends Object{

    private $Id;
	private $Email;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------    	
    function __construct( $Id=null, $Email=null){
        $this->Id 		= $Id;
		$this->Email 	= $Email;
	
        parent::__construct( $Id );
    }
    function getId(){return $this->Id;}	
	    	
	function setEmail( $Email ) {$this->Email = $Email;$this->markDirty();}   
	function getEmail( ) {return $this->Email;}
	
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name'			=> $this->getName(),		 	
		 	'Time'			=> $this->getTime(),
			'URL'			=> $this->getURL(),
			'Note'			=> $this->getNote(),
			'Key'			=> $this->getKey()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];		
		$this->Time 	= $Data[2];
		$this->URL 		= $Data[3];
		$this->Note 	= $Data[4];
		$this->reKey();
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){return "hinh-anh-hoat-dong/".$this->getKey();}
					
	//-------------------------------------------------------------------------------    
	static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}		
}
?>