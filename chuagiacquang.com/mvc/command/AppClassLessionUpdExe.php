<?php
	namespace MVC\Command;	
	class AppClassLessionUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdClass = $request->getProperty('IdClass');
			$IdCourse = $request->getProperty('IdCourse');
			
			$IdLession = $request->getProperty('IdLession');
			$IdMonk = $request->getProperty('IdMonk');
			$Name = $request->getProperty('Name');
			$DateStart = $request->getProperty('DateStart');
			$DateEnd = $request->getProperty('DateEnd');
			$Description = \stripslashes( $request->getProperty('Description') );
			$Order = $request->getProperty('Order');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCourse = new \MVC\Mapper\Course();
			$mCourseClass = new \MVC\Mapper\CourseClass();
			$mClassLession = new \MVC\Mapper\ClassLession();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Course = $mCourse->find($IdCourse);
			$Class = $mCourseClass->find($IdClass);
			$Lession = $mClassLession->find($IdLession);
			$Lession->setName($Name);
			$Lession->setIdMonk($IdMonk);
			$Lession->setDateStart($DateStart);
			$Lession->setDateEnd($DateEnd);
			$Lession->setDescription($Description);
			$Lession->setOrder($Order);
			$mClassLession->update($Lession);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			
			return self::statuses('CMD_OK');
		}
	}
?>