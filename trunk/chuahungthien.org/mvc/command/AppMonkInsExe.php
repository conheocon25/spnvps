<?php
	namespace MVC\Command;	
	class AppMonkInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$PreName = $request->getProperty('PreName');
			$Name = $request->getProperty('Name');
			$Phone = $request->getProperty('Phone');
			$Note = $request->getProperty('Note');
			$Pagoda = $request->getProperty('Pagoda');
			$Type = $request->getProperty('Type');
			$BType = $request->getProperty('BType');
			$URLPic = $request->getProperty('URLPic');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mMonk = new \MVC\Mapper\Monk();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name)||$Name=="")
				return self::statuses('CMD_OK');
			
			if ($Type=="on")
				$Type=1;
			else
				$Type=0;
				
			$dMonk = new \MVC\Domain\Monk(
				null,
				$PreName,
				$Name,
				$Pagoda,
				$Phone,
				$Note,
				$Type,
				$BType,
				$URLPic
			);
			$dMonk->reKey();
			$mMonk->insert($dMonk);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
