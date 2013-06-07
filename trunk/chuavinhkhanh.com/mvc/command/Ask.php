<?php
	namespace MVC\Command;	
	class Ask extends Command {
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
			$IdAsk = $request->getProperty('IdAsk');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$Category = $mCategoryAsk->find($IdCategory);
			
			if (!isset($IdAsk)){
				$Asks = $mAsk->findBy2(array($IdCategory));
				$Ask = $Asks->current();
			}else{
				$Ask = $mAsk->find($IdAsk);
			}			
			$PagodaAll = $mPagoda->findAll();
			
			if (isset($Ask))
				$Asks = $mAsk->findBy1(array($IdCategory, $Ask->getId()));
			else
				$Asks = null;
				
			if(isset($Category)) {
				$Title = "Câu hỏi / ".$Category->getName();
			}
			else {
				$Title = "Câu hỏi";
			}
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();

			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLsNext = $mClassLession->findByNext(null);
			
			$AskAll = $mAsk->findAll();
			$SponsorAll = $mSponsor->findAll();
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();			
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'Ask');
			$request->setObject("Ask", $Ask);
			$request->setObject("Event", $Event);
			$request->setObject("Category", $Category);
			$request->setObject("Course", $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("CLsNext", $CLsNext);
			
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("AskAll", $AskAll);
			$request->setObject('PagodaAll', $PagodaAll);			
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
