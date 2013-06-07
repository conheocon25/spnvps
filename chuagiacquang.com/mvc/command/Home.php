<?php
	namespace MVC\Command;	
	class Home extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
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
			$mVM = new \MVC\Mapper\VideoMonk();
			$mVideo = new \MVC\Mapper\Video();			
			$mAlbum = new \MVC\Mapper\Album();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mNews = new \MVC\Mapper\News();
			$mEvent = new \MVC\Mapper\Event();
			$mAsk = new \MVC\Mapper\Ask();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mConfig = new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "WEB SITE CHÙA GIÁC QUANG";
						
			$VM24 = $mVM->findByUpdateTop(array());
			$VM8 = $mVM->findByTopLocal(array());
									
			$Albums = $mAlbum->findAll();
			$Categories = $mCategoryNews->findByAll(null);
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoryVideo = $mCategoryVideo->findAll()->current();			
			$Asks = $mAsk->findByTop(array());
			$Pagodas = $mPagoda->findAll();
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();
			
			$Config1 = $mConfig->findByName('BOX1');
			$Config2 = $mConfig->findByName('BOX2');
			$News1 = $mNews->find( $Config1->getValue() );
			$News2 = $mNews->find( $Config2->getValue() );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			
			$request->setObject("VM8", $VM8);
			$request->setObject("VM24", $VM24);
			$request->setObject("Albums", $Albums);
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoriesNews", $CategoriesNews);			
			$request->setObject("Event", $Event);
			$request->setObject("Asks", $Asks);
			$request->setObject("Pagodas", $Pagodas);
			$request->setObject("Course", $Course);
			$request->setObject("News1", $News1);
			$request->setObject("News2", $News2);
			$request->setProperty("ActiveItem", 'Home');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>