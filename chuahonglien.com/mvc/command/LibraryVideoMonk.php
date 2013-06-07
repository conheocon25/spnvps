<?php
	namespace MVC\Command;	
	class LibraryVideoMonk extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdMonk = $request->getProperty('IdMonk');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mMonk = new \MVC\Mapper\Monk();
			$mVM = new \MVC\Mapper\VideoMonk();
			$mAlbum = new \MVC\Mapper\Album();			
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mVM = new \MVC\Mapper\VideoMonk();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Page)) $Page=1;
			
			$Monks = $mMonk->findAll();
			$VMs = $mVM->findBy(array($IdMonk));
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$Monk = $mMonk->find($IdMonk);
			$Pagodas = $mPagoda->findAll();
			
			$VMs = $mVM->findByPage(array($IdMonk, $Page, 10));
			$PN = new \MVC\Domain\PageNavigation($Monk->getVMs()->count(), 10, $Monk->getURLRead());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Monks", $Monks);			
			$request->setObject("VMs", $VMs);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("Monk", $Monk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('PN', $PN);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			$request->setProperty("Page", $Page );
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>