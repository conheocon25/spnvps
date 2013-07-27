<?php
	namespace MVC\Command;	
	class AppVideoUpdateAll extends Command{
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
			include("mvc/base/mapper/MapperDefault.php");			
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryAll = $mCategoryVideo->findAll();
			while($CategoryAll->valid()){
				$Category = $CategoryAll->current();
				$Category->reKey();				
				$mCategoryVideo->update($Category);
				
				$VLAll =  $Category->getVLs();
				while ($VLAll->valid()){
					$Video = $VLAll->current()->getVideo();
					$Video->reKey();
					$mVideo->update($Video);					
					$VLAll->next();
				}
								
				$CategoryAll->next();
			}					
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
						
			return self::statuses('CMD_OK');
		}
	}
?>