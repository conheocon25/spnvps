<?php
	namespace MVC\Command;	
	class AppCourseLessionUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdLession = $request->getProperty('IdLession');
			$IdCourse = $request->getProperty('IdCourse');
			$IdMonk = $request->getProperty('IdMonk');
			$Name = $request->getProperty('Name');
			$DateStart = $request->getProperty('DateStart');
			$DateEnd = $request->getProperty('DateEnd');
			$Description = \stripslashes( $request->getProperty('Description'));
			$Order = $request->getProperty('Order');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCourseLession = new \MVC\Mapper\CourseLession();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Lession = $mCourseLession->find($IdLession);
			$Lession->setIdMonk($IdMonk);
			$Lession->setName($Name);
			$Lession->setDateStart($DateStart);
			$Lession->setDateEnd($DateEnd);
			$Lession->setDescription($Description);
			$Lession->setOrder($Order);
			$Lession->reKey();
			
			$mCourseLession->update($Lession);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
						
			return self::statuses('CMD_OK');
		}
	}
?>