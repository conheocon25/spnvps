<?php
	namespace MVC\Command;	
	class LibraryVideo extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdBType = $request->getProperty("IdBType");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mMonk = new \MVC\Mapper\Monk();
			$mVM = new \MVC\Mapper\VideoMonk();
			$mAlbum = new \MVC\Mapper\Album();
			$mEvent = new \MVC\Mapper\Event();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Monks = $mMonk->findAll();			
			$VMUpdateTopAll = $mVM->findByUpdateTop(array($IdBType));
			$VMViewTopAll = $mVM->findByViewTop(array($IdBType));
						
			$CategoryBType = $mCategoryBType->find($IdBType);
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$Pagodas = $mPagoda->findAll();
			$Sponsors = $mSponsor->findAll();
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject("VMUpdateTopAll", $VMUpdateTopAll);
			$request->setObject("VMViewTopAll", $VMViewTopAll);
			$request->setObject("Event", $Event);
			$request->setObject("CategoryBType", $CategoryBType);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("Monks", $Monks);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Sponsors', $Sponsors);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>