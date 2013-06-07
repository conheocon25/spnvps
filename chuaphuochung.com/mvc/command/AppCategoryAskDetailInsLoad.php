<?php
	namespace MVC\Command;	
	class AppCategoryAskDetailInsLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCategory = $request->getProperty('IdCategory');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mAsk = new \MVC\Mapper\Ask();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			$Category = $mCategoryAsk->find($IdCategory);
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$Title = "Quản lý / Chuyên mục Hỏi Đáp / ".$Category->getName()."/ Thêm mới";
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Category', $Category);
			$request->setObject('CategoriesBType', $CategoryBType);
			$request->setObject('PanelAdsAll', $PanelAdsAll);
			$request->setProperty('Title', $Title);
			$request->setProperty("ActiveItem", 'Home');
		}
	}
?>
