<?php
	namespace MVC\Command;	
	class CourseClass extends Command{
		function doExecute( \MVC\Controller\Request $request ){
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mAsk = new \MVC\Mapper\Ask();
			$mEvent = new \MVC\Mapper\Event();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mCourseClass = new \MVC\Mapper\CourseClass();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();			
			$Pagodas = $mPagoda->findAll();			
			$Courses = $mCourse->findAll();
			$Course = $mCourse->find( $IdCourse );
			$Class = $mCourseClass->find( $IdClass );
			$NameCourde = "":
			if(isset($Course)){
				$NameCourde = $Course->getName();
			}
			$Title = "Đào tạo / ".$NameCourde." / ".$Class->getName();
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			
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
			
			$request->setProperty("ActiveItem", 'Course');
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>