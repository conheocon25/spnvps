<?php
	namespace MVC\Command;	
	class Event extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdEvent = $request->getProperty('IdEvent');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$EventsNear = $mEvent->findByNear(null);
			$EventsFinish = $mEvent->findByFinish(null);
			$Categories = $mCategoryNews->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			
			$Event = $EventsNear->current();
			
			if (isset($IdEvent)){
				$EventRead = $mEvent->find($IdEvent);
			}else{
				$EventRead = $EventsNear->current();
			}
			
			$Course = $mCourse->findByNear(null)->current();						

			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLsNext = $mClassLession->findByNext(null);
			
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			$PanelAds = $mPanelAds->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Event", $Event);
			$request->setObject("EventRead", $EventRead);
			$request->setObject("EventsNear", $EventsNear);
			$request->setObject("EventsFinish", $EventsFinish);						
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject("Course", $Course);
			$request->setObject("CLsNext", $CLsNext);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setProperty("ActiveItem", 'Event');
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoriesBType", $CategoriesBType);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>