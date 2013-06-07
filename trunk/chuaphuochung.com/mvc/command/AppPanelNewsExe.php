<?php
	namespace MVC\Command;	
	class AppPanelNewsAllInsExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------		
			$IdNews = $request->getProperty('IdNews');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mPanelNews = new \MVC\Mapper\PanelNewsAll();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$PanelNewsAll = new \MVC\Domain\PanelNewsAll(
				null,
				$IdNews
			);
			$mPanelNews->insert($PanelNewsAll);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>