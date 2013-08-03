<?php
	namespace MVC\Command;	
	class AppPagodaUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdPagoda = $request->getProperty('IdPagoda');			
			$Name = $request->getProperty('Name');
			$Phone = $request->getProperty('Phone');
			$Address = $request->getProperty('Address');
			$Website = $request->getProperty('Website');
			$Master = $request->getProperty('Master');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mPagoda = new \MVC\Mapper\Pagoda();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name))
				return self::statuses('CMD_OK');			
						
			$Pagoda = $mPagoda->find($IdPagoda);
						
			$Pagoda->setName($Name);
			$Pagoda->setPhone($Phone);
			$Pagoda->setAddress($Address);
			$Pagoda->setWebsite($Website);
			$Pagoda->setMaster($Master);
			$Pagoda->reKey();
			$mPagoda->update($Pagoda);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>