<?php
	namespace MVC\Command;	
	class AppPanelCategoryVideoDetailDelLoad extends Command{
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mDetail = new \MVC\Mapper\PanelCategoryVideoDetail();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Detail = $mDetail->find($IdCategoryVideo);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Detail', $Detail);			
			$request->setProperty("Title", 'QUẢN LÝ / PANEL/ DANH MỤC VIDEO / ... / XÓA');
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>