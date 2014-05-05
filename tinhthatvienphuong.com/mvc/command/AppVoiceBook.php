<?php
	namespace MVC\Command;	
	class AppVoiceBook extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdBType 		= $request->getProperty('IdBType');
			$IdCategory 	= $request->getProperty('IdCategory');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryBType = new \MVC\Mapper\CategoryBType(); 
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo(); 
			$mAnime	= new \MVC\Mapper\Anime();
			
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryBType 	= $mCategoryBType->find($IdBType);
			$CategoryVideo 	= $mCategoryVideo->find($IdCategory);
			$CategoryAll 	= $mCategoryVideo->findByBType(array($IdBType));
			$AnimeAll		= $mAnime->findAll();
									
			$Title 			= mb_strtoupper($CategoryVideo->getName(), 'UTF8').' - SÁCH NÓI';
			$Navigation = array(
				array("QUẢN LÝ"									, "/app"),
				array("THƯ VIỆN"								, "/app/btype"),
				array(mb_strtoupper($CategoryBType->getName(), 'UTF8')	, $CategoryBType->getURLSetting())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryBType"	, $CategoryBType);
			$request->setObject("CategoryVideo"	, $CategoryVideo);
			$request->setObject("CategoryAll"	, $CategoryAll);
			$request->setObject("AnimeAll"		, $AnimeAll);
			
			$request->setObject('Navigation'	, $Navigation);
			$request->setProperty("ActiveAdmin"	, 'Video');
			$request->setProperty("Title"		, $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>