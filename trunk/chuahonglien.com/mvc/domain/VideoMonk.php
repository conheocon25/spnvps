<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class VideoMonk extends Object{

    private $Id;
	private $IdVideo;
	private $IdMonk;
		
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdVideo=null, $IdMonk=null){
        $this->Id = $Id;
		$this->IdVideo = $IdVideo;	
		$this->IdMonk = $IdMonk;		
		
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
			
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLView(){		
		return "/library/monk/video/".$this->getIdMonk()."/".$this->getId();
	}
	
	function getURLUpdLoad(){
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/app/monk/".$this->getIdMonk()."/video/".$this->getId()."/upd/exe";
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
