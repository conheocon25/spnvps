<?php
	namespace MVC\Command;	
	class SigninLoad extends Command {
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
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryAll = $mCategoryNews->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$Title = "ĐĂNG NHẬP HỆ THỐNG";
			$PagodaAll = $mPagoda->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryAll", $CategoryAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('CategoryBTypeAll', $CategoryBTypeAll);
			
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'Home');
		}
	}
?>