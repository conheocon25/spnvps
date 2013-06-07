<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Task extends Object{

    private $Id;
	private $Date;
	private $Type;
	private $Title;
	private $Description;
	private $URL;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Date=Null, $Type=null, $Title=null, $Description=null, $URL=null){
        $this->Id = $Id;
		$this->Date = $Date;
		$this->Type = $Type;
		$this->Title = $Title;
		$this->Description = $Description;
		$this->URL = $URL;
		
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
	
	function setType( $Type ){
        $this->Type = $Type;
        $this->markDirty();
    }   
	function getType( ) {
        return $this->Type;
    }
	function getTypeStr( ) {
		$mCategoryTask = new \MVC\Mapper\CategoryTask();
		$Category = $mCategoryTask->find( $this->getType() );
        return $Category->getName();
    }
	
	function setTitle( $Title ){
        $this->Title = $Title;
        $this->markDirty();
    }   
	function getTitle( ) {
        return $this->Title;
    }
	
	function setDescription( $Description ){
        $this->Description = $Description;
        $this->markDirty();
    }   
	function getDescription( ) {
        return $this->Description;
    }
	
	function setURL( $URL ){
        $this->URL = $URL;
        $this->markDirty();
    }   
	function getURL( ) {
        return $this->URL;
    }	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){
		return "/task/".$this->getId();
	}
	function getURLUpdLoad(){
		return "/app/task/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){
		return "/app/task/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){
		return "/app/task/".$this->getId()."/del/load";
	}	
	function getURLDelExe(){
		return "/app/task/".$this->getId()."/del/exe";
	}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>