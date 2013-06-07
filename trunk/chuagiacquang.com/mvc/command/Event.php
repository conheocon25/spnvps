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
			$mEvent = new \MVC\Mapper\Event();
			$mNews = new \MVC\Mapper\News();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mConfig = new \MVC\Mapper\Config();
			
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
			$Config1 = $mConfig->findByName('BOX1');
			$Config2 = $mConfig->findByName('BOX2');
			$News1 = $mNews->find( $Config1->getValue() );
			$News2 = $mNews->find( $Config2->getValue() );			
			
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
			$request->setObject("News1", $News1);
			$request->setObject("News2", $News2);
			
			$request->setProperty("ActiveItem", 'Event');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>