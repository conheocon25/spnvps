<?php
	namespace MVC\Command;	
	class AppSponsorInsExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------		
			$Name = $request->getProperty('Name');			
			$TimeStart = $request->getProperty('TimeStart');
			$TimeEnd = $request->getProperty('TimeEnd');
			$Content = $request->getProperty('Content');
			$Type = $request->getProperty('Type');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$Sponsor = new \MVC\Domain\Sponsor(
				null,
				$Name,
				$TimeStart,
				$TimeEnd,
				$Content,
				$Type,
				""
			);
			$Sponsor->reKey();
			$mSponsor->insert($Sponsor);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>