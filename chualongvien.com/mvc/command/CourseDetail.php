<?php
	namespace MVC\Command;	
	class CourseDetail extends Command {
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryBTypeAll = $mCategoryBType->findByPart1();
			$CategoryNewsAll = $mCategoryNews->findAll();														
			$Courses = $mCourse->findAll();												
			$MonkAll = $mMonk->findVIP(null);			
			$Course = $mCourse->findByKey($KCourse);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);			
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);											
			$request->setObject("Courses", $Courses);			
			$request->setObject("MonkAll", $MonkAll);
			
			$request->setObject("Course", $Course);
						
			$request->setProperty("ActiveItem", 'Course');			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>