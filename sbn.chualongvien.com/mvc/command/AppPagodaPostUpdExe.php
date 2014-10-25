<?php
	namespace MVC\Command;	
	class AppPagodaPostUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$IdPost 	= $request->getProperty('IdPost');
			$IdPagoda 	= $request->getProperty('IdPagoda');
			$Author 	= $request->getProperty('Author');
			$Date 		= $request->getProperty('Date');
			$Content 	= \stripslashes($request->getProperty('Content'));
			$Title 		= $request->getProperty('Title');
			$Type 		= $request->getProperty('Type');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mPPost = new \MVC\Mapper\PPost();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($IdPost))
				return self::statuses('CMD_OK');	
			if ($Type=="on") $Type=1;
			else $Type=0;
							
			$Post = $mPPost->find($IdPost);
			$Post->setAuthor($Author);
			$Post->setContent($Content);
			$Post->setDate($Date);
			$Post->setTitle($Title);
			$Post->setType($Type);
			$Post->reKey();
			$mPPost->update($Post);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
