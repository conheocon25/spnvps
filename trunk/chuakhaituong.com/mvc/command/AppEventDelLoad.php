<?php
	namespace MVC\Command;	
	class AppEventDelLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdEvent = $request->getProperty('IdEvent');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			
			$mEvent = new \MVC\Mapper\Event();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			
			$Event = $mEvent->find($IdEvent);
			$Title = "XÓA SỰ KIỆN";			
			$Pagodas = $mPagoda->findAll();
			$Sponsors = $mSponsor->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('CategoriesBType', $CategoriesBType);
			$request->setObject('CategoriesAsk', $CategoriesAsk);
			$request->setObject('CategoriesNews', $CategoriesNews);
			
			$request->setObject('Event', $Event);
			$request->setObject('Pagodas', $Pagodas);			
			$request->setObject('Sponsors', $Sponsors);
			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
		}
	}
?>