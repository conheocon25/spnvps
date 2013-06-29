<?php
	namespace MVC\Command;	
	class Online extends Command {
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
			$Title = "WEB SITE CHÙA KHAI TƯỜNG";
						
			$VM24 = $mVM->findByUpdateTop(array(2));
			$VM8 = $mVM->findByTopLocal(array(2));
			$VL24 = $mVL->findByUpdateTop(array(2));
			
			$AlbumAll = $mAlbum->findAll();
			$Categories = $mCategoryNews->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryVideo = $mCategoryVideo->findAll()->current();
									
			$AskAll = $mAsk->findByTop(array());
			$PagodaAll = $mPagoda->findAll();
												
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();
			
			$SponsorAll = $mSponsor->findAll();
			$PanelNewsAll = $mPanelNewsAll->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			
			$request->setObject("VM8", $VM8);
			$request->setObject("VM24", $VM24);
			$request->setObject("VL24", $VL24);
			$request->setObject("AlbumAll", $AlbumAll);
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("Event", $Event);			
			$request->setObject("AskAll", $AskAll);			
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("Course", $Course);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setProperty("ActiveItem", 'Online');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>