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
			$Time = $request->getProperty('Time');
			$Note = $request->getProperty('Note');
			$Count = $request->getProperty('Count');
			
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
			$Video->setTime($Time);
			$Video->setNote($Note);
			$Video->setURL($URL);
			$Video->setCount($Count);
			
			$mVideo->update($Video);			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>