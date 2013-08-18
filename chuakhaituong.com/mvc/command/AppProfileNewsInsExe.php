<?php
	namespace MVC\Command;	
	class AppProfileNewsInsExe extends Command {
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
				
			$Profile = new \MVC\Domain\ProfileNews(
				null,
				$Name,
				$IdCategory,
				$RSS,
				$CTitle,
				$CAuthor,
				$CContent
			);			
			$mProfile->insert($Profile);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>