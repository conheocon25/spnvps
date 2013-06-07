<?php
	namespace MVC\Command;	
	class AppPagodaVideoDelLoad extends Command{
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
			$IdVideoPagoda = $request->getProperty('IdVideoPagoda');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mVideoPagoda = new \MVC\Mapper\VideoPagoda();
			$mVideo = new \MVC\Mapper\Video();
			
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Pagoda = $mPagoda->find($IdPagoda);
			$Pagodas = $mPagoda->findAll();
			$VP = $mVideoPagoda->find($IdVideoPagoda);
			$Title = "Quản lý / chùa / ".$Pagoda->getName()." / ".$VP->getVideo()->getName()." / Xóa";
			
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Pagoda', $Pagoda);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('VP', $VP);
			$request->setObject('CategoriesNews', $CategoriesNews);
			$request->setObject('CategoriesAsk', $CategoriesAsk);
			$request->setObject("CategoriesBType", $CategoryBType);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
		}
	}
?>
