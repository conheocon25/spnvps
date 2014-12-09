<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class VideoDisable extends Object{
    private $Id;
	private $IdVideo;
		
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdVideo=null){$this->Id = $Id;$this->IdVideo = $IdVideo; parent::__construct( $Id );}
    function getId( ) {return $this->Id;}
		
	//Thông tin Video
	function setIdVideo( $IdVideo ){$this->IdVideo = $IdVideo;$this->markDirty();}
    function getIdVideo( ) {return $this->IdVideo;}
	function getVideo( ) {
		$mVideo = new \MVC\Mapper\Video();
		$Video = $mVideo->find($this->IdVideo);
		return $Video;
	}

	function toJSON(){		    
		$json = array(
			'Id' 			=> $this->getId(),
			'IdVideo' 		=> $this->getIdVideo()			
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 			= $Data[0];
		$this->IdVideo 		= $Data[1];		
    }
	
	function toXML(){
		$S = "
		<object>
			<id>".$this->getId()."</id>
			<idvideo>".$this->getIdVideo()."</idvideo>			
		</object>
		";
		return $S;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
						
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>