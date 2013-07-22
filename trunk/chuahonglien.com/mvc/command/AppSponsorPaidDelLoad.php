<?php
	namespace MVC\Command;	
	class AppSponsorPaidDelLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdSponsor = $request->getProperty('IdSponsor');
			$IdPaid = $request->getProperty('IdPaid');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPaid = new \MVC\Mapper\SponsorPaid();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Sponsor = $mSponsor->find($IdSponsor);
			$Paid = $mPaid->find($IdPaid);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Paid', $Paid);						
			$request->setObject('Sponsor', $Sponsor);			
			$request->setProperty("Title", 'QUẢN LÝ / ỦNG HỘ / '.$Sponsor->getName()." / ".$Paid->getTimePrint()." / XÓA");
			
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>