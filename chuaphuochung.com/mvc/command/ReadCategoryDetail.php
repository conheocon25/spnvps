<?php
	namespace MVC\Command;	
	class ReadCategoryDetail extends Command {
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
			$IdNews = $request->getProperty('IdNews');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$AlbumAll = $mAlbum->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			
			$Category = $mCategoryNews->find($IdCategory);
			$CategoryNewsAll = $mCategoryNews->findAll();
			
			$Category = $mCategoryNews->find($IdCategory);
			$News = $mNews->find($IdNews);
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();

			if(isset($News)) {
				$Title = mb_strtoupper( $News->getTitle(), 'UTF8');
			}
			else {
				$Title = "";
			}

			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLNextAll = $mClassLession->findByNext(null);
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
						
			$request->setObject("Category", $Category);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("Event", $Event);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("Course", $Course);
			$request->setObject("News", $News);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("CLNextAll", $CLNextAll);
			$request->setProperty("ActiveItem", 'ReadCategory');
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
