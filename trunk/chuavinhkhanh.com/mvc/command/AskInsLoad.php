<?php
	namespace MVC\Command;	
	use MVC\Library\Captcha;	
	class AskInsLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$MsgCaptcha = $request->getProperty('MsgCaptcha');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mEvent = new \MVC\Mapper\Event();
			$mAsk = new \MVC\Mapper\Ask();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mDhammapadaDetail = new \MVC\Mapper\DhammapadaDetail();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			$mPanelAds = new \MVC\Mapper\PanelAds();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------													
			$mCaptcha = new Captcha();
			$mCaptcha->createImage();
			$Session->setCurrentCaptcha($mCaptcha->getSecurityCode());
			
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$PagodaAll = $mPagoda->findAll();
			
			$Category = $mCategoryAsk->find($IdCategory);
			if (!isset($Category)){
				$Category = $CategoryAskAll->current();
			}
						
			$AskAll = $mAsk->findBy3(null);
			$Title = "Gửi câu hỏi/trả lời";
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$SponsorAll = $mSponsor->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("Category", $Category);
			$request->setObject("Event", $Event);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setProperty("ActiveItem", 'Ask');
			$request->setProperty("Title", $Title);
			$request->setProperty("MsgCaptcha", $MsgCaptcha);
			
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('AskAll', $AskAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>