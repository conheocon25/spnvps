<?php
	namespace MVC\Command;	
	class AppProfileNewsUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$IdProfile = $request->getProperty('IdProfile');
			$Name = $request->getProperty('Name');
			$RSS = $request->getProperty('RSS');
			$CTitle = $request->getProperty('CTitle');
			$CAuthor = $request->getProperty('CAuthor');
			$CContent = $request->getProperty('CContent');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mProfile = new \MVC\Mapper\ProfileNews();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name)) return self::statuses('CMD_OK');			
			
			$Profile = $mProfile->find($IdProfile);
			
			$Profile->setName($Name);
			$Profile->setRSS($RSS);
			$Profile->setCTitle($CTitle);
			$Profile->setCAuthor($CAuthor);
			$Profile->setCContent($CContent);
			
			$mProfile->update($Profile);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>