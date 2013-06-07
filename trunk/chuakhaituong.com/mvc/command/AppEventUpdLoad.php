<?php
	namespace MVC\Command;	
	class AppEventUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
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
			$Pagodas = $mPagoda->findAll();
			$Event = $mEvent->find($IdEvent);
			$Sponsors = $mSponsor->findAll();
			$Title = "Quản lý / Sự kiện / ".$Event->getTitle()." /";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject( 'CategoriesBType', $CategoriesBType );
			$request->setObject( 'CategoriesNews', $CategoriesNews );
			$request->setObject( 'CategoriesAsk', $CategoriesAsk );
			$request->setObject( 'Event', $Event );
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Sponsors', $Sponsors);
			
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("Title", $Title);
		}
	}
?>