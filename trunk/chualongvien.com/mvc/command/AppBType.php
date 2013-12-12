<?php
	namespace MVC\Command;	
	class AppBType extends Command{
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
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryBTypeAll 	= $mCategoryBType->findAll();
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			$CategoryVideoAll 	= $mCategoryVideo->findAll();						
			$CategoryTaskAll 	= $mCategoryTask->findAll();			
			$AlbumAll 			= $mAlbum->findAll();
			$EventAll 			= $mEvent->findAll();
			$MonkAll 			= $mMonk->findAll();
			$CourseAll 			= $mCourse->findAll();			
			$PanelNewsAll 		= $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$ConfigAll 			= $mConfig->findAll();
			$TaskAll 			= $mTask->findAll();
				
			$Title = "VIDEO";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);			
			$request->setObject("CategoryTaskAll", $CategoryTaskAll);						
			$request->setObject('AlbumAll', $AlbumAll);
			$request->setObject('EventAll', $EventAll);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('CourseAll', $CourseAll);
			$request->setObject('ConfigAll', $ConfigAll); 			
			$request->setObject('PanelNewsAll', $PanelNewsAll);
			$request->setObject('PanelCategoryVideoAll', $PanelCategoryVideoAll);
			$request->setObject('TaskAll', $TaskAll);
						
			$request->setObject('Navigation', $Navigation);			
			$request->setProperty("ActiveAdmin", 'Video');
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>