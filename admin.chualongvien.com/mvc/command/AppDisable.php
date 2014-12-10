<?php
	namespace MVC\Command;	
	class AppDisable extends Command{
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
			$mVideoDisable = new \MVC\Mapper\VideoDisable();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$VideoDisableAll 	= $mVideoDisable->findAll();
			$Title 				= mb_strtoupper("VIDEO BỊ HƯ LINK", 'UTF8');
			
			$Navigation = array();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("VideoDisableAll"	, 	$VideoDisableAll);
												
			$request->setObject('Navigation', 			$Navigation);			
			$request->setProperty("ActiveAdmin", 		'Disable');
			$request->setProperty("Title", 				$Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>