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
			$IdCategory = $request->getProperty('IdCategory');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$Categories1 = $mCategoryNews->findAll();
			$PagodaAll = $mPagoda->findAll();
			
			if (!isset($IdCategory)){
				if (!isset($IdCurrentCategory)){
					$Category = $Categories->current();
					$IdCategory = $Category->getId();
				}
				else {
					$Category = $mCategoryNews->find($IdCurrentCategory);
					$IdCategory = $IdCurrentCategory;
				}
			}else{
				$Category = $mCategoryNews->find($IdCategory);
			}
			if (!isset($Page)) $Page=1;			
			$Session->setCurrentCategoryNews($IdCategory);
			$NewsAll = $mNews->findByCategoryPage(array($IdCategory, $Page, 8));
			$Title = "Quản lý / Chuyên mục Tin tức / ".$Category->getName();
			$PN = new \MVC\Domain\PageNavigation($Category->getNews()->count(), 8, $Category->getURLView());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("Categories", $Categories1);
			$request->setObject("Category", $Category);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('NewsAll', $NewsAll);
			$request->setObject('PN', $PN);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("Page", $Page);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>