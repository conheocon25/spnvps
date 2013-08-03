<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCategory = $request->getProperty('IdCategory');
			$IdVideoLibrary = $request->getProperty('IdVideoLibrary');
						
			$Name = $request->getProperty('Name');
			$URL = $request->getProperty('URL');
			$Note = $request->getProperty('Note');
			$Count = $request->getProperty('Count');
			$Date = $request->getProperty('Date');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVideo = new \MVC\Mapper\Video();
			$mVideoLibrary = new \MVC\Mapper\VideoLibrary();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name))
				return self::statuses('CMD_OK');
				
			$VL = $mVideoLibrary->find($IdVideoLibrary);			
			$Video = $VL->getVideo();						
			$Video->setName($Name);
			$Video->setNote($Note);
			$Video->setTime($Date);
			$Video->setURL($URL);
			$Video->reKey();
			
			$URLNew = $Video->parseURLYoutube();
			if ($URLNew != "")
				$Video->setURL($URLNew);
			
			$Video->setCount($Count);
			
			$mVideo->update($Video);			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>