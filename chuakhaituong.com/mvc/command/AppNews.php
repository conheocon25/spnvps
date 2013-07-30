<?php
	namespace MVC\Command;	
	class AppNews extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
			$IdCurrentCategory = $Session->getCurrentCategoryNews();						
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
			$Category = $mCategoryNews->find($IdCategory);
			$CategoryNewsAll = $mCategoryNews->findAll();						
			if (!isset($Page)) $Page=1;
			
			$Title = "Quản lý / Tin tức / ".$Category->getName();
			$NewsAll = $mNews->findByCategoryPage(array($IdCategory, $Page, 8));
			$PN = new \MVC\Domain\PageNavigation($Category->getNews()->count(), 8, $Category->getURLView());
			$Title = "QUẢN LÝ";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("Category", $Category);
			$request->setObject("PN", $PN);
			$request->setObject("NewsAll", $NewsAll);
			
			$request->setProperty("Title", $Title);
			$request->setProperty('Page', $Page);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>