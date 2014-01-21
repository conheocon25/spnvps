<?php
	namespace MVC\Command;	
	class AppBTypeCategory extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdBType = $request->getProperty('IdBType');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryBTypeAll 	= $mCategoryBType->findAll();
			$Category 			= $mCategoryBType->find($IdBType);			
			$Title 				= $Category->getName();
			$Navigation = array(
				array("Quản Lý"		, "/app"),
				array("Video"		, "/app/btype")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll"	, $CategoryBTypeAll);
			$request->setObject("Category"			, $Category);
									
			$request->setObject('Navigation', $Navigation);			
			$request->setProperty("ActiveAdmin", 'Video');
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>