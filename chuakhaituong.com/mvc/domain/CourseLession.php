<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CourseLession extends Object{

    private $Id;
	private $IdCourse;
	private $IdMonk;
	private $Name;
	private $DateStart;
	private $DateEnd;
	private $Description;
	private $Order;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdCourse=Null, $IdMonk=Null, $Name=Null, $DateStart=null, $DateEnd=null, $Description=null, $Order=null){$this->Id = $Id;$this->IdCourse = $IdCourse;$this->IdMonk = $IdMonk;$this->Name = $Name;$this->DateStart = $DateStart;$this->DateEnd = $DateEnd;$this->Description = $Description;$this->Order = $Order;parent::__construct( $Id );}
    function getId() {return $this->Id;}
	function getIdPrint(){return "e" . $this->getId();}	
	
	function setIdCourse( $IdCourse ){$this->IdCourse = $IdCourse;$this->markDirty();}   
	function getIdCourse( ) {return $this->IdCourse;}
	function getCourse( ) {$mCourse = new \MVC\Mapper\Course();$Course = $mCourse->find($this->IdCourse);return $this->Course;}
	
	function setIdMonk( $IdMonk ){$this->IdMonk = $IdMonk;$this->markDirty();}   
	function getIdMonk( ) {return $this->IdMonk;}
	function getMonk( ) {$mMonk = new \MVC\Mapper\Monk();$Monk = $mMonk->find($this->IdMonk);return $this->Monk;}
	
	function setName( $Name ){$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
		
	function setDateStart( $DateStart ){$this->DateStart = $DateStart;$this->markDirty();}   
	function getDateStart( ) {return $this->DateStart;}
	function getDateStartPrint( ){$D = new \MVC\Library\Date($this->DateStart);return $D->getDateFormat();}
	
	function setDateEnd( $DateEnd ){$this->DateEnd = $DateEnd;$this->markDirty();}   
	function getDateEnd( ) {return $this->DateEnd;}
	function getDateEndPrint( ){$D = new \MVC\Library\Date($this->DateEnd);return $D->getDateFormat();}
	
	function getImage(){
		$first_img = '';
		\ob_start();
		\ob_end_clean();
		if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $this->Description, $matches)){
			$first_img = $matches[1][0];
		}
		else {
			$first_img = "/data/images/app/course.png";
		}
		return $first_img;
	}
	
	function setDescription( $Description ){$this->Description = $Description;$this->markDirty();}   
	function getDescription( ) {return $this->Description;}
	
	function setOrder( $Order ){$this->Order = $Order;$this->markDirty();}
	function getOrder( ) {return $this->Order;}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){return "course/".$this->getIdCourse()."/".$this->getId();}
	
	function getURLUpdLoad(){return "/app/course/".$this->getIdCourse()."/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/course/".$this->getIdCourse()."/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/course/".$this->getIdCourse()."/".$this->getId()."/del/load";}	
	function getURLDelExe(){return "/app/course/".$this->getIdCourse()."/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>