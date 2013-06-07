<?php
	namespace MVC\Command;	
	class LibraryVideoCategoryPlay extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$IdVideoLibrary = $request->getProperty('IdVideoLibrary');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Monks = $mMonk->findAll();
			$VL = $mVL->find($IdVideoLibrary);
			$VLs = $mVL->findBy(array($IdCategory));
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$Category = $mCategoryVideo->find($IdCategory);
			$Pagodas = $mPagoda->findAll();
						
			$CategorySelected = $mCategoryVideo->find($IdCategory);
			$Video = $VL->getVideo();
			$Video->setCount( $Video->getCount()+1 );
			$mVideo->update($Video);
			
			$PanelAds = $mPanelAds->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("VL", $VL);
			$request->setObject("VLs", $VLs);
			$request->setObject("Monks", $Monks);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("CategorySelected", $CategorySelected);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>