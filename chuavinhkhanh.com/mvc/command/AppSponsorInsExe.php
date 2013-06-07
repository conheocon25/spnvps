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
			$Address = $request->getProperty('Address');
			$Time = $request->getProperty('Time');
			$Value = $request->getProperty('Value');
			$Unit = $request->getProperty('Unit');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$Sponsor = new \MVC\Domain\SponsorPerson(
				null,
				$Name,
				$Time,
				$Address,
				$Value,
				$Unit
			);
			$mSponsor->insert($Sponsor);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>