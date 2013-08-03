<?php
	namespace MVC\Command;	
	class AppPanelCategoryVideoDetailInsExe extends Command{
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
			$IdCategoryVideo = $request->getProperty('IdCategoryVideo');
			$Order = $request->getProperty('Order');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mDetail = new \MVC\Mapper\PanelCategoryVideoDetail();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Detail = new \MVC\Domain\PanelCategoryVideoDetail(
				null,
				$IdPanelCategoryVideo,
				$IdCategoryVideo,
				$Order
			);
			$mDetail->insert($Detail);

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>