<?php
	namespace MVC\Command;	
	class AppBType extends Command{
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
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryBTypeAll 	= $mCategoryBType->findAll();
							
			$Title = "THƯ VIỆN";
			$Navigation = array(

			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			
						
			$request->setObject('Navigation', $Navigation);			
			$request->setProperty("ActiveAdmin", 'Video');
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>