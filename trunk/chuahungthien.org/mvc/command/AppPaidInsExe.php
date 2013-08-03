<?php
	namespace MVC\Command;	
	class AppPaidInsExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------		
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
			$Paid = new \MVC\Domain\Paid(
				null,
				$IdCategory,
				$Date,								
				$Description,
				$Value
			);
			$mPaid->insert($Paid);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>