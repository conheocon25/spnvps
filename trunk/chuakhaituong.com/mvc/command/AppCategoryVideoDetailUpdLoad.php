<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCategory = $request->getProperty('IdCategory');
			$IdVideoLibrary = $request->getProperty('IdVideoLibrary');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			
			$mMonk = new \MVC\Mapper\Monk();
			$mVideoLibrary = new \MVC\Mapper\VideoLibrary();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
											
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
						
			$PagodaAll = $mPagoda->findAll();
			$MonkAll = $mMonk->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			$VL = $mVideoLibrary->find($IdVideoLibrary);
			$Title = $VL->getVideo()->getName()." CẬP NHẬT";			
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("CHUYÊN MỤC VIDEO", "/app/category/video"),
				array($VL->getCategory()->getName(), $VL->getCategory()->getURLView())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject('CategoryBTypeAll', $CategoryBTypeAll);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			
			$request->setObject('VL', $VL);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('SponsorAll', $SponsorAll);
			
			$request->setObject('Navigation', $Navigation);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', "Home");
		}
	}
?>
