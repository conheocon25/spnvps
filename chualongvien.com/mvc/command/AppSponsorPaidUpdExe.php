<?php
	namespace MVC\Command;	
	class AppSponsorPaidUpdExe extends Command{
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
			$Paid = $mPaid->find($IdPaid);
			$Paid->setTime($Time);
			$Paid->setValue($Value);
			$Paid->setUnit($Unit);
			$Paid->setNote($Note);
			$mPaid->update($Paid);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>