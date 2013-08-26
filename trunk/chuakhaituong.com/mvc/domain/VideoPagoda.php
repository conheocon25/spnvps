<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class VideoPagoda extends Object{

    private $Id;
	private $IdVideo;
	private $IdPagoda;
		
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdVideo=null, $IdPagoda=null){
        $this->Id = $Id;
		$this->IdVideo = $IdVideo;	
		$this->IdPagoda = $IdPagoda;
				
        parent::__construct( $Id );
    }
    function getId( ) {
        return $this->Id;
    }
	function getIdPrint( ) {
        return "VideoPagoda".$this->Id;
    }
	
	//Thông tin Video
	function setIdVideo( $IdVideo ){
        $this->IdVideo = $IdVideo;
        $this->markDirty();
    }
    function getIdVideo() {
        return $this->IdVideo;
    }
	function getVideo( ) {
		$mVideo = new \MVC\Mapper\Video();
		$Video = $mVideo->find($this->IdVideo);
        return $Video;
    }
	
	//Thông tin Pagoda
    function setIdPagoda( $IdPagoda ){
        $this->IdPagoda = $IdPagoda;
        $this->markDirty();
    }
    function getIdPagoda( ) {
        return $this->IdPagoda;
    }
	function getPagoda( ){
		$mPagoda = new \MVC\Mapper\Pagoda();
		$Pagoda = $mPagoda->find($this->IdPagoda);
        return $Pagoda;
    }
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLView(){return "/chua-ban/".$this->getPagoda()->getKey()."/video/".$this->getVideo()->getKey();}
		
	function getURLUpdLoad(){return "/app/pagoda/".$this->getIdPagoda()."/video/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/pagoda/".$this->getIdPagoda()."/video/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/pagoda/".$this->getIdPagoda()."/video/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/app/pagoda/".$this->getIdPagoda()."/video/".$this->getId()."/del/exe";}
	
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
}

?>
