<?php
	namespace MVC\Command;	
	class Home extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "WEBSITE CHÙA LONG VIỄN";
									
			$VL24 				= $mVL->findByUpdateTop(array(2));
			$LocalVideoAll 		= $mVL->findByTopLocal(array(2));
			
			$AlbumAll 			= $mAlbum->findAll();
			$Categories 		= $mCategoryNews->findAll();
			$CategoryNewsAll 	= $mCategoryNews->findAll();			
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$CategoryVideo 		= $mCategoryVideo->findAll()->current();						
			$MonkAll 			= $mMonk->findVIP(null);
			
			$EventAll 			= $mEvent->findAll();
			$Course 			= $mCourse->findByNear(null)->current();
															
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			
			$request->setObject("LocalVideoAll", $LocalVideoAll);
			$request->setObject("VL24", $VL24);
									
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);			
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("AlbumAll", $AlbumAll);						
			$request->setObject("MonkAll", $MonkAll);

			$request->setProperty("ActiveItem", 'Home');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>