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
			$Albums = $mAlbum->findAll();			
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();			
			
			if (!isset($IdAlbum)){
				$Album = $Albums->current();
			}else{
				$Album = $mAlbum->find($IdAlbum);
			}
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();

			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$DhammapadaAll = $mDhammapada->findAll();
			$CLsNext = $mClassLession->findByNext(null);
			
			$PanelAds = $mPanelAds->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Album", $Album);
			$request->setObject("Albums", $Albums);
			$request->setObject("Event", $Event);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject("Course", $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("DhammapadaAll", $DhammapadaAll);
			$request->setObject("CLsNext", $CLsNext);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setProperty("ActiveItem", 'LibraryAlbum');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>