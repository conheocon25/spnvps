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
			$CategoryVideoAll 	= $mCategoryVideo->findAll();
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
			//print_r($Category);
			$request->setObject("Video", 			$Video);
			$request->setProperty("ActiveItem", 	'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>