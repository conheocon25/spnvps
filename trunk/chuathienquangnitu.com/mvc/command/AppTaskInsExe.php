<?php
	namespace MVC\Command;	
	class AppTaskInsExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------		
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
			$Task = new \MVC\Domain\Task(
				null,
				$Date,
				$Type,
				$Title,
				$Description,
				$URL
			);
			$mTask->insert($Task);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>