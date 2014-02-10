<?php
	namespace MVC\Command;	
	class AppMonk extends Command{
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
			$mMonk 				= new \MVC\Mapper\Monk();
			$mConfig 			= new \MVC\Mapper\Config();
			$mCategoryBType 	= new \MVC\Mapper\CategoryBType();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$MonkAll = $mMonk->findAll();
			$CategoryBTypeAll 	= $mCategoryBType->findAll();
			
			$Title = "Giảng Sư";
			$Navigation = array(
				array("Quản Lý", "/app")
			);
			
			if (!isset($Page)) $Page=1;			
			$Config 	= $mConfig->findByName("ROW_PER_PAGE");
			$MonkAll1 	= $mMonk->findByPage(array($Page, $Config->getValue() ));
			$PN 		= new \MVC\Domain\PageNavigation($MonkAll->count(), $Config->getValue(), "/app/monk" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('MonkAll', $MonkAll);									
			$request->setObject('MonkAll1', $MonkAll1);
			$request->setObject('CategoryBTypeAll', $CategoryBTypeAll);
			
			$request->setObject('PN', $PN);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("ActiveAdmin", 'Monk');
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>