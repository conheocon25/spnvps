<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class PanelCategoryVideo extends Object{

    private $Id;
	private $Name;
	private $Order;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Order=null){$this->Id = $Id;$this->Name = $Name;$this->Order = $Order;parent::__construct( $Id );}
    function getId() {return $this->Id;}
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}

	function setOrder( $Order ) {$this->Order = $Order;$this->markDirty();}
	function getOrder( ) {return $this->Order;}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------	
	function getDetailAll(){
		$mDetail = new \MVC\Mapper\PanelCategoryVideoDetail();
		$DetailAll = $mDetail->findBy(array( $this->getId() ));
		return $DetailAll;
	}
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLDetail(){return "/app/panel/category/video/".$this->getId();}
	
	function getURLDetailInsLoad(){return "/app/panel/category/video/".$this->getId()."/ins/load";}
	function getURLDetailInsExe(){return "/app/panel/category/video/".$this->getId()."/ins/exe";}
	
	function getURLUpdLoad(){return "/app/panel/category/video/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/panel/category/video/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/panel/category/video/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/panel/category/video/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>