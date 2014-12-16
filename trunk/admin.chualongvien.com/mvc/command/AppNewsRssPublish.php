<?php
	namespace MVC\Command;	
	class AppNewsRssPublish extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			
			$IdRss = $request->getProperty('IdRss');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews 	= new \MVC\Mapper\CategoryNews();
			$mRssLink 		= new \MVC\Mapper\RssLink();
			$mNewsRss 			= new \MVC\Mapper\NewsRss();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$dRssLink = $mRssLink->find($IdRss);
			
			
			
			
			$NewsRssAll = $mNewsRss->findAll();				
			
			$Title = mb_strtoupper("DUYỆT TIN TỨC TỪ RSS URL", 'UTF8');
			$Navigation = array(				
				array("TIN TỨC", "/app/news/rss")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("NewsRssAll", $NewsRssAll);
			$request->setObject("Navigation", $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveAdmin", 'NewsRss');
			return self::statuses('CMD_DEFAULT');
		}
	}
?>