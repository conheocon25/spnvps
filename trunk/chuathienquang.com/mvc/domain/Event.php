<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Event extends Object{

    private $Id;
	private $Date;
	private $Content;
	private $Title;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Date=Null, $Content=null, $Title=null){
        $this->Id = $Id;		
		$this->Date = $Date;
		$this->Content = $Content;
		$this->Title = $Title;
		
        parent::__construct( $Id );
    }
    function getId() {
        return $this->Id;
    }	
	function getIdPrint(){
        return "e" . $this->getId();
    }	
		
	function setDate( $Date ){
        $this->Date = $Date;
        $this->markDirty();
    }   
	function getDate( ) {
        return $this->Date;
    }
	function getDatePrint( ){
		$D = new \MVC\Library\Date($this->Date);
        return $D->getDateTimeFormat();
    }
	
	function setContent( $Content ){
        $this->Content = $Content;
        $this->markDirty();
    }   
	function getContent( ) {
        return $this->Content;
    }
	
	function setTitle( $Title ){
        $this->Title = $Title;
        $this->markDirty();
    }   
	function getTitle( ) {
        return $this->Title;
    }
	function getImage(){		
		$first_img = '';
		\ob_start();
		\ob_end_clean();
		if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $this->Content, $matches)){
			$first_img = $matches[1][0];
		}
		else {
			$first_img = "/data/images/app/Event.png";
		}
		return $first_img;
	}
	
	function getContentReduce(){
		$S = new \MVC\Library\String($this->Content);
		return $S->reduce(120);
	}	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){
		return "/event/".$this->getId();
	}
	function getURLUpdLoad(){
		return "/app/event/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){
		return "/app/event/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){
		return "/app/event/".$this->getId()."/del/load";
	}	
	function getURLDelExe(){
		return "/app/event/".$this->getId()."/del/exe";
	}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>