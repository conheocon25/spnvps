<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class DhammapadaDetail extends Object{

    private $Id;
	private $Type;
	private $ContentVi;
	private $ContentEn;
			
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Type=null, $ContentVi=null, $ContentEn=null ){
        $this->Id = $Id;
		$this->Type = $Type;
		$this->ContentVi = $ContentVi;
		$this->ContentEn = $ContentEn;
		
        parent::__construct( $Id );
    }
    function getId(){
        return $this->Id;
    }	
	
    function setType( $Type ) {
        $this->Type= $Type;
        $this->markDirty();
    }   
	function getType( ) {
        return $this->Type;
    }
	function getTypeName(){
		$mDhammapada = new \MVC\Mapper\Dhammapada();
		$Dhammapada = $mDhammapada->find($this->getType());
		return $Dhammapada->getNameVi();
	}
	
	function setContentVi( $ContentVi ) {
        $this->ContentVi= $ContentVi;
        $this->markDirty();
    }   
	function getContentVi( ) {
        return $this->ContentVi;
    }
	
	function setContentEn( $ContentEn ) {
        $this->ContentEn = $ContentEn;
        $this->markDirty();
    }   
	function getContentEn( ) {
        return $this->ContentEn;
    }
	
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