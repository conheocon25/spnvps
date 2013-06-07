<?php
	namespace MVC\Command;	
	class LibraryVideoPlay extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdVideo = $request->getProperty('IdVideo');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Monks = $mMonk->findAll();
			$Pagodas = $mPagoda->findAll();
			$VM = $mVM->find($IdVideo);
			$Video = $VM->getVideo();
			
			$MonkSelected = $VM->getMonk();
			$CategorySelected = $VM->getCategory();
			
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
						
			$Video->setCount( $Video->getCount()+1 );
			$mVideo->update($Video);
			
			$PanelAds = $mPanelAds->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Monks", $Monks);
			$request->setObject("VM", $VM);
			$request->setObject("Video", $Video);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject("MonkSelected", $MonkSelected);
			$request->setObject("CategorySelected", $CategorySelected);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>