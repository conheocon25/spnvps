<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Paid extends Object{

    private $Id;
	private $IdCategory;
	private $Date;
	private $Description;
	private $Value;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdCategory=null, $Date=Null, $Description=null, $Value=null){
        $this->Id = $Id;
		$this->IdCategory = $IdCategory;
		$this->Date = $Date;
		$this->Description = $Description;
		$this->Value = $Value;
		
        parent::__construct( $Id );
    }
    function getId() {return $this->Id;}		
		
	function setDate( $Date ){$this->Date = $Date;$this->markDirty();}   
	function getDate( ) {return $this->Date;}
	function getDatePrint( ){$D = new \MVC\Library\Date($this->Date);return $D->getDateTimeFormat();}
	
	function setIdCategory( $IdCategory ){$this->IdCategory = $IdCategory;$this->markDirty();}   
	function getIdCategory( ) {return $this->IdCategory;}
		
	function setDescription( $Description ){$this->Description = $Description;$this->markDirty();}
	function getDescription( ) {return $this->Description;}
	
	function setValue( $Value ){$this->Value = $Value;$this->markDirty();} 
	function getValue( ) {return $this->Value;}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE Value
	//-------------------------------------------------------------------------------
	function getValueRead(){return "/task/".$this->getId();}
	
	function getURLUpdLoad(){return "/app/paid/".$this->getIdCategory()."/".$this->getId()."/upd/load";	}
	function getURLUpdExe(){return "/app/paid/".$this->getIdCategory()."/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/paid/".$this->getIdCategory()."/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/paid/".$this->getIdCategory()."/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>