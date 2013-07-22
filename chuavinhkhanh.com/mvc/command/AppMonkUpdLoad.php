<?php
	namespace MVC\Command;	
	class AppMonkUpdLoad extends Command{
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
			$mCategoryNewsAll = new \MVC\Mapper\CategoryNews();
			$mCategoryAskAll = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Monk = $mMonk->find($IdMonk);
			$Title = "Quản lý / giảng sư / ".$Monk->getName()." / Cập nhật";
			$CategoryNewsAll = $mCategoryNewsAll->findAll();
			$CategoryAskAll = $mCategoryAskAll->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Monk', $Monk);
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject('CategoryBTypeAll', $CategoryBTypeAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('SponsorAll', $SponsorAll);
			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');
		}
	}
?>
