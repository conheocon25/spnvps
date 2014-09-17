<?php
	namespace MVC\Command;	
	class LibraryVideo extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KBType 		= $request->getProperty("KBType");
			$KCategory 		= $request->getProperty("KCategory");
			$Term 			= $request->getProperty("Term");
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryBType 	= new \MVC\Mapper\CategoryBType();
			$mCategoryNews 		= new \MVC\Mapper\CategoryNews();
			$mCategoryVideo 	= new \MVC\Mapper\CategoryVideo();
			$mCategoryDocument 	= new \MVC\Mapper\CategoryDocument();
				
			$mAlbum 			= new \MVC\Mapper\Album();				
			$mNews 				= new \MVC\Mapper\News();
			
			$mVB 				= new \MVC\Mapper\VoiceBook();
			$mVL 				= new \MVC\Mapper\VideoLibrary();
												
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryBType 		= $mCategoryBType->findByKey($KBType);
			$IdBType 			= $CategoryBType->getId();
																					
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$CategoryVideoAll 	= $mCategoryVideo->findByBType(array($IdBType));
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			
			$CVAll = $CategoryBType->getCategoryAll();
			$SumVB = 0;
			$SumYT = 0;
			while ($CVAll->valid()){
				$CV = $CVAll->current();
				$SumVB += $CV->getVoiceBookAll()->count();
				$SumYT += $CV->getVLAll()->count();
				$CVAll->next();
			}
			
			$Category 			= $mCategoryVideo->findByKey($KCategory);
			if (!isset($Category)) $Category = $CategoryVideoAll->current();
			
			if (isset($Term)){
				$StrTerm = new \MVC\Library\String($Term);				
				$VBAll = $mVB->findByKey1(array($IdBType, 	$StrTerm->converturl()));
				$YTAll = $mVL->findByKey(array($IdBType, 	$StrTerm->converturl()));				
			}else{
				$VBAll = $Category->getVoiceBookAll();
				$YTAll = $Category->getVLAll();
			}
			$CategoryDocumentAll= $mCategoryDocument->findAll();									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoryBType", 	$CategoryBType);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", 	$CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("Category", 		$Category);
			$request->setObject("VBAll", 			$VBAll);
			$request->setObject("YTAll", 			$YTAll);
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);
			
			$request->setProperty("SumVB", 			$SumVB);
			$request->setProperty("SumYT", 			$SumYT);
						
			if($KBType == "lich-su-phat-giao") {
				$request->setProperty("ActiveItem", 	'LibraryVideo1');
				$request->setProperty("URLSearch", 		'/lich-su-phat-giao/tim-kiem/exe');
			} else if ($KBType == "thu-vien-phat-phap") {
				$request->setProperty("ActiveItem", 	'LibraryVideo2');				
				$request->setProperty("URLSearch", 		'/thu-vien-phat-phap/tim-kiem/exe');
			}else if ($KBType == "phim-truyen-phat-giao"){
				$request->setProperty("ActiveItem", 	'LibraryVideo3');
				$request->setProperty("URLSearch", 		'/phim-truyen-phat-giao/tim-kiem/exe');
			}else if ($KBType == "giang-su-thuyet-phap"){
				$request->setProperty("ActiveItem", 	'LibraryVideo5');
				$request->setProperty("URLSearch", 		'/giang-su-thuyet-phap/tim-kiem/exe');
			}else if ($KBType == "kenh-tong-hop"){
				$request->setProperty("ActiveItem", 	'LibraryVideo6');
				$request->setProperty("URLSearch", 		'/kenh-tong-hop/tim-kiem/exe');
			}else{
				$request->setProperty("ActiveItem", 	'LibraryVideo4');
				$request->setProperty("URLSearch", 		'/nhac-phat-giao/tim-kiem/exe');
			}
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>