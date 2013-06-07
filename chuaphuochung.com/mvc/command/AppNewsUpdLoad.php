<?php
	namespace MVC\Command;	
	class AppNewsUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			//$IdCategory = $Session->getCurrentCategoryNews();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdNews = $request->getProperty('IdNews');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mNews = new \MVC\Mapper\News();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$News = $mNews->find($IdNews);
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$Title = "Quản lý / chuyên mục tin tức / ".$News->getCategory()->getName()." / cập nhật tin";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject( 'CategoriesNews', $CategoriesNews );
			$request->setObject( 'CategoriesAsk', $CategoriesAsk );
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject( 'News', $News );
			$request->setObject('CategoriesBType', $CategoryBType);
			$request->setObject('PanelAdsAll', $PanelAdsAll);
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("Title", $Title);
		}
	}
?>
