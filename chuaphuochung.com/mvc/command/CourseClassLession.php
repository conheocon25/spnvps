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
			include("mvc/base/mapper/MapperDefault.php");
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$PagodaAll = $mPagoda->findAll();						
			$Courses = $mCourse->findAll();
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
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("Event", $Event);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('Courses', $Courses);
			$request->setObject('Course', $Course);
			$request->setObject('Class', $Class);
			$request->setObject('Lession', $Lession);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setProperty("ActiveItem", 'Course');
			$request->setProperty("Title", $Title);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
