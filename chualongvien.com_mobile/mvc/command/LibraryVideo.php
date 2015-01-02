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
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoryBType", 	$CategoryBType);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);			
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("Category", 		$Category);
			$request->setObject("VBAll", 			$VBAll);
			$request->setObject("YTAll", 			$YTAll);
									
			if($KBType == "lich-su-phat-giao") {				
				$request->setProperty("URLSearch", 		'/lich-su-phat-giao/tim-kiem/exe');
			} else if ($KBType == "thu-vien-phat-phap") {				
				$request->setProperty("URLSearch", 		'/thu-vien-phat-phap/tim-kiem/exe');
			}else if ($KBType == "phim-truyen-phat-giao"){				
				$request->setProperty("URLSearch", 		'/phim-truyen-phat-giao/tim-kiem/exe');
			}else if ($KBType == "giang-su-thuyet-phap"){				
				$request->setProperty("URLSearch", 		'/giang-su-thuyet-phap/tim-kiem/exe');
			}else if ($KBType == "kenh-tong-hop"){				
				$request->setProperty("URLSearch", 		'/kenh-tong-hop/tim-kiem/exe');
			}else{				
				$request->setProperty("URLSearch", 		'/nhac-phat-giao/tim-kiem/exe');
			}
			$request->setProperty("VideoType", 'thu-vien-phat-phap');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>