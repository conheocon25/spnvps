<?php
	namespace MVC\Command;	
	class AppProvince extends Command{
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
			$mProvince = new \MVC\Mapper\Province();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$ProvinceAll 	= $mProvince->findAll();			
			$Title 			= mb_strtoupper("TỈNH THÀNH", 'UTF8');
			
			$Navigation = array();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("ProvinceAll"	, $ProvinceAll);
												
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("ActiveAdmin", 'Pagoda');
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>