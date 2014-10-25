<?php
	namespace MVC\Command;	
	class AppPagodaPostUpdLoad extends Command{
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
			$IdPost 	= $request->getProperty('IdPost');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mProvince 	= new \MVC\Mapper\Province();
			$mDistrict 	= new \MVC\Mapper\District();
			$mPagoda 	= new \MVC\Mapper\Pagoda();
			$mPPost 	= new \MVC\Mapper\PPost();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Province 	= $mProvince->find($IdProvince);
			$District 	= $mDistrict->find($IdDistrict);
			$Pagoda 	= $mPagoda->find($IdPagoda);
			$Post 		= $mPPost->find($IdPost);
			
			$Title 		= "CẬP NHẬT BÀI VIẾT";
			
			$Navigation = array(
				array( "TỈNH THÀNH", "/app/province", false),
				array( mb_strtoupper($Province->getName(), 'UTF8'), $Province->getURLSettingDistrict(), false),
				array( mb_strtoupper($District->getName(), 'UTF8'), $District->getURLSettingPagoda(), false),
				array( mb_strtoupper($Pagoda->getName(), 'UTF8'), 	$Pagoda->getURLSetting(), true)				
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Pagoda"	, $Pagoda);
			$request->setObject("Post"		, $Post);
												
			$request->setObject('Navigation', $Navigation);						
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>