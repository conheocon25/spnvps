<?php
	namespace MVC\Command;	
	class LibraryMonk extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KMonk 		= $request->getProperty("KMonk");
			$KVideoMonk = $request->getProperty("KVideoMonk");
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			$CategoryBTypeAll = $mCategoryBType->findByPart1();
			
			$MonkAll 			= $mMonk->findAll();
			$Monk 				= $mMonk->findByKey($KMonk);
			if (!isset($Monk)) $Monk = $MonkAll->current();
			$Video 				= $mVideo->findByKey($KVideoMonk);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryNewsAll", 	$CategoryNewsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("MonkAll", 			$MonkAll);
			$request->setObject("Monk", 			$Monk);
			$request->setObject("Video", 			$Video);
			$request->setProperty("ActiveItem", 	'LibraryMonk');			
			$request->setProperty("ImageFrame", 	'background:url("/data/images/logo/thu_vien.gif") no-repeat center center transparent;-webkit-background-size: cover !important;-moz-background-size: cover !important;-o-background-size: cover !important;background-size: cover !important;');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>