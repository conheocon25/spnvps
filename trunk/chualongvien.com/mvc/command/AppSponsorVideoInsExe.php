<?php
	namespace MVC\Command;	
	class AppSponsorVideoInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$IdSponsor = $request->getProperty('IdSponsor');
			$Name = $request->getProperty('Name');
			$URL = $request->getProperty('URL');
			$Note = $request->getProperty('Note');
			$Count = $request->getProperty('Count');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVideo = new \MVC\Mapper\Video();
			$mVS = new \MVC\Mapper\VideoSponsor();
					
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
			$Video->setURL( $Video->parseURLYoutube() );
			
			$mVideo->insert($Video);
			$VS = new \MVC\Domain\VideoSponsor(
				null,
				$Video->getId(),
				$IdSponsor
			);
			$mVS->insert($VS);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>
