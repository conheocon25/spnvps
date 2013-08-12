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
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Sponsor = $mSponsor->find($IdSponsor);
			$SponsorAll = $mSponsor->findAll();
			$Title = mb_strtoupper($Sponsor->getName(),'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("SỔ VÀNG CÔNG ĐỨC", "/app/sponsor")
			);
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$PaidAll = $mSponsorPaid->findByPage(array($IdSponsor, $Page, $Config->getValue()));
			$PN = new \MVC\Domain\PageNavigation($Sponsor->getPaidAll()->count(), $Config->getValue(), $Sponsor->getURLPaid());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject('Sponsor', $Sponsor);
			$request->setObject('SponsorAll', $SponsorAll);
			
			$request->setObject('PaidAll', $PaidAll);
			$request->setObject('PN', $PN);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>