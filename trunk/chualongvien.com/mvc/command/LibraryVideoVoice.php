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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVB	= new \MVC\Mapper\VoiceBook();
			$VB 	= $mVB->find(3);
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "CHÀO MỪNG ĐẾN VỚI WEBSITE CHÙA LONG VIỄN";
			$H = date('H');
			
			if ($H>=3 && $H<=10){
				$Id = 1;
			}else if ($H>10 && $H<=16){
				$Id = 2;
			}else if ($H>16 && $H<=18){
				$Id = 3;
			}else{
				$Id = 4;
			}
			$Image = '/data/images/bg/gate'.$Id.'.jpg';
			$Style = "background:url(".$Image.") no-repeat center center fixed";
			
			//print_r($VB->getMP3All());
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);			
			$request->setProperty("Style", $Style);
			$request->setObject("VB", $VB);
			return self::statuses('CMD_DEFAULT');
		}
	}
?>