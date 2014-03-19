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
        $this->Id 		= $Id;
		$this->Name 	= $Name;
		$this->Picture 	= $Picture;
		$this->Order 	= $Order;
		$this->Type 	= $Type;
		$this->BType 	= $BType;
		$this->Key 		= $Key;
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
	function getVoiceBookAll(){
		$mVB 	= new \MVC\Mapper\VoiceBook();
		$VBAll 	= $mVB->findBy( array($this->getId()) );
		return $VBAll;
	}	
	
	function getVLAll(){
		$mVL = new \MVC\Mapper\VideoLibrary();
		$VLAll = $mVL->findBy( array($this->getId()) );
		return $VLAll;
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
	function getURLRead(){
		if ($this->BType == 4)
			return "/thu-vien-phat-phap/".$this->getKey();
		else if ($this->BType == 5)
			return "/lich-su-phat-giao/".$this->getKey();
		else if ($this->BType == 3){
			return "/phim-truyen-phat-giao/".$this->getKey();
		}else if ($this->BType == 1){
			return "/giang-su-thuyet-phap/".$this->getKey();
		}else if ($this->BType == 2){
			return "/nhac-phat-giao/".$this->getKey();
		}
		return "/kenh-tong-hop/".$this->getKey();
	}
	
	function getURLView(){return 			"/app/category/video/".$this->getId();}
	function getURLSetting(){return 		"/app/btype/".$this->getBType()."/".$this->getId();}
	function getURLSettingVoice(){return 	"/app/btype/".$this->getBType()."/".$this->getId()."/voice";}
					
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}
?>