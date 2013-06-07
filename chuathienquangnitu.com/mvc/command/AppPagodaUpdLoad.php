<?php
	namespace MVC\Command;	
	class AppPagodaUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdPagoda = $request->getProperty('IdPagoda');
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoriesNews = new \MVC\Mapper\CategoryNews();
			$mCategoriesAsk = new \MVC\Mapper\CategoryAsk();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Pagoda = $mPagoda->find($IdPagoda);
			$Title = "Quản lý / chùa / ".$Pagoda->getName()." / Cập nhật";
			$CategoriesNews = $mCategoriesNews->findAll();
			$CategoriesAsk = $mCategoriesAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Pagoda', $Pagoda);
			$request->setObject('CategoriesNews', $CategoriesNews);
			$request->setObject('CategoriesAsk', $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
		}
	}
?>
