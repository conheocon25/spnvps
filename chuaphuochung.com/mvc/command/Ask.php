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
				$AskAll = $mAsk->findBy2(array($IdCategory));
				$Ask = $AskAll->current();
			}else{
				$Ask = $mAsk->find($IdAsk);
			}			
			$PagodaAll = $mPagoda->findAll();
			
			if (isset($Ask))
				$AskAll = $mAsk->findBy1(array($IdCategory, $Ask->getId()));
			else
				$AskAll = null;
				
			if(isset($Category)) {
				$Title = "Câu hỏi / ".$Category->getName();
			}
			else {
				$Title = "Câu hỏi";
			}
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();

			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLNextAll = $mClassLession->findByNext(null);
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("Category", $Category);
			$request->setObject("Ask", $Ask);
			$request->setObject("AskAll", $AskAll);
			$request->setObject("Event", $Event);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject("Course", $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("CLNextAll", $CLNextAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setProperty("ActiveItem", 'Ask');
			$request->setProperty("Title", $Title);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
