<?php
	namespace MVC\Command;	
	class AppMonkVideoUpdExe extends Command {
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
			$IdVideoMonk = $request->getProperty('IdVideoMonk');
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
			if (!isset($Name))
				return self::statuses('CMD_OK');
				
			$VM = $mVideoMonk->find($IdVideoMonk);			
			$mVideoMonk->update($VM);
			
			$Video = $VM->getVideo();
						
			$Video->setName($Name);
			$Video->setNote($Note);
			$Video->setURL($URL);
			$Video->setCount($Count);
			
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