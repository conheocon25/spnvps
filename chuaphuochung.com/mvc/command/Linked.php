<?php
	namespace MVC\Command;	
	class Linked extends Command {
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
			$CategoryAll = $mCategoryNews->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$PagodaAll = $mPagoda->findAll();
			$Linkeds = $mLinked->findAll();
			
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
			$request->setObject("Event", $Event);
			$request->setObject("CategoryAll", $CategoryAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('Linkeds', $Linkeds);
			$request->setObject("Course", $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("CLNextAll", $CLNextAll);
			$request->setProperty("ActiveItem", 'Linked');
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>