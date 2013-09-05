<?php
	namespace MVC\Command;	
	class AppPagodaVideoInsExe extends Command{
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
			$URL = $request->getProperty('URL');
			$Note = $request->getProperty('Note');
			$Count = $request->getProperty('Count');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mVideoPagoda = new \MVC\Mapper\VideoPagoda();
			$mVideo = new \MVC\Mapper\Video();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name))
				return self::statuses('CMD_OK');
			$Video = new \MVC\Domain\Video(
				null,
				$Name,
				null,
				$URL,
				$Note,
				$Count,
				""
			);
			$Video->reKey();
			$URLNew = $Video->parseURLYoutube();
			if ($URLNew != "")
				$Video->setURL($URLNew);
			$mVideo->insert($Video);
			
			$VP = new \MVC\Domain\VideoPagoda(
				null,
				$Video->getId(),
				$IdPagoda
			);
			$mVideoPagoda->insert($VP);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>