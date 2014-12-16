<?php
	namespace MVC\Command;	
	class AppRssUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$IdRss 	= $request->getProperty('IdRss');
			$Name 	= $request->getProperty('Name');
			$Weburl = $request->getProperty('Weburl');
			$Rssurl = $request->getProperty('Rssurl');
			$TypeRss 	= $request->getProperty('TypeRss');
			$EnableRss = $request->getProperty('EnableRss');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mRss = new \MVC\Mapper\RssLink();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Rss = $mRss->find($IdRss);
			$Rss->setName($Name);
			$Rss->setWeburl($Weburl);
			$Rss->setRssurl($Rssurl);
			$Rss->setType($TypeRss);
			$Rss->setEnable($EnableRss);
			
						
			$mRss->update($Rss);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
