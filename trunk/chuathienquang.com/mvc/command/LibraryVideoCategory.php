<?php
	namespace MVC\Command;	
	class LibraryVideoCategory extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mMonk = new \MVC\Mapper\Monk();
			$mVL = new \MVC\Mapper\VideoLibrary();
			$mAlbum = new \MVC\Mapper\Album();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mVL = new \MVC\Mapper\VideoLibrary();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Page)) $Page=1;
			
			$Monks = $mMonk->findAll();
			$VLs = $mVL->findBy(array($IdCategory));
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$Category = $mCategoryVideo->find($IdCategory);
			$Pagodas = $mPagoda->findAll();
			
			$VLs = $mVL->findByPage(array($IdCategory, $Page, 10));			
			$PN = new \MVC\Domain\PageNavigation($Category->getVLs()->count(), 10, $Category->getURLRead());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Monks", $Monks);			
			$request->setObject("VLs", $VLs);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("Category", $Category);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('VLs', $VLs);
			$request->setObject('PN', $PN);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			$request->setProperty("Page", $Page);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>