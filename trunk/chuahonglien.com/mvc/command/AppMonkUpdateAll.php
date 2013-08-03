<?php
	namespace MVC\Command;	
	class AppMonkUpdateAll extends Command{
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
			$MonkAll = $mMonk->findAll();
			while($MonkAll->valid()){
				$Monk = $MonkAll->current();
				$Monk->reKey();
				$mMonk->update($Monk);
				
				$VMAll =  $Monk->getVMs();
				while ($VMAll->valid()){
					$Video = $VMAll->current()->getVideo();
					$Video->reKey();
					$mVideo->update($Video);
					$VMAll->next();
				}
				
				$MonkAll->next();
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
						
			return self::statuses('CMD_OK');
		}
	}
?>