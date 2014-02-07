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
			
			$Title 			= mb_strtoupper($Category->getName(), 'UTF8').' - YOUTUBE';
			$Navigation = array(
				array("QUẢN LÝ"									, "/app"),
				array("THƯ VIỆN"								, "/app/btype"),
				array(mb_strtoupper($BType->getName(), 'UTF8')	, $BType->getURLSetting())
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