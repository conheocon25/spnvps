<?php
	namespace MVC\Command;	
	class Introduction3 extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mEvent = new \MVC\Mapper\Event();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPagoda = new \MVC\Mapper\Pagoda();
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
			$Sponsors = $mSponsor->findAll();
			
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();

			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("Event", $Event);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Sponsors', $Sponsors);
			$request->setObject("Course", $Course);			
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			$request->setProperty("ActiveItem", 'Introduction');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>