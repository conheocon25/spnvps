<?php
	namespace MVC\Command;	
	class AppEventUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdEvent = $request->getProperty('IdEvent');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mEvent = new \MVC\Mapper\Event();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Event 		= $mEvent->find($IdEvent);
			$Title 		= mb_strtoupper("CẬP NHẬT", 'UTF8');
			
			$Navigation = array(array("SỰ KIỆN", "/app/event"));
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------																					
			$request->setObject('Navigation', 	$Navigation);
			$request->setObject('Event', 		$Event);			
			$request->setProperty("Title", 		$Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>