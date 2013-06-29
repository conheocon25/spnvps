<?php
	namespace MVC\Command;	
	class Course extends Command {
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
			$Courses = $mCourse->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("Event", $Event);
			$request->setObject("Course", $Course);
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("Courses", $Courses);
			$request->setObject("AskAll", $AskAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			
			$request->setProperty("ActiveItem", 'Course');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>