<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Dhammapada extends Object{

    private $Id;
	private $NameVi;
	private $NameEn;
			
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $NameVi=null, $NameEn=null){
        $this->Id = $Id;
		$this->NameVi = $NameVi;
		
        parent::__construct( $Id );
    }
    function getId(){
        return $this->Id;
    }	
	
    function setNameVi( $NameVi ) {
        $this->NameVi = $NameVi;
        $this->markDirty();
    }   
	function getNameVi( ) {
        return $this->NameVi;
    }
	
	function setNameEn( $NameEn ) {
        $this->NameEn = $NameEn;
        $this->markDirty();
    }   
	function getNameEn( ) {
        return $this->NameEn;
    }
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getDetails(){
		$mDhammapadaDetail = new \MVC\Mapper\DhammapadaDetail();	
		$Details = $mDhammapadaDetail->findBy(array($this->getId()));
		return $Details;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){
		return "/library/dhammapada/".$this->getId();
	}
					
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>