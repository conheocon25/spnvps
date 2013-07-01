<?php
	namespace MVC\Command;	
	class AppPanelCategoryVideoUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdPanelCategoryVideo = $request->getProperty('IdPanelCategoryVideo');
			$Name = $request->getProperty('Name');
			$Order = $request->getProperty('Order');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mPanel = new \MVC\Mapper\PanelCategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Panel = $mPanel->find($IdPanelCategoryVideo);
			$Panel->setName($Name);
			$Panel->setOrder($Order);
			$mPanel->update($Panel);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
						
			return self::statuses('CMD_OK');
		}
	}
?>