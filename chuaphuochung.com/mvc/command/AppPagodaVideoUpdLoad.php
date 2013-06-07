<?php
	namespace MVC\Command;	
	class AppPagodaVideoUpdLoad extends Command{
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
			$PagodaAll = $mPagoda->findAll();
			$VP = $mVideoPagoda->find($IdVideoPagoda);
			$Title = "Quản lý / chùa / ".$Pagoda->getName()." / ".$VP->getVideo()->getName()." / Cập nhật";
			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Pagoda', $Pagoda);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('VP', $VP);
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject("CategoryBTypeAll", $CategoryBType);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
		}
	}
?>
