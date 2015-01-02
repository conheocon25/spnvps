<?php
	namespace MVC\Command;	
	class LibraryVideoYouTube extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KCategory 	= $request->getProperty('KCategory');
			$KYouTube 	= $request->getProperty('KYouTube');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mVideo		= new \MVC\Mapper\Video();
			$mCategory	= new \MVC\Mapper\CategoryVideo();					
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Category 	= $mCategory->findByKey($KCategory);
			$Video 		= $mVideo->findByKey($KYouTube);
			$Video->setCount( $Video->getCount() + 1);
			$mVideo->update($Video);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty("VideoType"	, '');
			$request->setObject("Category"		, $Category);
			$request->setObject("Video"			, $Video);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>