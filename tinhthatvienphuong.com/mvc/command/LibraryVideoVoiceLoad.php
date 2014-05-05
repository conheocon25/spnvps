<?php
	namespace MVC\Command;	
	class LibraryVideoVoiceLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KBVoice = $request->getProperty('KBVoice');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVB	= new \MVC\Mapper\VoiceBook();
			$VB 	= $mVB->findByKey($KBVoice);
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Data 	= array();
			$S 		= new \MVC\Library\String( $VB->getMP3Raw() );
			$Arr 	= $S->explode(' ');
			
			$Index = 1;
			foreach ($Arr as $A){
				$Data[] = array(
					'title' 	=> "Phần " . $Index++,
					'mp3'		=> "https://docs.google.com/uc?authuser=0&id=".$A."&export=download"
				);
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			echo json_encode($Data);
		}
	}
?>