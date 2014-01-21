<?php
	namespace MVC\Command;	
	class AppCourseLession extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCourse = $request->getProperty('IdCourse');
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
			
			$Course = $mCourse->find($IdCourse);
			$Title = $Course->getName();
			$Navigation = array(
				array("Quản Lý", "/app"),
				array("Đào Tạo", "/app/course")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");	
			$LessionAll = $mCourseLession->findByPage(array($IdCourse, $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($Course->getLessions()->count(), $Config->getValue(), $Course->getURLLession());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			
			$request->setObject('AlbumAll', $AlbumAll);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('CourseAll', $CourseAll);
			$request->setObject('Course', $Course);
			
			$request->setObject('Navigation', $Navigation);
			$request->setObject('LessionAll', $LessionAll);
			$request->setObject('PN', $PN);
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveAdmin", 'Course');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>