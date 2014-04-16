<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Anime extends Object{

    private $Id;
	private $Name;
	private $Html;
    	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Html=null){$this->Id = $Id;$this->Name = $Name;$this->Html = $Html; parent::__construct( $Id );}
    function getId( ) {return $this->Id;}
	
    function setName( $Name ){$this->Name = $Name;$this->markDirty();}
    function getName( ) {return $this->Name;}
	
	function setHtml( $Html ){$this->Html = $Html;$this->markDirty();}
    function getHtml( ) {return $this->Html;}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name'			=> $this->getName(),
			'Html'			=> $this->getHtml()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];
		$this->Html 	= $Data[2];
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
						
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>