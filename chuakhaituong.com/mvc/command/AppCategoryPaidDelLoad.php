<?php
	namespace MVC\Command;	
	class AppCategoryPaidDelLoad extends Command {
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------									
			$mCategoryPaid = new \MVC\Mapper\CategoryPaid();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																
			$Category = $mCategoryPaid->find($IdCategory);
						
			$Title = "Quản lý / khoản chi / ".$Category->getName()." / xóa";	
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Category', $Category);
			
			$request->setProperty('ActiveItem', 'Home');
			$request->setProperty('Title', $Title);
		}
	}
?>