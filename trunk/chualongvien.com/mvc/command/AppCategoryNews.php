<?php
	namespace MVC\Command;	
	class AppCategoryNews extends Command{
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
									
			$Title = "TIN TỨC";
			$Navigation = array(
				array("QUẢN LÝ", "/app")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$CategoryAll = $mCategoryNews->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($CategoryNewsAll->count(), $Config->getValue(), "/app/category/news" );
			
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
												
			$request->setObject('CategoryAll', $CategoryAll);
			$request->setObject('PN', $PN);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("ActiveAdmin", 'News');
			$request->setProperty("Page", $Page);
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>