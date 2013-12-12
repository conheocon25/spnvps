<?php
	namespace MVC\Command;	
	class Gate extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
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
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "CHÀO MỪNG ĐẾN VỚI WEBSITE CHÙA LONG VIỄN";
			$H = date('H');
			
			if ($H>=3 && $H<=13){
				$Id = 1;
			}else if ($H>13 && $H<=17){
				$Id = 2;
			}else{
				$Id = 3;
			}
			$Image = '/data/images/bg/gate'.$Id.'.jpg';
			$Style = "background:url(".$Image.") no-repeat center center fixed";			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);			
			$request->setProperty("Style", $Style);
			return self::statuses('CMD_DEFAULT');
		}
	}
?>