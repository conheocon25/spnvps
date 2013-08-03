<?php
	namespace MVC\Command;	
	class AppNewsInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$IdNews = $request->getProperty('IdNews');			
			$IdCategory = $request->getProperty('IdCategory');
			$Author = $request->getProperty('Author');
			$Content = \stripslashes($request->getProperty('Content'));
			$Title = $request->getProperty('Title');
			$Type = $request->getProperty('Type');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mNews = new \MVC\Mapper\News();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Title))
				return self::statuses('CMD_OK');
			if ($Type=="on")
				$Type=1;
			else
				$Type=0;
				
			$News = new \MVC\Domain\News(
				null,
				$IdCategory,
				$Author,
				null,
				$Content,
				$Title,
				$Type,
				""
			);
			$News->reKey();
			$mNews->insert($News);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
