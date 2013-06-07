<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailUpdLoad extends Command{
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
			$IdVideoLibrary = $request->getProperty('IdVideoLibrary');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mVideoLibrary = new \MVC\Mapper\VideoLibrary();			
			include("mvc/base/mapper/MapperDefault.php");
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$VL = $mVideoLibrary->find($IdVideoLibrary);
			$SponsorAll = $mSponsor->findAll();
			$PagodaAll = $mPagoda->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$MonkAll = $mMonk->findAll();
			$Title = "Quản lý / chuyên mục video / ".$VL->getVideo()->getName()." / Cập nhật";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('VL', $VL);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			$request->setObject('CategoryBTypeAll', $CategoryBTypeAll);
			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', "Home");
		}
	}
?>
