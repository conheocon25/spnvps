<?php
	namespace MVC\Command;	
	class Contact extends Command {
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
			$mCategoryBType 	= new \MVC\Mapper\CategoryBType();
			$mCategoryNews 		= new \MVC\Mapper\CategoryNews();
			$mCategoryVideo 	= new \MVC\Mapper\CategoryVideo();
			$mCategoryDocument 	= new \MVC\Mapper\CategoryDocument();
			
			$mAlbum 			= new \MVC\Mapper\Album();	
			$mNews 				= new \MVC\Mapper\News();
			$CategoryDocumentAll= $mCategoryDocument->findAll();			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																			
			$CategoryBTypeAll = $mCategoryBType->findByPart1();
			$CategoryNewsAll = $mCategoryNews->findAll();																		
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);									
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);						
			$request->setProperty("ActiveItem", 'Contact');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>