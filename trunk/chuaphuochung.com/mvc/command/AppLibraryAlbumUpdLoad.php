<?php
	namespace MVC\Command;	
	class AppLibraryAlbumUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdAlbum = $request->getProperty('IdAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mAlbum = new \MVC\Mapper\Album();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Album = $mAlbum->find($IdAlbum);			
			$Title = "CẬP NHẬT ALBUM";
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAllAll = $mPanelAds->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Album', $Album);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
			$request->setObject("CategoryBTypeAll", $CategoryBType);
			$request->setObject("PanelAdsAll", $PanelAdsAllAll);
		}
	}
?>
