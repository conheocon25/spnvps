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
			$Title = mb_strtoupper($Paid->getTimePrint(),'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("SỔ VÀNG CÔNG ĐỨC", "/app/sponsor"),
				array(mb_strtoupper($Sponsor->getName(), 'UTF8'), $Sponsor->getURLPaid())
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Sponsor', $Sponsor);
			$request->setObject('Paid', $Paid);			
			$request->setProperty("Title", $Title );
			$request->setObject('Navigation', $Navigation);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>