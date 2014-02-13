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
	
	function toJSON(){		    
		$json = array(
			'Id' 			=> $this->getId(),
			'IdVideo' 		=> $this->getIdVideo(),
			'IdCategory' 	=> $this->getIdCategory(),			
			'Name' 			=> $this->getVideo()->getName(),
			'Time' 			=> $this->getVideo()->getTime(),
			'URL' 			=> $this->getVideo()->getURL(),
			'Note' 			=> $this->getVideo()->getNote(),
			'Count' 		=> $this->getVideo()->getCount(),
			'Key'			=> $this->getVideo()->getKey()
		);				
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 			= $Data[0];
		$this->IdVideo 		= $Data[1];
		$this->IdCategory 	= $Data[2];
    }	
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLRead(){
		$Category = $this->getCategory();		
		return $Category->getURLRead()."/YouTube/".$this->getVideo()->getKey();
	}
					
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>