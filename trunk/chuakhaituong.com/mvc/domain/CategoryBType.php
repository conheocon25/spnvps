<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryBType extends Object{

    private $Id;
	private $Name;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Key=null) {$this->Id = $Id;$this->Name = $Name; $this->Key = $Key;parent::__construct( $Id );}
    function getId() {return $this->Id;}	
	function getIdPrint(){return "c" . $this->getId();}	
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}  
	function getKey( ) {return $this->Key;}
			
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getMonkAll(){
		$mMonk = new \MVC\Mapper\Monk();
		$MonkAll = $mMonk->findByBType(array( $this->getId() ));
		return $MonkAll;
	}
	
	function getCategoryAll(){
		$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
		$CategoryAll = $mCategoryVideo->findByBType(array( $this->getId() ));
		return $CategoryAll;
	}
	
	function getVideoAllCount(){
		$Value1 = 0;
		$MonkAll = $this->getMonkAll();
		while ($MonkAll->valid()){
			$Monk = $MonkAll->current();
			$Value1 += $Monk->getVMs()->count();
			$MonkAll->next();
		}
		
		$Value2 = 0;
		$CategoryAll = $this->getCategoryAll();
		while ($CategoryAll->valid()){
			$Category = $CategoryAll->current();
			$Value2 += $Category->getVLs()->count();
			$CategoryAll->next();
		}
		return ($Value1 + $Value2);
	}
	function getVideoAllCountPrint(){$N = new \MVC\Library\Number( $this->getVideoAllCount() );return $N->formatCurrency();}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
	function getURLView(){return "/phat-am/".$this->getKey();}
	
	function getURLUpdLoad(){return "/app/category/btype/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/category/btype/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/category/btype/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/category/btype/".$this->getId()."/del/exe";}
		
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>