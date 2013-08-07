<?php
	namespace MVC\Command;	
	class CourseLession extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KCourse = $request->getProperty('KCourse');
			$KLession = $request->getProperty('KLession');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryVideo = $mCategoryVideo->findAll()->current();
									
			$AskAll = $mAsk->findByTop(array());
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
															
			$Courses = $mCourse->findAll();
			
			$Course = $mCourse->findByKey($KCourse);
			$Lession = $mCourseLession->findByKey($KLession);
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$MonkAll = $mMonk->findVIP(null);
			
			$EventAll = $mEvent->findAll();
			$Popup = $mPopup->findByName("dao-tao");
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("Course", $Course);
			$request->setObject("Courses", $Courses);
			$request->setObject("AskAll", $AskAll);			
			$request->setObject("Lession", $Lession);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("MonkAll", $MonkAll);
			
			$request->setObject("EventAll", $EventAll);
			$request->setObject("Popup", $Popup);
			
			$request->setProperty("ActiveItem", 'Home');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>