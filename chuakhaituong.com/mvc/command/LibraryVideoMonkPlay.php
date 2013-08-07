<?php
	namespace MVC\Command;	
	class LibraryVideoMonkPlay extends Command {
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
			$KMonk = $request->getProperty('KMonk');
			$KVideo = $request->getProperty('KVideo');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryBType = $mCategoryBType->findByKey($KBType);
			$Video = $mVideo->findByKey($KVideo);
			$Monk = $mMonk->findByKey($KMonk);
			$Video->setCount( $Video->getCount()+1 );
			$mVideo->update($Video);
			
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();			
									
			$Monks = $mMonk->findAll();			
			$VMs = $mVM->findBy(array($Monk->getId()));
			$PagodaAll = $mPagoda->findAll();
									
			$SponsorAll = $mSponsor->findAll();
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
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);						
			$request->setObject("VMs", $VMs);
			
			$request->setObject("Popup", $Popup);
			$request->setObject("CategoryBType", $CategoryBType);
			$request->setObject("Video", $Video);
			$request->setObject("Monk", $Monk);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>