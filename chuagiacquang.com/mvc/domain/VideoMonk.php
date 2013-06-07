<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class VideoMonk extends Object{

    private $Id;
	private $IdVideo;
	private $IdMonk;
	private $IdCategory;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdVideo=null, $IdMonk=null, $IdCategory=null){
        $this->Id = $Id;
		$this->IdVideo = $IdVideo;	
		$this->IdMonk = $IdMonk;
		$this->IdCategory = $IdCategory;
		
        parent::__construct( $Id );
    }
    function getId( ) {
        return $this->Id;
    }
	function getIdPrint( ) {
        return "VideoMonk".$this->Id;
    }
	
	//Thông tin Video
	function setIdVideo( $IdVideo ){
        $this->IdVideo = $IdVideo;
        $this->markDirty();
    }
    function getIdVideo( ) {
        return $this->IdVideo;
    }
	function getVideo( ) {
		$mVideo = new \MVC\Mapper\Video();
		$Video = $mVideo->find($this->IdVideo);
        return $Video;
    }
	
	//Thông tin Monk
    function setIdMonk( $IdMonk ){
        $this->IdMonk = $IdMonk;
        $this->markDirty();
    }
    function getIdMonk( ) {
        return $this->IdMonk;
    }
	function getMonk( ) {
		$mMonk = new \MVC\Mapper\Monk();
		$Monk = $mMonk->find($this->IdMonk);
        return $Monk;
    }
	
	//Thông tin CategoryVideo
    function setIdCategory( $IdCategory ){
        $this->IdCategory = $IdCategory;
        $this->markDirty();
    }
    function getIdCategory( ) {
        return $this->IdCategory;
    }
	function getCategory( ) {
		$mCategory = new \MVC\Mapper\CategoryVideo();
		$Category = $mCategory->find($this->IdCategory);
        return $Category;
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLView(){
		return "/library/video/".$this->getId();
	}
	
	function getURLUpdLoad(){
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/upd/exe";
	}
	
	function getURLUpdLoad1(){
		return "/app/category/video/".$this->getIdCategory()."/".$this->getId()."/upd/load";
	}
	function getURLUpdExe1(){		
		return "/app/category/video/".$this->getIdCategory()."/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/del/load";
	}
	function getURLDelExe(){
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/del/exe";
	}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}

?>
