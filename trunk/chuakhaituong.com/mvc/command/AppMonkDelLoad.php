<?php
	namespace MVC\Command;	
	class AppMonkDelLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdMonk = $request->getProperty('IdMonk');		
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mMonk = new \MVC\Mapper\Monk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Monk = $mMonk->find($IdMonk);			
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$Pagodas = $mPagoda->findAll();
			$Sponsors = $mSponsor->findAll();
			
			$Title = "Quản trị / Giảng sư / ".$Monk->getName()." / Xóa";
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Monk', $Monk);
			$request->setObject('CategoriesBType', $CategoriesBType);
			$request->setObject('CategoriesNews', $CategoriesNews);	
			$request->setObject('CategoriesAsk', $CategoriesAsk);	
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Sponsors', $Sponsors);
			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');

		}
	}
?>