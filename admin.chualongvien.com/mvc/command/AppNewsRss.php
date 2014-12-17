<?php
	namespace MVC\Command;	
	class AppNewsRss extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			//$Page = $request->getProperty('Page');
			//$IdCategory = $request->getProperty('IdCategory');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews 	= new \MVC\Mapper\CategoryNews();
			$mNewsRss 		= new \MVC\Mapper\NewsRss();
			
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$NewsRssAll = $mNewsRss->findAll();	
			$CategoryNewsAll = $mCategoryNews->findAll();						
			
			$Title = mb_strtoupper("THÊM TIN TỨC TỪ RSS URL", 'UTF8');
			$Navigation = array(				
				array("TIN TỨC", "/app/news/rss")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("NewsRssAll", $NewsRssAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("Navigation", $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveAdmin", 'NewsRss');
			return self::statuses('CMD_DEFAULT');
		}
	}
?>