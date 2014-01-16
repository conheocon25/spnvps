<?php
require_once("mvc/base/Library.php");
class Viewer {
	function __construct($Path=null){
		$this->Path = $Path;
    }
	
	//-------------------------------------------------
	//Hỗ trợ template xuất ra dưới dạng HTML    
	//-------------------------------------------------
	function html(){
		//Lấy các tham số toàn cục
		$Session = \MVC\Base\SessionRegistry::instance();		
						
		//Lấy các tham số đã được xử lí
		$request = \MVC\Base\RequestRegistry::getRequest();
		$objects = $request->getObjects();
		$properties = $request->getProperties();
		
		//Khởi tạo template và chuyển các thuộc tính và đối tượng sang
		$tpl = new PHPTAL($this->Path);
		while (list($key, $val) = each($objects)){			
			if (substr($key, 0, 1)!='_')
				$tpl->$key = $val;			
		}
		while (list($key, $val) = each($properties)){			
			if (substr($key, 0, 1)!='_')
				$tpl->$key = $val;
		}
		$Html = $tpl->execute();
		
		//Giải phóng bộ nhớ bị rò rỉ
		unset($tpl);
		unset($objects);
		unset($properties);
		
		//Kết xuất dữ liệu ra HTML
		return $Html;
	}
	
	//-------------------------------------------------
	//Hỗ trợ template xuất ra dưới dạng HTML    
	//-------------------------------------------------
	function pdf(){
				
		$html = $this->html();
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				
		$pdf->SetMargins(5, 15, 5);
		$pdf->SetHeaderMargin(1);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);	
		$pdf->AddPage();
		$pdf->SetFont('freeserif', 'N', 10);
					
		$pdf->writeHTML($html, true, false, true, false, '');
		
		$arr = split('[/\]', $this->Path);
		
		$pdf->Output(end($arr).".pdf", 'I');
	}
	function pdf1(){
				
		$html = $this->html();
		$pdf = new \MVC\Library\PDF1(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				
		$pdf->SetMargins(5, 15, 5);
		$pdf->SetHeaderMargin(1);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);	
		$pdf->AddPage();
		$pdf->SetFont('freeserif', 'N', 10);
					
		$pdf->writeHTML($html, true, false, true, false, '');
		
		$arr = split('[/\]', $this->Path);
		
		$pdf->Output(end($arr).".pdf", 'I');
	}
}
?>