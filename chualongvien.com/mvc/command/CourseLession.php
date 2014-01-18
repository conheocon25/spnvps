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
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryBTypeAll = $mCategoryBType->findByPart1();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$Courses = $mCourse->findAll();
			
			$Course = $mCourse->findByKey($KCourse);
			$Lession = $mCourseLession->findByKey($KLession);
						
			$MonkAll = $mMonk->findVIP(null);
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);			
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("Course", $Course);
			$request->setObject("Courses", $Courses);			
			$request->setObject("Lession", $Lession);			
			$request->setObject("MonkAll", $MonkAll);
									
			$request->setProperty("ActiveItem", 'Course');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>