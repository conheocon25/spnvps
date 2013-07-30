<?php
	namespace MVC\Command;	
	class AppCategoryTaskInsLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Title = "Quản lý / chuyên mục lịch làm việc / thêm mới";	
			$Title = "QUẢN LÝ";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'Home');
		}
	}
?>
