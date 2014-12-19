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
			
			/*	$curl_handle=curl_init();
					curl_setopt($curl_handle, CURLOPT_URL,"http://admin.chualongvien.com/app/news/getall");
					curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 298);
					curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);				
					curl_setopt($curl_handle, CURLOPT_BINARYTRANSFER, true);
					curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);				
					curl_setopt($curl_handle, CURLOPT_USERAGENT,"admin.chualongvien.com");
					$data = curl_exec($curl_handle);
					curl_close($curl_handle);
			echo $data;					
			*/
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