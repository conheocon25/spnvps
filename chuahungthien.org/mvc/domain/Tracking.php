<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Tracking extends Object{
    private $Id;
	private $DateStart;
	private $DateEnd;
	private $EstateRate;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $DateStart=null, $DateEnd=null, $EstateRate=null) {$this->Id = $Id; $this->DateStart = $DateStart; $this->DateEnd = $DateEnd; parent::__construct( $Id );}
    
	function getId() {return $this->Id;}	
	function getIdPrint(){return "u" . $this->getId();}	
	function getName(){$Name = ' THÁNG '.\date("m/Y", strtotime($this->getDateStart()));return $Name;}
	
    function setDateStart( $DateStart ) {$this->DateStart = $DateStart;$this->markDirty();}   
	function getDateStart( ) {return $this->DateStart;}	
	function getDateStartPrint( ) {$D = new \MVC\Library\Date($this->DateStart);return $D->getDateFormat();}
	
	function setDateEnd( $DateEnd ) {$this->DateEnd= $DateEnd;$this->markDirty();}   
	function getDateEnd( ) {return $this->DateEnd;}	
	function getDateEndPrint( ) {$D = new \MVC\Library\Date($this->DateEnd);return $D->getDateFormat();}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------
	//TỔN ĐẦU KÌ
	//-------------------------------------------------------------------------------
	function getOldValue(){
		$DateStart = "2013-1-1";		
		$DateEnd = \date("Y-m-d", strtotime("-1 day", strtotime($this->getDateEnd())));
		$mPS = new \MVC\Mapper\SponsorPerson();		
		$Value1 = 0;		
		$PSAll = $mPS->trackBy1(array($DateStart, $DateEnd));
		$PSAll->rewind();
		while ($PSAll->valid()){
			$Value1 += $PSAll->current()->getValue();
			$PSAll->next();
		}
		
		$Value2 = 0;
		$mPaid = new \MVC\Mapper\Paid();
		$PaidAll = $mPaid->findByTracking(array($DateStart, $DateEnd));
		while ($PaidAll->valid()){
			$Value2 += $PaidAll->current()->getValue();
			$PaidAll->next();
		}
				
		return ( -$Value2 + $Value1);
	}
	function getOldValuePrint(){
		$N = new \MVC\Library\Number( $this->getOldValue() );
		return $N->formatCurrency()." đ";
	}
	//-------------------------------------------------------------------------------
	//KHOẢN THU
	//-------------------------------------------------------------------------------
	function getSponsorPersionAll($IdSponsor){
		$mPS = new \MVC\Mapper\SponsorPerson();
		$PSAll = $mPS->trackBy(array($IdSponsor, $this->getDateStart(), $this->getDateEnd()));
		return $PSAll;
	}
	
	function getSponsorPersionAllValue($IdSponsor){		
		$PSAll = $this->getSponsorPersionAll($IdSponsor);
		$Value = 0;
		$PSAll->rewind();
		while ($PSAll->valid()){
			$Value += $PSAll->current()->getValue();
			$PSAll->next();
		}
		return $Value;
	}
	function getSponsorPersionAllValuePrint($IdSponsor){
		$N = new \MVC\Library\Number($this->getSponsorPersionAllValue($IdSponsor));
		return $N->formatCurrency()." đ";
	}
	
	function getCollectAllValue(){
		$mSponsor = new \MVC\Mapper\Sponsor();
		$SponsorAll = $mSponsor->findAll();
		$Value = 0;
		$SponsorAll->rewind();
		while ($SponsorAll->valid()){
			$Sponsor = $SponsorAll->current();
			$Temp = $this->getSponsorPersionAllValue($Sponsor->getId());
			$Value += $Temp;
			$SponsorAll->next();
		}
		return $Value;
	}
	function getCollectAllValuePrint(){
		$N = new \MVC\Library\Number($this->getCollectAllValue());
		return $N->formatCurrency()." đ";
	}
	
	//-------------------------------------------------------------------------------
	//KHOẢN CHI
	//-------------------------------------------------------------------------------
	function getSponsorPaidAll($IdSponsor){
		$mSP = new \MVC\Mapper\SponsorPaid();
		$SPAll = $mSP->trackBy(array($IdSponsor, $this->getDateStart(), $this->getDateEnd()));
		return $SPAll;
	}
	
	function getSponsorPaidAllValue($IdSponsor){
		$SPAll = $this->getSponsorPaidAll($IdSponsor);
		$Value = 0;
		$SPAll->rewind();
		while ($SPAll->valid()){
			$Value += $SPAll->current()->getValue();
			$SPAll->next();
		}
		return $Value;
	}
	function getSponsorPaidAllValuePrint($IdSponsor){
		$N = new \MVC\Library\Number($this->getSponsorPaidAllValue($IdSponsor));
		return $N->formatCurrency()." đ";
	}
	
	function getPaidAllValue(){
		$mSponsor = new \MVC\Mapper\Sponsor();
		$SponsorAll = $mSponsor->findAll();
		$Value = 0;
		$SponsorAll->rewind();
		while ($SponsorAll->valid()){
			$Sponsor = $SponsorAll->current();
			$Temp = $this->getSponsorPaidAllValue($Sponsor->getId());
			$Value += $Temp;
			$SponsorAll->next();
		}
		return $Value;
	}
	function getPaidAllValuePrint(){
		$N = new \MVC\Library\Number($this->getPaidAllValue());
		return $N->formatCurrency()." đ";
	}
	
	//--------------------------------------------------------------------------------	
	//NHẬP HÀNG
	//--------------------------------------------------------------------------------			
	
	//---------------------------------------------------------------------------------------------
	//TÍNH SỐ DƯ CUỐI CÙNG	
	//---------------------------------------------------------------------------------------------
	function getValue(){
		$Value = 
			$this->getOldValue()
			+ $this->getCollectAllValue()						
			- $this->getPaidAllValue();
		return $Value;
	}
	
	function getValuePrint(){ $N = new \MVC\Library\Number($this->getValue()); return $N->formatCurrency()." đ";}
	function getValueStrPrint(){ $N = new \MVC\Library\Number($this->getValue()); return $N->readDigit()." đồng";}
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){return "report/".$this->getId();}
			
	function getURLUpdLoad(){return "report/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "report/".$this->getId()."/upd/exe";}	
	function getURLDelLoad(){return "report/".$this->getId()."/del/load";}
	function getURLDelExe(){return "report/".$this->getId()."/del/exe";}
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>