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
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Pagoda = $mPagoda->find($IdPagoda);
			$Title = "Quản lý / Chuyên Đề / ".$Pagoda->getName()." / Cập nhật";
			$CategoriesNews = $mCategoriesNews->findAll();
			$CategoriesAsk = $mCategoriesAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Pagoda', $Pagoda);
			$request->setObject('CategoriesNews', $CategoriesNews);
			$request->setObject('CategoriesAsk', $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject("CategoriesBType", $CategoryBType);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
		}
	}
?>
