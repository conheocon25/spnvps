<?php
	namespace MVC\Command;	
	class AppCategoryAskUpdLoad extends Command {
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
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPagoda = new \MVC\Mapper\Pagoda();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			
			$Category = $mCategoryAsk->find($IdCategory);
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
						
			$Title = $Category->getName()." CẬP NHẬT";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("CHUYÊN MỤC HỎI ĐÁP", "/app/category/ask")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			
			$request->setObject('Category', $Category);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty('Title', $Title);
			$request->setProperty("ActiveItem", 'Home');
		}
	}
?>