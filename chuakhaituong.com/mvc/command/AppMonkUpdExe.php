<?php
	namespace MVC\Command;	
	class AppMonkUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdMonk = $request->getProperty('IdMonk');			
			$PreName = $request->getProperty('PreName');
			$Name = $request->getProperty('Name');
			$Phone = $request->getProperty('Phone');
			$Note = $request->getProperty('Note');
			$Pagoda = $request->getProperty('Pagoda');
			$Type = $request->getProperty('Type');
			$BType = $request->getProperty('BType');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mMonk = new \MVC\Mapper\Monk();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name))
				return self::statuses('CMD_OK');			
			
			if ($Type=="on")
				$Type=1;
			else
				$Type=0;
			
			$dMonk = $mMonk->find($IdMonk);
			
			$dMonk->setPreName($PreName);
			$dMonk->setName($Name);
			$dMonk->setNote($Note);
			$dMonk->setPhone($Phone);
			$dMonk->setPagoda($Pagoda);
			$dMonk->setType($Type);
			$dMonk->setBType($BType);
			
			$mMonk->update($dMonk);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>