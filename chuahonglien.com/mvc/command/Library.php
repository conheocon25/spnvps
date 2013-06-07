<?php
	namespace MVC\Command;	
	class Library extends Command {
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
			$mVideo = new \MVC\Mapper\Video();
			$mPagoda = new \MVC\Mapper\Pagoda();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "THƯ VIỆN";
			$Videos = $mVideo->findAll();
			$Pagodas = $mPagoda->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			$request->setObject("Videos", $Videos);
			$request->setObject('Pagodas', $Pagodas);
			$request->setProperty("ActiveItem", 'Library');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>