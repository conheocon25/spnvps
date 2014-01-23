<?php
	namespace MVC\Command;	
	class ReadCategoryDetail extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Key1 = $request->getProperty('Key1');
			$Key2 = $request->getProperty('Key2');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$News 				= $mNews->findByKey($Key2);
			
			$CategoryNewsAll 	= $mCategoryNews->findAll();						
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$MonkAll 			= $mMonk->findVIP(null);
			
			$Title = mb_strtoupper( $News->getTitle(), 'UTF8');
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);			
			$request->setObject("Category", $News->getCategory());			
			$request->setProperty("ActiveItem", 'ReadCategory');
									
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("News", $News);						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("MonkAll", $MonkAll);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
