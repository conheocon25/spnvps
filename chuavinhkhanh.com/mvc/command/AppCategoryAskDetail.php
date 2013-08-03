<?php
	namespace MVC\Command;	
	class AppCategoryAskDetail extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty("IdCategory");
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			include("mvc/base/mapper/MapperDefault.php");
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$Category = $mCategoryAsk->find($IdCategory);
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
									
			$Title = mb_strtoupper($Category->getName(), 'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("HỎI ĐÁP", "/app/category/ask")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$AskAll = $mAsk->findByPage(array($IdCategory, $Page, $Config->getValue()));
			$PN = new \MVC\Domain\PageNavigation($Category->getAsks()->count(), $Config->getValue(), $Category->getURLView());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);			
			$request->setObject("Category", $Category);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('SponsorAll', $SponsorAll);
			
			$request->setObject('Navigation', $Navigation);
			$request->setObject('AskAll', $AskAll);
			$request->setObject('PN', $PN);
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>