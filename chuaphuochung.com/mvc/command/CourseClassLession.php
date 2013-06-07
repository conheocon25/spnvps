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
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();			
			$Pagodas = $mPagoda->findAll();						
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
			
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			$PanelAds = $mPanelAds->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesNews", $CategoriesNews);			
			$request->setObject("Event", $Event);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Courses', $Courses);
			$request->setObject('Course', $Course);
			$request->setObject('Class', $Class);
			$request->setObject('Lession', $Lession);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			$request->setProperty("ActiveItem", 'Course');
			$request->setProperty("Title", $Title);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoriesBType", $CategoriesBType);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
