<?php
	namespace MVC\Command;	
	class Pagoda extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdPagoda = $request->getProperty('IdPagoda');
			$IdVideoPagoda = $request->getProperty('IdVideoPagoda');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mEvent = new \MVC\Mapper\Event();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mVideoPagoda = new \MVC\Mapper\VideoPagoda();
			$mConfig = new \MVC\Mapper\Config();
			$mCourse = new \MVC\Mapper\Course();
			$mNews = new \MVC\Mapper\News();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Categories = $mCategoryNews->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			$Pagoda = $mPagoda->find($IdPagoda);
			$VP = $mVideoPagoda->find($IdVideoPagoda);
			
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();
			
			$Sponsors = $mSponsor->findAll();
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("Event", $Event);
			$request->setObject("Pagodas", $Pagodas);
			$request->setObject("Pagoda", $Pagoda);
			$request->setObject("VP", $VP);
			$request->setObject("Course", $Course);
			$request->setObject("Sponsors", $Sponsors);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			
			$request->setProperty("ActiveItem", 'Pagoda');
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>