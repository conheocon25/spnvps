<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class PPost extends Object{

    private $Id;
	private $IdPagoda;
	private $Author;
	private $Date;
	private $Content;
	private $Title;
	private $Type;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdPagoda=null , $Author=Null, $Date=Null, $Content=null, $Title=null, $Type=null, $Key=null){
        $this->Id = $Id;
		$this->IdPagoda = $IdPagoda;
		$this->Author = $Author;
		$this->Date = $Date;
		$this->Content = $Content;
		$this->Title = $Title;
		$this->Type = $Type;
		$this->Key = $Key;
		
        parent::__construct( $Id );
    }
    function getId() {return $this->Id;}	
	function getIdPrint(){return "n" . $this->getId();}	
	
    function setIdPagoda( $IdPagoda ) {$this->IdPagoda = $IdPagoda;$this->markDirty();}   
	function getIdPagoda( ) {return $this->IdPagoda;}
	function getPagoda(){$mPagoda = new \MVC\Mapper\Pagoda(); $Pagoda = $mPagoda->find($this->getIdPagoda());return $Pagoda;}
	
	function setAuthor( $Author ){$this->Author = $Author;$this->markDirty();}   
	function getAuthor( ) {return $this->Author;}
	
	function setDate( $Date ){$this->Date = $Date;$this->markDirty();}   
	function getDate( ) {return $this->Date;}
	function getDatePrint( ){$D = new \MVC\Library\Date($this->Date);return $D->getDateFormat();}
	
	function setContent( $Content ){$this->Content = $Content;$this->markDirty();}   
	function getContent( ) {return $this->Content;}
	
	function setTitle( $Title ){$this->Title = $Title;$this->markDirty();}   
	function getTitle( ) {return $this->Title;}	
	function getTitleReduce(){$S = new \MVC\Library\String($this->Title);return $S->reduce(45);}
	
	function setType( $Type ){$this->Type = $Type;$this->markDirty();}   
	function getType( ) {return $this->Type;}
	function isVIP(){if ($this->Type == 1)return true;return false;}
	
	function getImage(){		
		$first_img = '';
		\ob_start();
		\ob_end_clean();
		if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $this->Content, $matches)){
			$first_img = $matches[1][0];
		}
		else {
			$first_img = "/data/images/PPost.jpg";
		}
		return $first_img;
	}
	
	function setKey( $Key ){$this->Key = $Key;$this->markDirty();}
	function getKey( ) {return $this->Key;}
	function reKey( ){
		$Id = $this->getId();
		if (!isset($Id)||$Id==0) $Id = time();
		$Str = new \MVC\Library\String($this->Title." ".$Id);
		$this->Key = $Str->converturl();		
	}
	
	
	function getContentReduce(){$S = new \MVC\Library\String($this->Content);return $S->reduceHTML(320);}
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdPagoda' 	=> $this->getIdPagoda(),
			'Author' 		=> $this->getAuthor(),
			'Date'			=> $this->getDate(),
			'Content'		=> $this->getContent(),	
			'Title'			=> $this->getTitle(),
			'Type'			=> $this->getType(),
			'Key'			=> $this->getKey()
		);				
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 			= $Data[0];
		$this->IdPagoda 	= $Data[1];
		$this->Author 		= $Data[2];
		$this->Date 		= $Data[3];		
		$this->Content 		= \stripslashes($Data[4]);
		$this->Title		= $Data[5];
		$this->Type			= $Data[6];
		$this->reKey();
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead()	{	return "/tin-tuc/".$this->getCategory()->getKey()."/".$this->getKey();}
		
	function getURLUpdLoad(){
		$Pagoda = $this->getPagoda();		
		return "/app/province/".$Pagoda->getDistrict()->getIdProvince()."/".$Pagoda->getIdDistrict()."/".$Pagoda->getId()."/post/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){
		$Pagoda = $this->getPagoda();		
		return "/app/province/".$Pagoda->getDistrict()->getIdProvince()."/".$Pagoda->getIdDistrict()."/".$Pagoda->getId()."/post/".$this->getId()."/upd/exe";
	}
				
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>