<?php
	namespace MVC\Command;	
	class LibraryDhammapadaDetail extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdDhammapada = $request->getProperty('IdDhammapada');
			
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
			$Dhammapada = $mDhammapada->find($IdDhammapada);
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
			$request->setObject("Dhammapada", $Dhammapada);
			$request->setObject("CLNextAll", $CLNextAll);			
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setProperty("ActiveItem", 'Library');
			$request->setProperty("Title", $Dhammapada->getNameVi());
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>