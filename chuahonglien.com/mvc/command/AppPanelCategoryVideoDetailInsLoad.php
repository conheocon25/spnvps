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
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Panel = $mPanelCategoryVideo->find($IdPanelCategoryVideo);
			$CategoryVideoAll = $mCategoryVideo->findAll();
			
			$Title = "THÊM MỚI";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("VIDEO NỔI BẬT", "/app/panel/category/video"),
				array(mb_strtoupper($Panel->getName(), 'UTF8'), $Panel->getURLDetail())
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject('Panel', $Panel);
			$request->setObject('CategoryVideoAll', $CategoryVideoAll);
			
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>