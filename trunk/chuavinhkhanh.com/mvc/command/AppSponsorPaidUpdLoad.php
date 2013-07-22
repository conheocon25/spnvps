<?php
	namespace MVC\Command;	
	class AppSponsorPaidUpdLoad extends Command{
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
			$mSP = new \MVC\Mapper\SponsorPaid();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Sponsor = $mSponsor->find($IdSponsor);
			$Paid = $mSP->find($IdPaid);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Sponsor', $Sponsor);
			$request->setObject('Paid', $Paid);			
			$request->setProperty("Title", 'QUẢN LÝ / ỦNG HỘ / '.$Sponsor->getName()." / ".$Paid->getTimePrint()." / CẬP NHẬT" );
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>