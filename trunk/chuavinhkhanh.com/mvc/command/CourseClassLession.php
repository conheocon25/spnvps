<?php
	namespace MVC\Command;	
	class CourseClassLession extends Command{
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
			$IdClass = $request->getProperty('IdClass');
			$IdLession = $request->getProperty('IdLession');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mAsk = new \MVC\Mapper\Ask();
			$mEvent = new \MVC\Mapper\Event();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mCourseClass = new \MVC\Mapper\CourseClass();
			$mClassLession = new \MVC\Mapper\ClassLession();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$PagodaAll = $mPagoda->findAll();						
			$CourseAll = $mCourse->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			$Course = $mCourse->find($IdCourse);
			$Class = $mCourseClass->find($IdClass);
			$Lession = $mClassLession->find($IdLession);
			
			if(isset($Course)) {
				$Title = "Đào tạo / ".$Course->getName()." /... ".$Lession->getName();
			}
			else {
				$Title = "Đào tạo";
			}
			
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();			
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("ActiveItem", 'Course');
			$request->setProperty("Title", $Title);
			$request->setObject("Event", $Event);
			$request->setObject('Course', $Course);
			$request->setObject('Class', $Class);
			$request->setObject('Lession', $Lession);
						
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('CourseAll', $CourseAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
