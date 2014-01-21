<?php
	namespace MVC\Command;	
	class AppNewsInsLoad extends Command {
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
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();									
			$Category = $mCategoryNews->find($IdCategory);
						
			$Title = "Thêm Mới";
			$Navigation = array(
				array("Quản Lý", "/app"),
				array("Tin Tức", "/app/category/news"),
				array($Category->getName(), $Category->getURLView())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title', $Title);
			$request->setObject( 'Navigation', $Navigation );
			
			$request->setObject( 'CategoryBTypeAll', $CategoryBTypeAll );
			$request->setObject( 'CategoryNewsAll', $CategoryNewsAll );			
			$request->setObject( 'Category', $Category );
			
			$request->setProperty("ActiveItem", 'Home');
		}
	}
?>
