<?php
	namespace MVC\Command;	
	class AppPaidUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdPaid = $request->getProperty('IdPaid');
			$IdCategory = $request->getProperty('IdCategory');
			$Date = $request->getProperty('Date');			
			$Description = $request->getProperty('Description');
			$Value = $request->getProperty('Value');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mPaid = new \MVC\Mapper\Paid();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Paid = $mPaid->find($IdPaid);
			$Paid->setIdCategory($IdCategory);
			$Paid->setDate($Date);
			$Paid->setDescription($Description);
			$Paid->setValue($Value);
			$mPaid->update($Paid);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>