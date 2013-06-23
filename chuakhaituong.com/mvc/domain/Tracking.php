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
	//KHOẢN THU
	//-------------------------------------------------------------------------------
	function getCollectAll($IdTerm){$mCollect = new \MVC\Mapper\CollectGeneral();$CollectAll = $mCollect->findByTracking1(array($IdTerm, $this->getDateStart(), $this->getDateEnd()));return $CollectAll;}
	function getCollectAllValue($IdTerm){$CollectAll = $this->getCollectAll($IdTerm);$Value = 0;while ($CollectAll->valid()){$Collect = $CollectAll->current();$Value += $Collect->getValue();$CollectAll->next();}return $Value;}
	function getCollectAllValuePrint($IdTerm){$N = new \MVC\Library\Number($this->getCollectAllValue($IdTerm));return $N->formatCurrency()." đ";}
	
	function getCollectAllSumValue(){
				
		$mCollect = new \MVC\Mapper\CollectGeneral();
		$CollectAll = $mCollect->findByTracking(array($this->getDateStart(), $this->getDateEnd()));
		
		$Value = 0;
		while ($CollectAll->valid()){
			$Collect = $CollectAll->current();
			$Value += $Collect->getValue();
			$CollectAll->next();
		}
		
		//thu bán hàng
		$Value += $this->getSessionAllValue();
		
		return $Value;
	}	
	function getCollectAllSumValuePrint(){ $N = new \MVC\Library\Number( $this->getCollectAllSumValue() ); return $N->formatCurrency()." đ";}
	
	//-------------------------------------------------------------------------------
	//KHOẢN CHI
	//-------------------------------------------------------------------------------
	function getPaidAll(){
		$mPaid = new \MVC\Mapper\Paid();
		$PaidAll = $mPaid->findByTracking(array($this->getDateStart(), $this->getDateEnd()));
		return $PaidAll;
	}
	function getPaidAllValue(){$PaidAll = $this->getPaidAll();$Value = 0;while ($PaidAll->valid()){$Paid = $PaidAll->current();$Value += $Paid->getValue();$PaidAll->next();}return $Value;}
	function getPaidAllValuePrint(){$N = new \MVC\Library\Number($this->getPaidAllValue());return $N->formatCurrency()." đ";}
	function getPaidAllValueStrPrint(){$N = new \MVC\Library\Number($this->getPaidAllValue());return $N->readDigit()."đồng";}
	
	//--------------------------------------------------------------------------------	
	//NHẬP HÀNG
	//--------------------------------------------------------------------------------			
	
	//---------------------------------------------------------------------------------------------
	//TÍNH SỐ DƯ CUỐI CÙNG	
	//---------------------------------------------------------------------------------------------
	function getValue(){
		$Value = 
			$this->getCollectAllSumValue()
			+ $this->getTrackingStoreValue() 
			- $this->getOrderAllSumValue() 
			- $this->getPaidAllSumValue()
			- $this->getEstateRate();
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