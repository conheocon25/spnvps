<?php
	namespace MVC\Command;	
	class AppPagoda extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdDistrict = $request->getProperty('IdDistrict');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mDistrict = new \MVC\Mapper\District();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$District 	= $mDistrict->find($IdDistrict);
			$Title 		= mb_strtoupper($District->getName(), 'UTF8');
			
			$Navigation = array(
				array( "TỈNH THÀNH", "/app/province"),
				array( mb_strtoupper($District->getProvince()->getName(), 'UTF8'), $District->getProvince()->getURLSettingDistrict())
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("District"	, $District);
												
			$request->setObject('Navigation', $Navigation);						
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>