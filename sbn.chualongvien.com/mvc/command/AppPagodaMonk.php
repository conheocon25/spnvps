<?php
	namespace MVC\Command;	
	class AppPagodaMonk extends Command{
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
			$IdDistrict = $request->getProperty('IdDistrict');
			$IdPagoda 	= $request->getProperty('IdPagoda');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mProvince 	= new \MVC\Mapper\Province();
			$mDistrict 	= new \MVC\Mapper\District();
			$mPagoda 	= new \MVC\Mapper\Pagoda();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Province 	= $mProvince->find($IdProvince);
			$District 	= $mDistrict->find($IdDistrict);
			$Pagoda 	= $mPagoda->find($IdPagoda);
			$Title 		= "NHÂN SỰ " . mb_strtoupper($Pagoda->getName(), 'UTF8');
			
			$Navigation = array(
				array( "TỈNH THÀNH", "/app/province"),
				array( mb_strtoupper($Province->getName(), 'UTF8'), $Province->getURLSettingDistrict()),
				array( mb_strtoupper($District->getName(), 'UTF8'), $District->getURLSettingPagoda())
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Pagoda"	, $Pagoda);
												
			$request->setObject('Navigation', $Navigation);						
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>