<?php
	namespace MVC\Command;	
	class App extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
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
									
			$Title = "Quản Lý";
			$Navigation = array();
			
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
			$request->setProperty("Title", $Title);			
			$request->setProperty("ActiveAdmin", 'Admin');
		}
	}
?>