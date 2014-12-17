<?php
	namespace MVC\Command;	
	class AppNewsPublished extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			
			$ListId = $request->getProperty('ListId');			
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mNews = new \MVC\Mapper\News();
			$mNewsRss = new \MVC\Mapper\NewsRss();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (isset($ListId)){
			
				foreach ($ListId as $Id ) {
					
					$dNewRss = $mNewsRss->find($Id);
						
					$News = new \MVC\Domain\News(
						null,
						$dNewRss->getIdCategory(),
						$dNewRss->getAuthor(),						
						$dNewRss->getDate(),
						$dNewRss->getContent(),
						$dNewRss->getTitle(),
						$dNewRss->getType(),
						""
					);
					$News->reKey();
					$mNews->insert($News);
					
					unset($News);
					unset($dNewRss);
					
					$mNewsRss->delete(array($Id));
				}
				
			//	return self::statuses('CMD_OK');
			}
			
			
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
