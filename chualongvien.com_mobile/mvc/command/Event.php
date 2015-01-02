<?php
	namespace MVC\Command;	
	class Event extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$EventKey = $request->getProperty('EventKey');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------													
			$mEvent 			= new \MVC\Mapper\Event();						
			$mConfig 			= new \MVC\Mapper\Config();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$EventAll		= $mEvent->findAll();
			if (!isset($EventKey))
				$Event = $EventAll->current();
			else
				$Event = $mEvent->findByKey($EventKey);
																	
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("EventCurrent", $Event);
			$request->setObject("EventAll", 	$EventAll);
											
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
