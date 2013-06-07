<?php
	namespace MVC\Command;	
	class AppCategoryVideoUpdLoad extends Command {
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
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Category = $mCategoryVideo->find($IdCategory);
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			
			$Title = "Quản lý / Chuyên mục Video / ".$Category->getName()." / Cập nhật";
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject('Category', $Category);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('CategoryBTypeAll', $CategoryBType);
			$request->setObject('PanelAdsAll', $PanelAdsAll);
			$request->setProperty('Title', $Title);
			$request->setProperty("ActiveItem", 'Home');
		}
	}
?>
