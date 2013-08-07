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
			$KBType = $request->getProperty('KBType');
			$KCategory = $request->getProperty('KCategory');
			$KVideoLibrary = $request->getProperty('KVideoLibrary');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$CategoryBType = $mCategoryBType->findByKey($KBType);
			$Category = $mCategoryVideo->findByKey($KCategory);			
			$Video = $mVideo->findByKey($KVideoLibrary);
			
			$VLs = $mVL->findBy(array($Category->getId()));
									
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();			
			
			$Monks = $mMonk->findAll();								
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
						
			//$CategorySelected = $mCategoryVideo->find($IdCategory);
			
			$Video->setCount( $Video->getCount()+1 );
			$mVideo->update($Video);
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$Popup = $mPopup->findByName("phat-am");
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("Monks", $Monks);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			
			$request->setObject("Popup", $Popup);
			$request->setObject("Category", $Category);
			$request->setObject("CategoryBType", $CategoryBType);
			
			$request->setObject("Video", $Video);
			$request->setObject("VLs", $VLs);
			
						
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>