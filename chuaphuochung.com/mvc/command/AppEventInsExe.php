<?php
	namespace MVC\Command;	
	class AppEventInsExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$IdEvent = $request->getProperty('IdEvent');						
			$Content = \stripslashes($request->getProperty('Content'));
			$Title = $request->getProperty('Title');
			$Date = $request->getProperty('Date');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mEvent = new \MVC\Mapper\Event();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Title))
				return self::statuses('CMD_OK');
							
			$Event = new \MVC\Domain\Event(
				null,
				$Date,
				$Content,
				$Title				
			);
			$mEvent->insert($Event);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
