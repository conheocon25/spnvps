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
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------											
			$Title = "WEB SITE CHÙA PHƯỚC HƯNG";
						
			$VM24 = $mVideoMonk->findByUpdateTop(array());
			$VL24 = $mVideoLibrary->findByUpdateTop(array());
			$VL8 = $mVideoLibrary->findByLocalTop(array());
									
			$Albums = $mAlbum->findAll();
			$Categories = $mCategoryNews->findByAll(null);
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoryVideo = $mCategoryVideo->findAll()->current();			
			$Asks = $mAsk->findByTop(array());
			$Pagodas = $mPagoda->findAll();
			$Tasks = $mTask->findAll();
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();

			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLs = $mClassLession->findByRecent(null);
			$CLsNext = $mClassLession->findByNext(null);
			
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			$PanelAds = $mPanelAds->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty("Title", $Title);
						
			$request->setObject("VL24", $VL24);
			$request->setObject("VM24", $VM24);
			$request->setObject("VL8", $VL8);
			$request->setObject("Albums", $Albums);
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoriesNews", $CategoriesNews);			
			$request->setObject("Event", $Event);
			$request->setObject("Asks", $Asks);
			$request->setObject("Pagodas", $Pagodas);
			$request->setObject("Tasks", $Tasks);
			$request->setObject("Course", $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("CLs", $CLs);
			$request->setObject("CLsNext", $CLsNext);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			$request->setProperty("ActiveItem", 'Introduction');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>