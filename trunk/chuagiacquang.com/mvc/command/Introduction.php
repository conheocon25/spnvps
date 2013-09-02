<?php
	namespace MVC\Command;	
	class Introduction extends Command {
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
			$mVideo = new \MVC\Mapper\Video();
			$mAudio = new \MVC\Mapper\Audio();
			$mAlbum = new \MVC\Mapper\Album();
			$mEvent = new \MVC\Mapper\Event();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
									
			$Videos = $mVideo->findAll();
			$Video = $Videos->current();
			$Audios = $mAudio->findAll();
			$Albums = $mAlbum->findAll();			
			$Categories = $mCategoryNews->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			
			$Pagodas = $mPagoda->findAll();

			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Videos", $Videos);
			$request->setObject("Video", $Video);
			$request->setObject("Audios", $Audios);
			$request->setObject("Albums", $Albums);
			$request->setObject("Event", $Event);
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setProperty("ActiveItem", 'Introduction');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>