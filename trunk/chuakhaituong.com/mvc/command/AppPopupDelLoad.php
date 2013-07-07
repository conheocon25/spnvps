<?php
	namespace MVC\Command;	
	class AppPopupDelLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdPopup = $request->getProperty('IdPopup');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------									
			$mPopup = new \MVC\Mapper\Popup();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																
			$Popup = $mPopup->find($IdPopup);						
			$Title = "Quản lý / quảng cáo popup / ".$Popup->getCommand()." / xóa";	
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Popup', $Popup);						
			$request->setProperty('Title', $Title);
		}
	}
?>
