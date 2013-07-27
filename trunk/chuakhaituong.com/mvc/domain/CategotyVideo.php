<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryVideo extends Object{

    private $Id;
	private $Name;
	private $Picture;
	private $Order;
	private $Type;
	private $BType;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Picture=null , $Order=Null, $Type=Null, $BType=Null, $Key=Null){
        $this->Id = $Id;
		$this->Name = $Name;
		$this->Picture = $Picture;
		$this->Order = $Order;
		$this->Type = $Type;
		$this->BType = $BType;
		$this->Key = $Key;
        parent::__construct( $Id );
    }
    function getId(){return $this->Id;}	
	function getIdPrint(){return "c" . $this->getId();}	
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	function getNameReduce(){$S = new \MVC\Library\String($this->Name);return $S->reduce(55);}
	function getNameReduce1(){$S = new \MVC\Library\String($this->Name);return $S->reduce(40);}
	
	function setPicture( $Picture ) {$this->Picture = $Picture;$this->markDirty();}   
	function getPicture( ) {return $this->Picture;}
	
	function setOrder( $Order ) {$this->Order = $Order;$this->markDirty();}   
	function getOrder( ) {return $this->Order;}
	
	function setType( $Type ) {$this->Type = $Type;$this->markDirty();}   
	function getType( ) {return $this->Type;}
	function isVIP( ){if ($this->Type == 1)return true;return false;}
	
	function setBType( $BType ) {$this->BType = $BType;$this->markDirty();}   
	function getBType( ) {return $this->BType;}
	function getBTypeName( ) {$mBType = new \MVC\Mapper\CategoryBType();$BType = $mBType->find($this->BType);if (!isset($BType))return "Chưa rõ";return $BType->getName();}
	function getBTypeKey( ) {$mBType = new \MVC\Mapper\CategoryBType();$BType = $mBType->find($this->BType);if (!isset($BType))return "Chưa rõ";return $BType->getKey();}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}   
	function getKey( ) {return $this->Key;}
	function reKey( ) {
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getVLs(){
		$mVL = new \MVC\Mapper\VideoLibrary();
		$VLs = $mVL->findBy( array($this->getId()) );
		return $VLs;
	}	
	
	function getVLTop(){
		$mVL = new \MVC\Mapper\VideoLibrary();
		$VLTop = $mVL->findByTop( array($this->getId()) );
		return $VLTop;
	}
	
	function getVMsLimit10(){
		$mVM = new \MVC\Mapper\VideoMonk();
		$VMs = $mVM->findByCategoryLimit10( array($this->getId()) );
		return $VMs;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){return "/phat-am/".$this->getBTypeKey()."/danh-muc/".$this->getKey();}
	
	function getURLView(){return "/app/news/".$this->getId();}	
	function getURLVideo(){return "/app/category/video/".$this->getId();}
	function getURLVideoInsLoad(){return "/app/category/video/".$this->getId()."/ins/load";}
	function getURLVideoInsExe(){return "/app/category/video/".$this->getId()."/ins/exe";}
	
	function getURLUpdLoad(){return "/app/category/video/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/category/video/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/category/video/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/category/video/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}
?>