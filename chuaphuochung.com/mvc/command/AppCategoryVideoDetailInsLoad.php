<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailInsLoad extends Command{
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
			$mMonk = new \MVC\Mapper\Monk();
			$mVideoMonk = new \MVC\Mapper\VideoMonk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$PagodaAll = $mPagoda->findAll();
			$Category = $mCategoryVideo->find($IdCategory);
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$Monks = $mMonk->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$Title = "Quản lý / chuyên mục video / ".$Category->getName()." / Thêm mới";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Category', $Category);
			$request->setObject('Monks', $Monks);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			$request->setObject('CategoryBTypeAll', $CategoryBType);
			$request->setObject('PanelAdsAll', $PanelAdsAll);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', "Home");
		}
	}
?>
