<?php
	namespace MVC\Command;	
	class AppSponsorPaidInsExe extends Command{
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
			$Time = $request->getProperty('Time');
			$Value = $request->getProperty('Value');
			$Unit = $request->getProperty('Unit');
			$Note = $request->getProperty('Note');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mPaid = new \MVC\Mapper\SponsorPaid();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$Paid = new \MVC\Domain\SponsorPaid(
				null,
				$IdSponsor,				
				$Time,				
				$Value,
				$Unit,
				$Note
			);
			$mPaid->insert($Paid);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>