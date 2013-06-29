<?php
	namespace MVC\Command;	
	class SponsorDetailVideo extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdSponsor = $request->getProperty('IdSponsor');
			$IdVideoSponsor = $request->getProperty('IdVideoSponsor');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Sponsor = $mSponsor->find($IdSponsor);
			$VideoSponsor = $mVideoSponsor->find($IdVideoSponsor);
			
			$SponsorAll = $mSponsor->findAll();
			if (!isset($Sponsor)) $Sponsor = $SponsorAll->current();
			
			$Categories = $mCategoryNews->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$PagodaAll = $mPagoda->findAll();
			
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();

			$PanelNewsAll = $mPanelNewsAll->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Event", $Event);
			$request->setObject("VideoSponsor", $VideoSponsor);
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject("Course", $Course);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("Sponsor", $Sponsor);
			
			$request->setProperty("ActiveItem", 'Sponsor');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>