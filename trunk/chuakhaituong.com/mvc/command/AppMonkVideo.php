<?php
	namespace MVC\Command;	
	class AppMonkVideo extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdMonk = $request->getProperty('IdMonk');
			$IdBType = $request->getProperty('IdBType');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			
			$mMonk = new \MVC\Mapper\Monk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			
			$Monk = $mMonk->find( $IdMonk );			
			$Monks = $mMonk->findAll( );
			$Pagodas = $mPagoda->findAll();
			$Sponsors = $mSponsor->findAll();
			
			$Title = "Quản trị / Giảng sư / ".$Monk->getName();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
						
			$request->setObject("Monk", $Monk);			
			$request->setObject("Monks", $Monks);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Sponsors', $Sponsors);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", "Home");
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>