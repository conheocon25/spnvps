<?php
	namespace MVC\Command;	
	class LibraryVideoLoadCategory extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory 	= $request->getProperty("IdCategory");
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																	
			$Category		= $mCategoryVideo->find($IdCategory);
			
			$VLAll			= $Category->getVLs();
			while($VLAll->valid()){
				$VL = $VLAll->current();
				$Video = $VL->getVideo();
				$Video->setCount($Video->getCount() + 1);
				$mVideo->update($Video);				
				$VLAll->next();
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------															
			$request->setObject("Category"		, $Category);
																					
			return self::statuses('CMD_DEFAULT');
		}
	}
?>