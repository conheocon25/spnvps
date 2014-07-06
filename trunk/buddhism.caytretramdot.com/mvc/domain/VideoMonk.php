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
    function __construct( $Id=null, $IdVideo=null, $IdMonk=null){$this->Id = $Id;$this->IdVideo = $IdVideo;$this->IdMonk = $IdMonk;parent::__construct( $Id );}
    function getId( ) {return $this->Id;}
	function getIdPrint( ) {return "VideoMonk".$this->Id;}
	
	//Thông tin Video
	function setIdVideo( $IdVideo ){$this->IdVideo = $IdVideo;$this->markDirty();}
    function getIdVideo( ) {return $this->IdVideo;}
	function getVideo( ) {$mVideo = new \MVC\Mapper\Video();$Video = $mVideo->find($this->IdVideo);return $Video;}
	
	//Thông tin Monk
    function setIdMonk( $IdMonk ){$this->IdMonk = $IdMonk;$this->markDirty();}
    function getIdMonk( ) {return $this->IdMonk;}
	function getMonk( ) {$mMonk = new \MVC\Mapper\Monk();$Monk = $mMonk->find($this->IdMonk);return $Monk;}
			
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLView(){return "/phat-am/".$this->getMonk()->getBTypeKey()."/giang-su/".$this->getMonk()->getKey()."/".$this->getVideo()->getKey();}
	function toJSON(){		    
		$json = array(
			'Id' 			=> $this->getId(),
			'IdVideo' 		=> $this->getIdVideo(),
			'IdMonk' 		=> $this->getIdMonk(),
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
		$this->IdMonk 		= $Data[2];
    }
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>