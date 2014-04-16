<?php
	namespace MVC\Command;	
	class AppNewsBookmarkExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdNews 		= $request->getProperty('IdNews');
			$IdBookmark 	= $request->getProperty('IdBookmark');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mConfig = new \MVC\Mapper\Config();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			if ($IdBookmark==1){
				$Config = $mConfig->findByName("BOOKMARK_1");
				if (!isset($Config)){
					$Config = new \MVC\Domain\Config(
						null,
						"BOOKMARK_1",
						$IdNews	
					);
					$mConfig->insert($Config);
				}else{
					$Config->serValue($IdNews);
					$mConfig->update($Config);
				}
			}else{			
				$Config = $mConfig->findByName("BOOKMARK_2");
				if (!isset($Config)){
					$Config = new \MVC\Domain\Config(
						null,
						"BOOKMARK_2",
						$IdNews	
					);
					$mConfig->insert($Config);
				}else{
					$Config->serValue($IdNews);
					$mConfig->update($Config);
				}
			}
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>
