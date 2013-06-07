<?php
	namespace MVC\Command;	
	class AppPagodaVideoInsLoad extends Command{
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
						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Pagoda = $mPagoda->find($IdPagoda);			
			$Title = "Quản lý / chùa / ".$Pagoda->getName()." / Thêm mới Video";
			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAllAll = $mPanelAds->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Pagoda', $Pagoda);			
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
			$request->setObject("CategoryBTypeAll", $CategoryBType);
			$request->setObject("PanelAdsAll", $PanelAdsAllAll);
		}
	}
?>
