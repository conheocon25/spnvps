<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetail extends Command{
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
			$IdCategory = $request->getProperty('IdCategory');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$CategoryVideoAll = $mCategoryVideo->findAll();						
			$Category = $mCategoryVideo->find($IdCategory);
			if (!isset($Page)) $Page = 1;
			$VLAll = $mVL->findByPage(array($IdCategory, $Page, 10));
			$PN = new \MVC\Domain\PageNavigation($Category->getVLs()->count(), 10, $Category->getURLVideo());
			
			$Title = "Quản lý / Chuyên mục Video / ".$Category->getName();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);			
			$request->setObject("Category", $Category);
			$request->setObject("VLAll", $VLAll);
			$request->setObject("PN", $PN);
			
			$request->setProperty("Page", $Page);
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>