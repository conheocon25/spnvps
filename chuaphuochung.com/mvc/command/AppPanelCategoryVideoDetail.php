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
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$PanelAll = $mPanelCategoryVideo->findAll();
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
			$request->setObject('PanelAll', $PanelAll);
			$request->setObject('Panel', $Panel);
			
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>