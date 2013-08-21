<?php
	namespace MVC\Command;	
	class AppSponsorUpdExe extends Command{
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
			$Name = $request->getProperty('Name');
			$Picture = $request->getProperty('Picture');
			$TimeStart = $request->getProperty('TimeStart');
			$TimeEnd = $request->getProperty('TimeEnd');
			$Content = \stripslashes($request->getProperty('Content'));
			$Type = $request->getProperty('Type');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$Sponsor = $mSponsor->find($IdSponsor);
			$Sponsor->setName($Name);
			$Sponsor->setPicture($Picture);
			$Sponsor->setTimeStart($TimeStart);
			$Sponsor->setTimeEnd($TimeEnd);
			$Sponsor->setContent($Content);
			$Sponsor->setType($Type);
			$Sponsor->reKey();
			$mSponsor->update($Sponsor);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>