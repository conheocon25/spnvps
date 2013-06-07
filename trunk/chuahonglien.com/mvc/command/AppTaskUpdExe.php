<?php
	namespace MVC\Command;	
	class AppTaskUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTask = $request->getProperty('IdTask');
			$Type = $request->getProperty('Type');
			$Date = $request->getProperty('Date');
			$Title = $request->getProperty('Title');
			$Description = $request->getProperty('Description');
			$URL = $request->getProperty('URL');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mTask = new \MVC\Mapper\Task();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Tasks = $mTask->findAll();

			$Task = $mTask->find($IdTask);
			$Task->setType($Type);
			$Task->setDate($Date);
			$Task->setTitle($Title);
			$Task->setDescription($Description);
			$Task->setURL($URL);
			$mTask->update($Task);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>