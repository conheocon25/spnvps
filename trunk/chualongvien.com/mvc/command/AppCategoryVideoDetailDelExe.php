<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailDelExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdVideoLibrary = $request->getProperty('IdVideoLibrary');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVideo = new \MVC\Mapper\Video();
			$mVideoLibrary = new \MVC\Mapper\VideoLibrary();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$VL = $mVideoLibrary->find($IdVideoLibrary);
			$IdVideo = $VL->getIdVideo();
			$mVideo->delete(array($IdVideo));
			$mVideoLibrary->delete(array($IdVideoLibrary));
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("IdCategory", $VL->getCategory()->getId());
			$request->setProperty("IdBType", $VL->getCategory()->getBTypeO()->getId());
			
			return self::statuses('CMD_OK');
		}
	}
?>