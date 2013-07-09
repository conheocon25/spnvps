<?php
	namespace MVC\Command;	
	class AppSponsorPaid extends Command{
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Sponsor = $mSponsor->find($IdSponsor);
			$SponsorAll = $mSponsor->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject('Sponsor', $Sponsor);
			$request->setObject('SponsorAll', $SponsorAll);
			
			$request->setProperty("Title", 'QUẢN LÝ / ỦNG HỘ / '.$Sponsor->getName()."/ KHOẢN CHI");
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>