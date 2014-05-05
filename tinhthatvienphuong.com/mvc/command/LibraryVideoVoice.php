<?php
	namespace MVC\Command;	
	class LibraryVideoVoice extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KCategory 	= $request->getProperty('KCategory');
			$KBVoice 	= $request->getProperty('KBVoice');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVB	= new \MVC\Mapper\VoiceBook();
			$VB 	= $mVB->findByKey($KBVoice);
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
																		
			$Style = "background:url(/data/images/bg/gate1.jpg) no-repeat center center fixed";
			
			$VB->setCount( $VB->getCount() + 1);
			$mVB->update($VB);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty("Style", $Style);
			$request->setObject("VB", $VB);
			return self::statuses('CMD_DEFAULT');
		}
	}
?>