<?php
	namespace MVC\Command;	
	class AppCategoryVideoDelLoad extends Command {
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
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			
			$Category = $mCategoryVideo->find($IdCategory);
			$Pagodas = $mPagoda->findAll();
			$Sponsors = $mSponsor->findAll();
			
			$Title = "Quản lý / Chuyên mục Video / ".$Category->getName()." / Xóa";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('CategoriesBType', $CategoriesBType);
			$request->setObject('CategoriesNews', $CategoriesNews);
			$request->setObject('CategoriesAsk', $CategoriesAsk);
			
			$request->setObject('Category', $Category);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Sponsors', $Sponsors);
			
			$request->setProperty('ActiveItem', 'Home');
			$request->setProperty('Title', $Title);
		}
	}
?>
