<?php
	namespace MVC\Command;	
	class AppNewsUpdateAll extends Command{
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
			$CategoryAll = $mCategoryNews->findAll();
			while($CategoryAll->valid()){
				$Category = $CategoryAll->current();
				$Category->reKey();
				$mCategoryNews->update($Category);
				$CategoryAll->next();
			}
			
			$NewsAll = $mNews->findAll();
			while($NewsAll->valid()){
				$News = $NewsAll->current();
				$News->reKey();
				$mNews->update($News);
				$NewsAll->next();			
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
						
			return self::statuses('CMD_OK');
		}
	}
?>