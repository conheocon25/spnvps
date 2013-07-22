<?php
	namespace MVC\Command;	
	class AppPanelCategoryVideoDetailInsLoad extends Command{
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Panel = $mPanelCategoryVideo->find($IdPanelCategoryVideo);
			$CategoryVideoAll = $mCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject('Panel', $Panel);
			$request->setObject('CategoryVideoAll', $CategoryVideoAll);
			
			$request->setProperty("Title", 'QUẢN LÝ / PANEL / CATEGORY / VIDEO / THÊM MỚI');
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>