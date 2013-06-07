<?php
	namespace MVC\Command;	
	class AppPagodaDelLoad extends Command {
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
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Pagoda = $mPagoda->find($IdPagoda);			
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$Title = "Quản lý hệ thống > Các chùa > ".$Pagoda->getName()." > Xóa";
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Pagoda', $Pagoda);								
			$request->setObject('CategoriesNews', $CategoriesNews);	
			$request->setObject('CategoriesAsk', $CategoriesAsk);	
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
			$request->setObject("CategoriesBType", $CategoryBType);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
		}
	}
?>
