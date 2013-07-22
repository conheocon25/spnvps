<?php
	namespace MVC\Command;	
	class AppCategoryAskDetailUpdExe extends Command {
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
			$IdAsk = $request->getProperty('IdAsk');
			$Question = $request->getProperty('Question');
			$Time = $request->getProperty('Time');
			$Author1 = $request->getProperty('Author1');
			$Answer = $request->getProperty('Answer');
			$Author2 = $request->getProperty('Author2');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mAsk = new \MVC\Mapper\Ask();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Ask = $mAsk->find($IdAsk);
			$Ask->setQuestion($Question);
			$Ask->setAuthor1($Author1);
			$Ask->setAnswer($Answer);
			$Ask->setAuthor2($Author2);
			$Ask->setTime($Time);
						
			$mAsk->update($Ask);
																	
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');			
		}
	}
?>