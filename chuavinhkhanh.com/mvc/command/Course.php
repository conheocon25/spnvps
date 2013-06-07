<?php
	namespace MVC\Command;	
	class Course extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------						
			$IdCourse = $request->getProperty('IdCourse');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mAsk = new \MVC\Mapper\Ask();
			$mEvent = new \MVC\Mapper\Event();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mDhammapadaDetail = new \MVC\Mapper\DhammapadaDetail();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			$mPanelAds = new \MVC\Mapper\PanelAds();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			$Title = "Đào tạo / ";
			$CourseAll = $mCourse->findAll();
			if (!isset($IdCourse)){
				$Course = $CourseAll->current();
			}else{
				$Course = $mCourse->find( $IdCourse );
			}
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("ActiveItem", 'Course');
			$request->setProperty("Title", $Title);
			
			$request->setObject("Event", $Event);
			$request->setObject('Course', $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);			
			
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('CourseAll', $CourseAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
