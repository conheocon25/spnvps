<?php
	namespace MVC\Command;	
	class LibraryDhammapada extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdAlbum = $request->getProperty('IdAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$AlbumAll = $mAlbum->findAll();			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();			
			
			if (!isset($IdAlbum)){
				$Album = $AlbumAll->current();
			}else{
				$Album = $mAlbum->find($IdAlbum);
			}
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();

			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$DhammapadaAll = $mDhammapada->findAll();
			$CLNextAll = $mClassLession->findByNext(null);
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			$PanelAdsAll = $mPanelAds->findAll();
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Album", $Album);
			$request->setObject("AlbumAll", $AlbumAll);
			$request->setObject("Event", $Event);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject("Course", $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("DhammapadaAll", $DhammapadaAll);
			$request->setObject("CLNextAll", $CLNextAll);
			
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setProperty("ActiveItem", 'LibraryAlbum');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>