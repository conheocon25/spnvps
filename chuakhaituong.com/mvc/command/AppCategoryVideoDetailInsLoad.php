<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailInsLoad extends Command{
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			
			$mMonk = new \MVC\Mapper\Monk();
			$mVideoMonk = new \MVC\Mapper\VideoMonk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();			
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			$Category = $mCategoryVideo->find($IdCategory);
			$MonkAll = $mMonk->findAll();
			
			$Title = "Quản lý / chuyên mục video / ".$Category->getName()." / Thêm mới";
			$Title = "QUẢN LÝ";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('CategoryBTypeAll', $CategoryBTypeAll);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			
			$request->setObject('Category', $Category);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('SponsorAll', $SponsorAll);
			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', "Home");
		}
	}
?>
