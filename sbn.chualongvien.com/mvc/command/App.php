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
			$IsProvince = false;
			$IsDistrict = false;
			$IsPagoda 	= false;
			$Pagoda 	= null;
			$District 	= null;
			$Province 	= null;
			
			$IdProvince = $mUserProvince->check($Session->getCurrentIdUser());
			if (isset($IdProvince)){
				$Province = $mProvince->find($IdProvince);
				$IsProvince = true;
			}
					
			$IdDistrict = $mUserDistrict->check($Session->getCurrentIdUser());
			//echo $IdDistrict;
			
			if (isset($IdDistrict)){				
				$District = $mDistrict->find($IdDistrict);
				$IsDistrict = true;
				//print_r($District);
			}
			
			$IdPagoda = $mUserPagoda->check($Session->getCurrentIdUser());
			if (isset($IdPagoda)){
				$Pagoda = $mPagoda->find($IdPagoda);
				$IsPagoda = true;
			}
			
			$Title = "";
			$Navigation = array();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
									
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
			
			$request->setProperty("IsProvince"	, $IsProvince);
			$request->setProperty("IsDistrict"	, $IsDistrict);
			$request->setProperty("IsPagoda"	, $IsPagoda);
			
			$request->setObject("Province", $Province);
			$request->setObject("District", $District);
			$request->setObject("Pagoda", 	$Pagoda);
		}
	}
?>