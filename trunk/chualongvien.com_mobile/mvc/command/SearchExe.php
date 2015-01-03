<?php
	namespace MVC\Command;	
	class SearchExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdBTypeCategory 	= $request->getProperty('IdBTypeCategory');	
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mCategoryBType 	= new \MVC\Mapper\CategoryBType();
			$mCategoryNews 		= new \MVC\Mapper\CategoryNews();
			$mCategoryVideo 	= new \MVC\Mapper\CategoryVideo();
			$mConfig 			= new \MVC\Mapper\Config();
												
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			$CategoryBTypeAll 	= $mCategoryBType->findAll();
																																										
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoryBTypeAll", 	$CategoryBTypeAll);									
			$request->setObject("CategoryNewsAll", 		$CategoryNewsAll);
														
			return self::statuses('CMD_DEFAULT');
		}
	}
?>