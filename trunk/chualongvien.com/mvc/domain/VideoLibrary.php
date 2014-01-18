<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class VideoLibrary extends Object{
    private $Id;
	private $IdVideo;
	private $IdCategory;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdVideo=null, $IdCategory=null){$this->Id = $Id;$this->IdVideo = $IdVideo;	$this->IdCategory = $IdCategory; parent::__construct( $Id );}
    function getId( ) {return $this->Id;}
	function getIdPrint( ) {return "VideoLibrary".$this->Id;}
	
	//Thông tin Video
	function setIdVideo( $IdVideo ){$this->IdVideo = $IdVideo;$this->markDirty();}
    function getIdVideo( ) {return $this->IdVideo;}
	function getVideo( ) {$mVideo = new \MVC\Mapper\Video();$Video = $mVideo->find($this->IdVideo);return $Video;}
	
	//Thông tin Category
    function setIdCategory( $IdCategory ){$this->IdCategory = $IdCategory;$this->markDirty();}
    function getIdCategory( ) {return $this->IdCategory;}
	function getCategory( ) {$mCategory = new \MVC\Mapper\CategoryVideo();$Category = $mCategory->find($this->IdCategory);return $Category;}
			
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLView(){return "/phat-am/".$this->getCategory()->getBTypeKey()."/".$this->getCategory()->getKey()."/".$this->getVideo()->getKey();}
	
	function getURLUpdLoad(){return "/app/category/video/".$this->getIdCategory()."/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/category/video/".$this->getIdCategory()."/".$this->getId()."/upd/exe";}
			
	function getURLDelLoad(){return "/app/category/video/".$this->getIdCategory()."/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/category/video/".$this->getIdCategory()."/".$this->getId()."/del/exe";}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>