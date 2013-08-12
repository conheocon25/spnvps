<?php
	namespace MVC\Command;	
	class AppCategoryAskUpdateAll extends Command{
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
			require_once("mvc/base/mapper/MapperDefault.php");			
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryAll = $mCategoryAsk->findAll();
			while($CategoryAll->valid()){
				$Category = $CategoryAll->current();
				$Category->reKey();
				$mCategoryAsk->update($Category);
				/*
				$VMAll =  $Monk->getVMs();
				while ($VMAll->valid()){
					$Video = $VMAll->current()->getVideo();
					$Video->reKey();
					$mVideo->update($Video);
					$VMAll->next();
				}
				*/
				$CategoryAll->next();
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
						
			return self::statuses('CMD_OK');
		}
	}
?>