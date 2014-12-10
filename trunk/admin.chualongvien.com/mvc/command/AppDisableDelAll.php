<?php
	namespace MVC\Command;	
	class AppDisableDelAll extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
												
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVideoDisable 	= new \MVC\Mapper\VideoDisable();
			$mVideo 		= new \MVC\Mapper\Video();
			$mVideoLibrary 	= new \MVC\Mapper\VideoLibrary();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$VDAll = $mVideoDisable->findAll();
			
			while ($VDAll->valid()){
				$VD = $VDAll->current();
				
				$mVideo->delete(array($VD->getIdVideo()));
				$mVideoLibrary->deleteByVideo(array($VD->getIdVideo()));	
				$mVideoDisable->delete(array($VD->getId()));
									
				$VDAll->next();
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
