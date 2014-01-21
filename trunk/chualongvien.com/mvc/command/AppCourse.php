<?php
	namespace MVC\Command;	
	class AppCourse extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();			
			$AlbumAll = $mAlbum->findAll();			
			$MonkAll = $mMonk->findAll();
			$CourseAll = $mCourse->findAll();			
			$ConfigAll = $mConfig->findAll();
						
			$Title = "Đào Tạo";
			$Navigation = array(
				array("Quản Lý", "/app")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$CourseAll1 = $mCourse->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($CourseAll->count(), $Config->getValue(), "/app/course" );
			
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
						
			$request->setObject('CourseAll1', $CourseAll1); 
			$request->setObject('PN', $PN); 
			$request->setObject('Navigation', $Navigation); 
			$request->setProperty("Title", $Title);			
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", 'Course');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>