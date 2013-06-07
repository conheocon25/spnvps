<?php
	namespace MVC\Command;	
	class AppTaskUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTask = $request->getProperty('IdTask');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mAlbum = new \MVC\Mapper\Album();
			$mEvent = new \MVC\Mapper\Event();
			$mMonk = new \MVC\Mapper\Monk();
			$mCourse = new \MVC\Mapper\Course();
			$mLinked = new \MVC\Mapper\Linked();
			$mCategoryTask = new \MVC\Mapper\CategoryTask();
			$mTask = new \MVC\Mapper\Task();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAllVideo = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$AlbumAll = $mAlbum->findAll();
			$Events = $mEvent->findAll();
			$Monks = $mMonk->findAll();
			$Courses = $mCourse->findAll();
			$Linkeds = $mLinked->findAll();
			$TaskAll = $mTask->findAll();
			$CategoryAllTask = $mCategoryTask->findAll();
						
			$Task = $mTask->find($IdTask);
			
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAllAll = $mPanelAds->findAll();

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryBTypeAll", $CategoryBType);
			$request->setObject("PanelAdsAll", $PanelAdsAllAll);						
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAllVideo", $CategoryAllVideo);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('CategoryAllTask', $CategoryAllTask);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('AlbumAll', $AlbumAll);
			$request->setObject('Events', $Events);
			$request->setObject('Monks', $Monks);
			$request->setObject('Courses', $Courses);
			$request->setObject('Linkeds', $Linkeds);
			$request->setObject('Task', $Task);
			
			$request->setProperty("Title", 'QUẢN LÝ / CÔNG VIỆC / '.$Task->getTitle()." / CẬP NHẬT" );
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'Task');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>