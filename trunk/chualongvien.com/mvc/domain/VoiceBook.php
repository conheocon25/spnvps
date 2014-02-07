<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class VoiceBook extends Object{

    private $Id;
	private $Name;	
	private $DateTime;	
	private $Order;
	private $Type;
	private $BType;
	private $MP3Raw;
	private $Note;
	private $Count;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $DateTime=null, $Order=Null, $Type=Null, $BType=Null, $MP3Raw=Null, $Note=Null, $Count=Null, $Key=Null){
        $this->Id 		= $Id;
		$this->Name 	= $Name;		
		$this->DateTime = $DateTime;
		$this->Order 	= $Order;
		$this->Type 	= $Type;
		$this->BType 	= $BType;
		$this->MP3Raw	= $MP3Raw;
		$this->Note		= $Note;
		$this->Count	= $Count;
		$this->Key 		= $Key;
        parent::__construct( $Id );
    }
    function getId(){return $this->Id;}	
	function getIdPrint(){return "c" . $this->getId();}	
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {if (!isset($this->Name)||$this->Name=="")return "Chưa có chủ đề"; return $this->Name;}
	function getNameReduce1(){$S = new \MVC\Library\String($this->Name);return $S->reduce(38);}
	function getNameReduce2(){$S = new \MVC\Library\String($this->Name);return $S->reduce(80);}
	
	function setDateTime( $DateTime ) {$this->DateTime = $DateTime;$this->markDirty();}   
	function getDateTime( ) {return $this->DateTime;}
	
	function setMP3Raw( $MP3Raw ) {$this->MP3Raw = $MP3Raw;$this->markDirty();}   
	function getMP3Raw( ) {return $this->MP3Raw;}
	
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
	
	function setNote( $Note ) {$this->Note = $Note;$this->markDirty();}   
	function getNote( ) {return $this->Note;}
	
	function setCount( $Count ) {$this->Count = $Count;$this->markDirty();}   
	function getCount( ) {return $this->Count;}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}   
	function getKey( ) {return $this->Key;}
	function reKey( ) {
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------		
	function getMP3All(){
		return null;
	}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name'			=> $this->getName(),			
			'DateTime'		=> $this->getDateTime(),
		 	'Order'			=> $this->getOrder(),
			'Type'			=> $this->getType(),
			'BType'			=> $this->getBType(),
			'MP3Raw'		=> $this->getMP3Raw(),
			'Note'			=> $this->getNote(),
			'Count'			=> $this->getCount(),
			'Key'			=> $this->getKey()
		);				
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];		
		$this->DateTime	= $Data[2];
		$this->Order 	= $Data[3];
		$this->Type 	= $Data[4];
		$this->BType 	= $Data[5];
		$this->MP3Raw	= $Data[6];
		$this->Note		= $Data[7];
		$this->Count	= $Data[8];
		$this->reKey();
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){return "/phat-am/".$this->getBTypeKey()."/danh-muc/".$this->getKey();}
	
	function getURLView(){return "/app/category/video/".$this->getId();}
	function getURLSetting(){return "/app/btype/".$this->getBType()."/".$this->getId();}
	function getURLSettingVoice(){return "/app/btype/".$this->getBType()."/".$this->getId()."/voice";}
					
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}
?>