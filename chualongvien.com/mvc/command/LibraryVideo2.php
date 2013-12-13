<?php
	namespace MVC\Command;	
	class LibraryVideo2 extends Command {
		function doExecute( \MVC\Controller\Request $request ){
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
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$CategoryBType		= $mCategoryBType->find(4);
					
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoryBTypeAll"	, $CategoryBTypeAll);
			$request->setObject("CategoryBType"		, $CategoryBType);
			$request->setObject("CategoryNewsAll"	, $CategoryNewsAll);
															
			$request->setProperty("ActiveItem", 'LibraryVideo2');			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>