<?php
	namespace MVC\Command;	
	class LibraryDhammapada extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdAlbum = $request->getProperty('IdAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mAlbum = new \MVC\Mapper\Album();
			$mEvent = new \MVC\Mapper\Event();
			$mNews = new \MVC\Mapper\News();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mConfig = new \MVC\Mapper\Config();
			$mDhammapada = new \MVC\Mapper\Dhammapada();
			$mDhammapadaDetail = new \MVC\Mapper\DhammapadaDetail();
			$mClassLession = new \MVC\Mapper\ClassLession();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Albums = $mAlbum->findAll();			
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();			
			
			if (!isset($IdAlbum)){
				$Album = $Albums->current();
			}else{
				$Album = $mAlbum->find($IdAlbum);
			}
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();
			
			$Config1 = $mConfig->findByName('BOX1');
			$Config2 = $mConfig->findByName('BOX2');
			$Config3 = $mConfig->findByName('BOX3');
			$Config4 = $mConfig->findByName('BOX4');
			$Config5 = $mConfig->findByName('BOX5');
			$Config6 = $mConfig->findByName('BOX6');
			$News1 = $mNews->find( $Config1->getValue() );
			$News2 = $mNews->find( $Config2->getValue() );
			$News3 = $mNews->find( $Config3->getValue() );
			$News4 = $mNews->find( $Config4->getValue() );
			$News5 = $mNews->find( $Config5->getValue() );
			$News6 = $mNews->find( $Config6->getValue() );
			
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$DhammapadaAll = $mDhammapada->findAll();
			$CLsNext = $mClassLession->findByNext(null);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Album", $Album);
			$request->setObject("Albums", $Albums);
			$request->setObject("Event", $Event);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject("Course", $Course);
			$request->setObject("News1", $News1);
			$request->setObject("News2", $News2);
			$request->setObject("News3", $News3);
			$request->setObject("News4", $News4);
			$request->setObject("News5", $News5);
			$request->setObject("News6", $News6);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("DhammapadaAll", $DhammapadaAll);
			$request->setObject("CLsNext", $CLsNext);
			
			$request->setProperty("ActiveItem", 'LibraryAlbum');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>