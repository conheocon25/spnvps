<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class VideoSponsor extends Object{

    private $Id;
	private $IdVideo;
	private $IdSponsor;
		
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdVideo=null, $IdSponsor=null){$this->Id = $Id;$this->IdVideo = $IdVideo;$this->IdSponsor = $IdSponsor;parent::__construct( $Id );}
    function getId( ) {return $this->Id;}
		
	//Thông tin Video
	function setIdVideo( $IdVideo ){$this->IdVideo = $IdVideo;$this->markDirty();}
    function getIdVideo() {return $this->IdVideo;}
	function getVideo( ) {$mVideo = new \MVC\Mapper\Video();$Video = $mVideo->find($this->IdVideo);return $Video;}
	
	//Thông tin Sponsor
    function setIdSponsor( $IdSponsor ){$this->IdSponsor = $IdSponsor;$this->markDirty();}
    function getIdSponsor( ) {return $this->IdSponsor;}
	function getSponsor( ){$mSponsor = new \MVC\Mapper\Sponsor();$Sponsor = $mSponsor->find($this->IdSponsor);return $Sponsor;}
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLView(){return "/sponsor/".$this->getIdSponsor()."/video/".$this->getId();}	
	function getURLUpdLoad(){return "/app/sponsor/".$this->getIdSponsor()."/video/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/sponsor/".$this->getIdSponsor()."/video/".$this->getId()."/upd/exe";}	
	function getURLDelLoad(){return "/app/sponsor/".$this->getIdSponsor()."/video/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/sponsor/".$this->getIdSponsor()."/video/".$this->getId()."/del/exe";}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>