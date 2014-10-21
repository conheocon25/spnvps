<?php
	namespace MVC\Command;	
	class PagodaContact extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Key = $request->getProperty('Key');
						
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
			//echo $ProvinceAll->count();
			$Pagoda 		= $mPagoda->findByKey($Key);
						
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