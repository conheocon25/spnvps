<?php
	namespace MVC\Command;	
	class AppPanelCategoryVideoDetail extends Command{
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
			$PanelAll = $mPanelCategoryVideo->findAll();
			$Panel = $mPanelCategoryVideo->find($IdPanelCategoryVideo);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('PanelAll', $PanelAll);
			$request->setObject('Panel', $Panel);
			
			$request->setProperty("Title", 'QUẢN LÝ / PANEL / DANH MỤC VIDEO / ');
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>