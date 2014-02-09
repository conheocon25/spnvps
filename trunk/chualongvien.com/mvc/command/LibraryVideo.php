<?php
	namespace MVC\Command;	
	class LibraryVideo extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KBType 		= $request->getProperty("KBType");
			$KCategory 		= $request->getProperty("KCategory");
			$KVideoLibrary 	= $request->getProperty("KVideoLibrary");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryBType 		= $mCategoryBType->findByKey($KBType);
			$IdBType 			= $CategoryBType->getId();
															
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$CategoryVideoAll 	= $mCategoryVideo->findByBType(array($IdBType));
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			
			$Category 			= $mCategoryVideo->findByKey($KCategory);
			if (!isset($Category)) $Category = $CategoryVideoAll->current();			
			$Video 				= $mVideo->findByKey($KVideoLibrary);
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoryBType", 	$CategoryBType);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", 	$CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("Category", 		$Category);
			
			$request->setObject("Video", 			$Video);
			if($KBType == "lich-su-phat-giao") {
				$request->setProperty("ActiveItem", 	'LibraryVideo1');
				$request->setProperty("ImageFrame", 	'background:url("/data/images/logo/lich_su.gif") no-repeat center center transparent;-webkit-background-size: cover !important;-moz-background-size: cover !important;-o-background-size: cover !important;background-size: cover !important;');
			} else {
				$request->setProperty("ActiveItem", 	'LibraryVideo2');
				$request->setProperty("ImageFrame", 	'background:url("/data/images/logo/thu_vien.gif") no-repeat center center transparent;-webkit-background-size: cover !important;-moz-background-size: cover !important;-o-background-size: cover !important;background-size: cover !important;');
			}
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>