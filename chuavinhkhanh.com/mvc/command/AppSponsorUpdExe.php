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
			$Time = $request->getProperty('Time');
			$Address = $request->getProperty('Address');
			$Value = $request->getProperty('Value');
			$Unit = $request->getProperty('Unit');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$Sponsor = $mSponsor->find($IdSponsor);
			$Sponsor->setName($Name);
			$Sponsor->setAddress($Address);
			$Sponsor->setTime($Time);
			$Sponsor->setValue($Value);
			$Sponsor->setUnit($Unit);
			$mSponsor->update($Sponsor);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>