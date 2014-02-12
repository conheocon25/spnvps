<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class VoiceBook extends Object{
    private $Id;
	private $Name;
	private $Author;
	private $DateTime;	
	private $Order;
	private $Type;
	private $BType;
	private $MP3Raw;
	private $Note;
	private $Count;
	private $IdAnime;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Author=null, $DateTime=null, $Order=Null, $Type=Null, $BType=Null, $MP3Raw=Null, $Note=Null, $Count=Null, $IdAnime=Null, $Key=Null){
        $this->Id 		= $Id;
		$this->Name 	= $Name;		
		$this->Author 	= $Author;		
		$this->DateTime = $DateTime;
		$this->Order 	= $Order;
		$this->Type 	= $Type;
		$this->BType 	= $BType;
		$this->MP3Raw	= $MP3Raw;
		$this->Note		= $Note;
		$this->Count	= $Count;
		$this->IdAnime	= $IdAnime;
		$this->Key 		= $Key;
        parent::__construct( $Id );
    }
    function getId(){return $this->Id;}	
	function getIdPrint(){return "c" . $this->getId();}	
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {if (!isset($this->Name)||$this->Name=="")return "Chưa có chủ đề"; return $this->Name;}
	function getNameReduce1(){$S = new \MVC\Library\String($this->Name);return $S->reduce(38);}
	function getNameReduce2(){$S = new \MVC\Library\String($this->Name);return $S->reduce(80);}

	function setAuthor( $Author ) {$this->Author = $Author;$this->markDirty();}   
	function getAuthor( ) {if (!isset($this->Author)||$this->Author=="")return "Chưa có tác giả"; return $this->Author;}
	
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
	
	function setIdAnime( $IdAnime ) {$this->IdAnime = $IdAnime;$this->markDirty();}
	function getIdAnime( ) {return $this->IdAnime;}
	function getAnime(){
		$mAnime = new \MVC\Mapper\Anime();
		$Anime = $mAnime->find($this->getIdAnime());
		return $Anime;
	}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}   
	function getKey( ) {return $this->Key;}
	function reKey( ) {
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	
	function getImage(){return "/data/images/bg/mp3.jpg";}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------		
	function getMP3All(){
		$S 		= new \MVC\Library\String($this->MP3Raw);
		$Arr 	= $S->explode(' ');
		return $Arr;
	}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name'			=> $this->getName(),
			'Author'		=> $this->getAuthor(),			
			'DateTime'		=> $this->getDateTime(),
		 	'Order'			=> $this->getOrder(),
			'Type'			=> $this->getType(),
			'BType'			=> $this->getBType(),
			'MP3Raw'		=> $this->getMP3Raw(),
			'Note'			=> $this->getNote(),
			'Count'			=> $this->getCount(),
			'IdAnime'		=> $this->getIdAnime(),
			'Key'			=> $this->getKey()
		);				
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->Name 	= $Data[1];		
		$this->Author 	= $Data[2];
		$this->DateTime	= \date("Y-m-d H:i:s");
		$this->Order 	= $Data[4];
		$this->Type 	= $Data[5];
		$this->BType 	= $Data[6];
		$this->MP3Raw	= $Data[7];
		$this->Note		= $Data[8];
		$this->Count	= $Data[9];
		$this->IdAnime	= $Data[10];
		$this->reKey();
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){return "/phat-am/voice/".$this->getKey();}
	function getURLLoadMP3Raw(){return "/phat-am/voice/".$this->getKey()."/load";}
	
	function getURLView(){return "/app/category/video/".$this->getId();}
	function getURLSetting(){return "/app/btype/".$this->getBType()."/".$this->getId();}
	function getURLSettingVoice(){return "/app/btype/".$this->getBType()."/".$this->getId()."/voice";}
					
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}
?>