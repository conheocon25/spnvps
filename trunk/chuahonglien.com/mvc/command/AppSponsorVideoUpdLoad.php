<?php
	namespace MVC\Command;	
	class AppSponsorVideoUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdSponsor = $request->getProperty('IdSponsor');
			$IdVideo = $request->getProperty('IdVideo');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			
			$mMonk = new \MVC\Mapper\Monk();
			$mVS = new \MVC\Mapper\VideoSponsor();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
														
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			
			$Sponsor = $mSponsor->find($IdSponsor);
			$VS = $mVS->find($IdVideo);
			$Pagodas = $mPagoda->findAll();
			$Sponsors = $mSponsor->findAll();
			$Title = "Quản lý / SỔ VÀNG CÔNG ĐỨC / ".$Sponsor->getName()." / ".$VS->getVideo()->getName()." / Cập nhật";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('CategoriesBType', $CategoriesBType);
			$request->setObject('CategoriesAsk', $CategoriesAsk);
			$request->setObject('CategoriesNews', $CategoriesNews);
			$request->setObject('CategoriesVideo', $CategoriesVideo);
			
			$request->setObject('Sponsor', $Sponsor);
			$request->setObject('VS', $VS);
			$request->setObject('Pagodas', $Pagodas);			
			$request->setObject('Sponsors', $Sponsors);
			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', "Home");
		}
	}
?>
