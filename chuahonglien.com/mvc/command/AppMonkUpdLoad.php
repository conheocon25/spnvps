<?php
	namespace MVC\Command;	
	class AppMonkUpdLoad extends Command{
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
			$mCategoriesNews = new \MVC\Mapper\CategoryNews();
			$mCategoriesAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Monk = $mMonk->find($IdMonk);
			$Title = "Quản lý / giảng sư / ".$Monk->getName()." / Cập nhật";
			$CategoriesNews = $mCategoriesNews->findAll();
			$CategoriesAsk = $mCategoriesAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			
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
