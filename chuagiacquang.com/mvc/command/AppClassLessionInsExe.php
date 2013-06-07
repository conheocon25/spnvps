<?php
	namespace MVC\Command;	
	class AppClassLessionInsExe extends Command{
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
			$IdMonk = $request->getProperty('IdMonk');
			$Name = $request->getProperty('Name');
			$DateStart = $request->getProperty('DateStart');
			$DateEnd = $request->getProperty('DateEnd');
			$Description = \stripslashes( $request->getProperty('Description') );
			$Order = $request->getProperty('Order');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------									
			$mClassLession = new \MVC\Mapper\ClassLession();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Lession = new \MVC\Domain\ClassLession(
				null,
				$IdClass,
				$IdMonk,
				$Name,
				$DateStart,
				$DateEnd,
				$Description,
				$Order
			);												
			$mClassLession->insert($Lession);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			
			return self::statuses('CMD_OK');
		}
	}
?>