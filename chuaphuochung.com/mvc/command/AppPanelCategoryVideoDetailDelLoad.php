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
			$Title = mb_strtoupper($Detail->getCategoryVideo()->getName(), 'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("VIDEO NỔI BẬT", "/app/panel/category/video"),
				array(mb_strtoupper($Detail->getCategory()->getName(), 'UTF8'), $Detail->getCategory()->getURLDetail())
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Detail', $Detail);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>