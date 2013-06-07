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
			$Albums = $mAlbum->findAll();			
			$Categories = $mCategoryNews->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			
			$PanelAds = $mPanelAds->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Videos", $Videos);
			$request->setObject("Video", $Video);			
			$request->setObject("Albums", $Albums);
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("Event", $Event);
			$request->setObject('Pagodas', $Pagodas);
			$request->setProperty("ActiveItem", 'Contact');
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoriesBType", $CategoriesBType);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>