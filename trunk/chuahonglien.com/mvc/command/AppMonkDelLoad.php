<?php
	namespace MVC\Command;	
	class AppMonkDelLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdMonk = $request->getProperty('IdMonk');		
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mMonk = new \MVC\Mapper\Monk();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mPagoda = new \MVC\Mapper\Pagoda();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Monk = $mMonk->find($IdMonk);			
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$Pagodas = $mPagoda->findAll();
			
			$Title = "Quản lý hệ thống > Các giảng sư > ".$Monk->getName()." > Xóa";			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Monk', $Monk);								
			$request->setObject('CategoriesNews', $CategoriesNews);	
			$request->setObject('CategoriesAsk', $CategoriesAsk);	
			$request->setObject('Pagodas', $Pagodas);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');

		}
	}
?>
