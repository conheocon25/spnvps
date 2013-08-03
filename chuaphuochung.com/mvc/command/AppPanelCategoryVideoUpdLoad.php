<?php
	namespace MVC\Command;	
	class AppPanelCategoryVideoUpdLoad extends Command{
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
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Panel = $mPanelCategoryVideo->find($IdPanelCategoryVideo);
			$Title = mb_strtoupper($Panel->getName(), 'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("VIDEO NỔI BẬT", "/app/panel/category/video")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Panel', $Panel);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>