<?php
	namespace MVC\Command;	
	class AppCategoryNewsUpdExe extends Command {
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
			$mCategoryNews = new \MVC\Mapper\CategoryNews();								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Str = new \MVC\Library\String($Name);
			$Category = $mCategoryNews->find($IdCategory);
			$Category->setName($Name);
			$Category->setOrder($Order);
			$Category->setKey($Str->converturl());
			
			$mCategoryNews->update($Category);
			
														
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');			
		}
	}
?>