<?php
	namespace MVC\Command;	
	class AppMonkVideoInsExe extends Command {
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
			$Name = $request->getProperty('Name');
			$URL = $request->getProperty('URL');
			$Note = $request->getProperty('Note');
			$Count = $request->getProperty('Count');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVideo = new \MVC\Mapper\Video();
			$mVideoMonk = new \MVC\Mapper\VideoMonk();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name)||$Name=="")
				return self::statuses('CMD_OK');
			$Video = new \MVC\Domain\Video(
				null,
				$Name,
				null,
				$URL,
				$Note,
				$Count
			);
			$mVideo->insert($Video);
			$VM = new \MVC\Domain\VideoMonk(
				null,
				$Video->getId(),
				$IdMonk				
			);
			$mVideoMonk->insert($VM);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>
