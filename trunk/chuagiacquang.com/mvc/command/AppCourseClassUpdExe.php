<?php
	namespace MVC\Command;	
	class AppCourseClassUpdExe extends Command{
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
			$Name = $request->getProperty('Name');
			$DateStart = $request->getProperty('DateStart');
			$DateEnd = $request->getProperty('DateEnd');
			$Description = \stripslashes($request->getProperty('Description'));
			$Order = $request->getProperty('Order');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCourseClass = new \MVC\Mapper\CourseClass();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Class = $mCourseClass->find($IdClass);
			$Class->setName($Name);
			$Class->setDateStart($DateStart);
			$Class->setDateEnd($DateEnd);
			$Class->setDescription($Description);
			$Class->setOrder($Order);
			
			$mCourseClass->update($Class);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
						
			return self::statuses('CMD_OK');
		}
	}
?>