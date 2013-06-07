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
			$IdBType = $request->getProperty('IdBType');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();			
			$mMonk = new \MVC\Mapper\Monk();			
			$mAlbum = new \MVC\Mapper\Album();						
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			$mVM = new \MVC\Mapper\VideoMonk();
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();			
			$Monks = $mMonk->findAll();						
			$Pagodas = $mPagoda->findAll();
			$Sponsors = $mSponsor->findAll();
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			$Monk = $mMonk->find($IdMonk);
			$VMs = $mVM->findBy(array($IdMonk));			
			$CategoryBType = $mCategoryBType->find($IdBType);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesVideo", $CategoriesVideo);			
			$request->setObject("CategoryBType", $CategoryBType);
			$request->setObject("Monks", $Monks);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Sponsors', $Sponsors);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			
			$request->setObject("VMs", $VMs);			
			$request->setObject("Monk", $Monk);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>