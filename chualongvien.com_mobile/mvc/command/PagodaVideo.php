<?php
	namespace MVC\Command;	
	class PagodaVideo extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$PagodaKey 	= $request->getProperty('PagodaKey');
			$VideoKey 	= $request->getProperty('VideoKey');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryBType 	= new \MVC\Mapper\CategoryBType();
			$mCategoryNews 		= new \MVC\Mapper\CategoryNews();
			$mCategoryVideo 	= new \MVC\Mapper\CategoryVideo();
			$mCategoryDocument 	= new \MVC\Mapper\CategoryDocument();						
			$mNews 				= new \MVC\Mapper\News();
			$mPagoda 			= new \MVC\Mapper\Pagoda();
			$mProvince 			= new \MVC\Mapper\Province();
			$mPVideo 			= new \MVC\Mapper\PVideo();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																			
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			$CategoryDocumentAll= $mCategoryDocument->findAll();
			
			$Pagoda				= $mPagoda->findByKey($PagodaKey);
			$Video				= $mPVideo->findByKey($VideoKey);
			
			$ProvinceAll 	= $mProvince->findAll();
			if (!isset($PagodaKey)){$PagodaKey = "chua-long-vien-25";}
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("CategoryBTypeAll", 	$CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", 		$CategoryNewsAll);									
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);
			
			$request->setObject("ActiveItem", 			"Contact");
			$request->setObject("ProvinceCurrent", 		58);
			$request->setObject("ProvinceAll", 			$ProvinceAll);
			$request->setObject("Pagoda", 				$Pagoda);
			$request->setObject("Video", 				$Video);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>