<?php
	namespace MVC\Command;	
	class AppCategoryAskUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$Name = $request->getProperty('Name');
			$Order = $request->getProperty('Order');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Category = $mCategoryAsk->find($IdCategory);			
			$Category->setName($Name);
			$Category->setOrder($Order);
			
			$mCategoryAsk->update($Category);
			
														
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');			
		}
	}
?>