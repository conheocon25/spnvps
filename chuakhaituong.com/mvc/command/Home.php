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
			$mVL = new \MVC\Mapper\VideoLibrary();
			$mVideo = new \MVC\Mapper\Video();			
			$mAlbum = new \MVC\Mapper\Album();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mNews = new \MVC\Mapper\News();
			$mEvent = new \MVC\Mapper\Event();
			$mAsk = new \MVC\Mapper\Ask();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mConfig = new \MVC\Mapper\Config();
			$mCourse = new \MVC\Mapper\Course();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "WEBSITE CHÙA KHAI TƯỜNG";
						
			$VM24 = $mVM->findByUpdateTop1(null);
			$VM8 = $mVM->findByTopLocal(array(2));
			$VL24 = $mVL->findByUpdateTop(array(2));
			$VL8 = $mVL->findByTopLocal(array(2));
			
			$Albums = $mAlbum->findAll();
			$Categories = $mCategoryNews->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoryVideo = $mCategoryVideo->findAll()->current();
			$Sponsors = $mSponsor->findAll();						
			$Asks = $mAsk->findByTop(array());
			$Pagodas = $mPagoda->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
												
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();
								
												
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			
			$request->setObject("VL8", $VL8);
			$request->setObject("VM8", $VM8);
			$request->setObject("VM24", $VM24);
			$request->setObject("VL24", $VL24);
			$request->setObject("Albums", $Albums);
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoryNewsAll", $CategoriesNews);
			$request->setObject("Event", $Event);			
			$request->setObject("Asks", $Asks);			
			$request->setObject("Pagodas", $Pagodas);
			$request->setObject("Sponsors", $Sponsors);
			$request->setObject("Course", $Course);
									
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);

			$request->setProperty("ActiveItem", 'Home');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>