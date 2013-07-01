<?php
	namespace MVC\Command;	
	class AskInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$Question = $request->getProperty('Question');
			$Author1 = $request->getProperty('Author1');
			$CodeCaptcha = $request->getProperty('CodeCaptcha');
			$Answer = "";
			$Author2 = "";
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mAsk = new \MVC\Mapper\Ask();
			
			$OldCodeCaptcha = $Session->getCurrentCaptcha();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			if ($OldCodeCaptcha == $CodeCaptcha)
			{				
				if (!isset($Question))				
					return self::statuses('CMD_OK');
					
				$Ask = new \MVC\Domain\Ask(
					null,
					$IdCategory,
					$Question,
					$Author1,
					null,
					$Answer,
					$Author2
				);
				$mAsk->insert($Ask);
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>