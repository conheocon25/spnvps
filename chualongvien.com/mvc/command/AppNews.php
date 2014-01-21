<?php
	namespace MVC\Command;	
	class AppNews extends Command{
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
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mConfig = new \MVC\Mapper\Config();
			$mNews = new \MVC\Mapper\News();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Category = $mCategoryNews->find($IdCategory);
			$CategoryNewsAll = $mCategoryNews->findAll();						
			if (!isset($Page)) $Page=1;
			
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$NewsAll = $mNews->findByCategoryPage(array($IdCategory, $Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($Category->getNews()->count(), $Config->getValue(), $Category->getURLView());
			
			$Title = $Category->getName();
			$Navigation = array(
				array("Quản Lý", "/app"),
				array("Tin Tức", "/app/category/news")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("Category", $Category);
			$request->setObject("PN", $PN);
			$request->setObject("NewsAll", $NewsAll);
			
			$request->setObject("Navigation", $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty('Page', $Page);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>