<?php
	namespace MVC\Command;	
	class AppDistrict extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdProvince = $request->getProperty('IdProvince');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mProvince = new \MVC\Mapper\Province();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Province 	= $mProvince->find($IdProvince);
			$Title 		= mb_strtoupper($Province->getName(), 'UTF8');
			
			$Navigation = array(
				array("TỈNH THÀNH", "/app/province")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Province"	, $Province);
												
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("ActiveAdmin", 'Pagoda');
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>