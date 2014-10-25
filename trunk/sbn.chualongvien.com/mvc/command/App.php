<?php
	namespace MVC\Command;	
	class App extends Command {
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
			$mProvince 		= new \MVC\Mapper\Province();
			$mDistrict 		= new \MVC\Mapper\District();
			$mPagoda 		= new \MVC\Mapper\Pagoda();
			
			$mUserProvince 	= new \MVC\Mapper\UserProvince();
			$mUserDistrict 	= new \MVC\Mapper\UserDistrict();
			$mUserPagoda 	= new \MVC\Mapper\UserPagoda();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$IdProvince = $mUserProvince->check($Session->getCurrentIdUser());
			if (isset($IdProvince)){
				$Province = $mProvince->find($IdProvince);
			}
			
			$IdDistrict = $mUserDistrict->check($Session->getCurrentIdUser());
			if (isset($IdDistrict)){
				$District = $mDistrict->find($IdDistrict);
			}
			
			$IdPagoda = $mUserPagoda->check($Session->getCurrentIdUser());
			if (isset($IdPagoda)){
				$Pagoda = $mPagoda->find($IdPagoda);
			}
			
			$Title = "";
			$Navigation = array();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
									
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveAdmin", "");
			
			$request->setObject("Province", $Province);
			$request->setObject("District", $District);
			$request->setObject("Pagoda", 	$Pagoda);
		}
	}
?>