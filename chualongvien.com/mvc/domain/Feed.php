<?php
Namespace MVC\Domain;
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
		
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name'			=> $this->getName(),
			'Picture'		=> $this->getPicture(),
		 	'Order'			=> $this->getOrder(),
			'Type'			=> $this->getType(),
			'BType'			=> $this->getBType(),
			'Key'			=> $this->getKey()
		);				
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];
		$this->Picture 	= $Data[2];
		$this->Order 	= $Data[3];		
		$this->Type 	= $Data[4];
		$this->BType 	= $Data[5];
		$this->reKey();
    }	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
							
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}
?>