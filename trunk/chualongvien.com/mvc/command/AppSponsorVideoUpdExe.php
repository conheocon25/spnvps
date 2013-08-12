<?php
	namespace MVC\Command;	
	class AppSponsorVideoUpdExe extends Command {
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
			$IdVideo = $request->getProperty('IdVideo');
			$Name = $request->getProperty('Name');
			$URL = $request->getProperty('URL');
			$Note = $request->getProperty('Note');
			$Count = $request->getProperty('Count');
			$Date = $request->getProperty('Date');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVideo = new \MVC\Mapper\Video();
			$mVS = new \MVC\Mapper\VideoSponsor();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name))
				return self::statuses('CMD_OK');
				
			$VS = $mVS->find($IdVideo);						
			$Video = $VS->getVideo();
						
			$Video->setName($Name);
			$Video->setNote($Note);
			$Video->setURL($URL);
			$Video->setCount($Count);
			$Video->setTime($Date);
			$Video->reKey();
			
			$URLNew = $Video->parseURLYoutube();
			if ($URLNew != "")
				$Video->setURL($URLNew);
				
			$mVideo->update($Video);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>