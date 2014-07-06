<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Monk extends Object{

    private $Id;
	private $PreName;
	private $Name;
	private $Pagoda;
	private $Phone;
	private $Note;
	private $Type;
	private $BType;
	private $URLPic;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $PreName=null, $Name=null , $Pagoda=Null, $Phone=Null, $Note=Null, $Type=Null, $BType=Null, $URLPic=Null, $Key=Null){$this->Id = $Id;$this->PreName = $PreName;$this->Name = $Name;$this->Pagoda = $Pagoda;$this->Phone = $Phone;$this->Note = $Note;$this->Type = $Type;$this->BType = $BType; $this->URLPic = $URLPic; $this->Key = $Key; parent::__construct( $Id );}
    function getId() {return $this->Id;}
	function getIdPrint(){return "l" . $this->getId();}	
	
	function setPreName( $PreName ) {$this->PreName = $PreName;$this->markDirty();}   
	function getPreName( ) {return $this->PreName;}
	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setPagoda( $Pagoda ) {$this->Pagoda = $Pagoda;$this->markDirty();}   
	function getPagoda( ) {return $this->Pagoda;}
	
	function setPhone( $Phone ) {$this->Phone = $Phone;$this->markDirty();}   
	function getPhone( ) {return $this->Phone;}
	
	function setNote( $Note ) {$this->Note = $Note;$this->markDirty();}   
	function getNote( ){return $this->Note;}
	
	function setType( $Type ) {$this->Type = $Type;$this->markDirty();}   
	function getType( ){return $this->Type;}
	function isVIP( ){if ($this->Type == 1)return true;return false;}
	
	function setBType( $BType ) {$this->BType = $BType;$this->markDirty();} 
	function getBType( ){return $this->BType;}
	function getBTypeName( ){
		$mBType = new \MVC\Mapper\CategoryBType();
		$BType = $mBType->find($this->BType);
		if (!isset($BType))
			return "Chưa rõ";
        return $BType->getName();
    }
	function getBTypeKey( ){
		$mBType = new \MVC\Mapper\CategoryBType();
		$BType = $mBType->find($this->BType);
		if (!isset($BType))
			return "Chưa rõ";
        return $BType->getKey();
    }
	
	function setURLPic( $URLPic ) {$this->URLPic = $URLPic;$this->markDirty();} 
	function getURLPic( ){return $this->URLPic;}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();} 
	function getKey( ){return $this->Key;}
	function reKey( ){
		$Str = new \MVC\Library\String($this->Name." ".$this->getId());
		$this->Key = $Str->converturl();
	}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getVMs(){
		$mVM = new \MVC\Mapper\VideoMonk();
		$VMs = $mVM->findBy( array($this->getId()) );
		return $VMs;
	}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'PreName'		=> $this->getPreName(),
			'Name'			=> $this->getName(),
			'Pagoda'		=> $this->getPagoda(),
		 	'Phone'			=> $this->getPhone(),
			'Note'			=> $this->getNote(),
			'Type'			=> $this->getType(),
			'BType'			=> $this->getBType(),
			'URLPic'		=> $this->getURLPic(),
			'Key'			=> $this->getKey()
		);				
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 		= $Data[0];
		$this->PreName 	= $Data[1];
		$this->Name 	= $Data[2];
		$this->Pagoda 	= $Data[3];
		$this->Phone 	= $Data[4];		
		$this->Note 	= $Data[5];		
		$this->Type 	= $Data[6];
		$this->BType 	= $Data[7];
		$this->URLPic 	= $Data[8];
		$this->reKey();
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
	function getURLRead(){return "/giang-su/".$this->getKey();}
	function getURLSetting(){return "/app/monk";}
	function getURLVideo(){return "/app/monk/".$this->getId()."/video";}		
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>