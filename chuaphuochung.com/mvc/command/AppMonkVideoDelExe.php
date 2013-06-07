<?php
	namespace MVC\Command;	
	class AppMonkVideoDelExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdVideoMonk = $request->getProperty('IdVideoMonk');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVideo = new \MVC\Mapper\Video();
			$mVideoMonk = new \MVC\Mapper\VideoMonk();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$VM = $mVideoMonk->find($IdVideoMonk);
			$IdVideo = $VM->getIdVideo();
			$mVideo->delete(array($IdVideo));
			$mVideoMonk->delete(array($IdVideoMonk));
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>