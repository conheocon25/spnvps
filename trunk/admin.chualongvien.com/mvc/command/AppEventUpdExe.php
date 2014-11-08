<?php
	namespace MVC\Command;	
	class AppEventUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$IdEvent 	= $request->getProperty('IdEvent');
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
			$Event = $mEvent->find($IdEvent);
			$Event->setName($Name);
			$Event->setDate($Date);
			$Event->setPicture($Picture);
			$Event->setContent($Content);
			$Event->reKey();
						
			$mEvent->update($Event);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
