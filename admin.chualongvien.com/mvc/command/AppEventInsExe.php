<?php
	namespace MVC\Command;	
	class AppEventInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$Name 		= $request->getProperty('Name');
			$Date 		= $request->getProperty('Date');
			$Picture 	= $request->getProperty('Picture');
			$Content 	= \stripslashes($request->getProperty('Content'));
									
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mEvent = new \MVC\Mapper\Event();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Event = new \MVC\Domain\Event(								
				null,
				$Name,
				$Date,
				$Picture,
				$Content
			);
			$Event->reKey();
			$mEvent->insert($Event);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
