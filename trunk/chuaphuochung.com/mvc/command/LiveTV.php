<?php
	namespace MVC\Command;	
	class LiveTV extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			include("mvc/base/mapper/MapperDefault.php");
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------								
			$Videos = $mVideo->findAll();
			$Video = $Videos->current();			
			$AlbumAll = $mAlbum->findAll();			
			$CategoryAll = $mCategoryNews->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Videos", $Videos);
			$request->setObject("Video", $Video);			
			$request->setObject("AlbumAll", $AlbumAll);
			$request->setObject("CategoryAll", $CategoryAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("Event", $Event);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setProperty("ActiveItem", 'Contact');
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>