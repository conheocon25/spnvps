<?php
	namespace MVC\Command;	
	class AppProfileNewsInsLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Category = $mCategoryNews->find($IdCategory);
			
			$Title = "THÊM MỚI PROFILE";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("TIN TỨC", "/app/category/news"),
				array(mb_strtoupper($Category->getName(), 'UTF8'), $Category->getURLView())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Category', $Category);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'Home');
									
		}
	}
?>
