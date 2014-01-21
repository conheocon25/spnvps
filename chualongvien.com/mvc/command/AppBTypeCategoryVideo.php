<?php
	namespace MVC\Command;	
	class AppBTypeCategoryVideo extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdBType 	= $request->getProperty('IdBType');
			$IdCategory = $request->getProperty('IdCategory');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$BType 			= $mCategoryBType->find($IdBType);
			$CategoryAll 	= $BType->getCategoryAll();
			$Category		= $mCategoryVideo->find($IdCategory);
			
			$Title 			= $Category->getName();
			$Navigation = array(
				array("Quản Lý"		, "/app"),
				array("Video"		, "/app/btype"),
				array($BType->getName(), $BType->getURLSetting())
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryAll"	, $CategoryAll);
			$request->setObject("Category"		, $Category);
			$request->setObject("BType"			, $BType);
									
			$request->setObject('Navigation', $Navigation);			
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>