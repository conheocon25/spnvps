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
			$IdVideoMonk = $request->getProperty('IdVideoMonk');
			
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
			if (!isset($Name))
				return self::statuses('CMD_OK');
				
			$VM = $mVideoMonk->find($IdVideoMonk);
			$VM->setIdMonk($IdMonk);
			$mVideoMonk->update($VM);
			
			$Video = $VM->getVideo();
						
			$Video->setName($Name);
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