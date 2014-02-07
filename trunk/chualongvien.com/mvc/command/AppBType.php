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
			$AlbumAll 			= $mAlbum->findAll();			
			$MonkAll 			= $mMonk->findAll();
			$CourseAll 			= $mCourse->findAll();						
			$ConfigAll 			= $mConfig->findAll();
							
			$Title = "THƯ VIỆN";
			$Navigation = array(
				array("QUẢN LÝ", "/app")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject('AlbumAll', $AlbumAll);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('CourseAll', $CourseAll);
			$request->setObject('ConfigAll', $ConfigAll); 
						
			$request->setObject('Navigation', $Navigation);			
			$request->setProperty("ActiveAdmin", 'Video');
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>