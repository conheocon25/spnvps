<?php
	namespace MVC\Command;	
	class Pagoda extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$PagodaKey = $request->getProperty('PagodaKey');
						
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
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																			
			$CategoryBTypeAll = $mCategoryBType->findByPart1();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryDocumentAll= $mCategoryDocument->findAll();
			
			$ProvinceAll 	= $mProvince->findAll();
			if (!isset($PagodaKey)){
				$PagodaKey = "chua-long-vien-25";
			}
			$Pagoda 		= $mPagoda->findByKey($PagodaKey);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);									
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);						
			$request->setProperty("ActiveItem", 'Contact');
			
			$request->setObject("ProvinceAll", $ProvinceAll);
			$request->setObject("ProvinceCurrent", 58);
			$request->setProperty("Pagoda", $Pagoda);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>