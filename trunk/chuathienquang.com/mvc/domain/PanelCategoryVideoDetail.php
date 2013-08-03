<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class PanelCategoryVideoDetail extends Object{

    private $Id;
	private $IdCategory;
	private $IdCategoryVideo;
	private $Order;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdCategory=null, $IdCategoryVideo=null, $Order=null){$this->Id = $Id;$this->IdCategory = $IdCategory;$this->IdCategoryVideo = $IdCategoryVideo;$this->Order = $Order;parent::__construct( $Id );}
    function getId() {return $this->Id;}
	
    function setIdCategory( $IdCategory ) {$this->IdCategory = $IdCategory;$this->markDirty();}   
	function getIdCategory( ) {return $this->IdCategory;}

	function setIdCategoryVideo( $IdCategoryVideo ) {$this->IdCategoryVideo = $IdCategoryVideo;$this->markDirty();}
	function getIdCategoryVideo( ) {return $this->IdCategoryVideo;}
	
	function setOrder( $Order ) {$this->Order = $Order;$this->markDirty();}
	function getOrder( ) {return $this->Order;}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getCategory(){
		$mCategory = new \MVC\Mapper\PanelCategoryVideo();
		$Category = $mCategory->find($this->getIdCategory());
		return $Category;
	}
	
	function getCategoryVideo(){
		$mCategory = new \MVC\Mapper\CategoryVideo();
		$Category = $mCategory->find($this->getIdCategoryVideo());
		return $Category;
	}
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLDelLoad(){return "/app/panel/category/video/".$this->getIdCategory()."/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/panel/category/video/".$this->getIdCategory()."/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>