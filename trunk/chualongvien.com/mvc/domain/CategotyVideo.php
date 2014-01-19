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
	function getName( ) {if (!isset($this->Name)||$this->Name=="")return "Chưa có chủ đề"; return $this->Name;}
	function getNameReduce1(){$S = new \MVC\Library\String($this->Name);return $S->reduce(38);}
	function getNameReduce2(){$S = new \MVC\Library\String($this->Name);return $S->reduce(80);}
	
	function setPicture( $Picture ) {$this->Picture = $Picture;$this->markDirty();}   
	function getPicture( ) {return $this->Picture;}
	
	function setOrder( $Order ) {$this->Order = $Order;$this->markDirty();}   
	function getOrder( ) {return $this->Order;}
	
	function setType( $Type ) {$this->Type = $Type;$this->markDirty();}   
	function getType( ) {return $this->Type;}
	function isVIP( ){if ($this->Type == 1)return true;return false;}
	
	function setBType( $BType ) {$this->BType = $BType;$this->markDirty();}   
	function getBType( ) {return $this->BType;}
	function getBTypeO( ) {
		$mBType = new \MVC\Mapper\CategoryBType();
		$Type 	= $mBType->find($this->BType);
		return $Type;
	}
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
	function getURLRead(){return "/phat-am/".$this->getBTypeKey()."/danh-muc/".$this->getKey();}
	
	function getURLView(){return "/app/category/video/".$this->getId();}
	function getURLSetting(){return "/app/btype/".$this->getBType()."/".$this->getId();}
			
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