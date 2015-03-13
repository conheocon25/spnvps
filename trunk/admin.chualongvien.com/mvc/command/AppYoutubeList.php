<?php
	namespace MVC\Command;	
	class AppYoutubeList extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryVideoAll 	= $mCategoryVideo->findAll();			
			$Title 		= mb_strtoupper("SỰ KIỆN", 'UTF8');
			
			$Navigation = array();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryVideoAll"	, $CategoryVideoAll);
												
			$request->setObject('Navigation', $Navigation);			
			$request->setProperty("ActiveAdmin", 'Event');
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>