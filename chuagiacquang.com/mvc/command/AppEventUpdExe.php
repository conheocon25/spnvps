<?php
	namespace MVC\Command;	
	class AppEventUpdExe extends Command{
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
			if (!isset($IdEvent))
				return self::statuses('CMD_OK');
							
			$Event = $mEvent->find($IdEvent);
						
			$Event->setContent($Content);
			$Event->setTitle($Title);
			$Event->setDate($Date);
									
			$mEvent->update($Event);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>
