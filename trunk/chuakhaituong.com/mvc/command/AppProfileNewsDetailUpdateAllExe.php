<?php
	namespace MVC\Command;	
	class AppProfileNewsDetailUpdateAllExe extends Command {
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
			$IdProfile = $request->getProperty('IdProfile');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategory = new \MVC\Mapper\CategoryNews();
			$mNews = new \MVC\Mapper\News();
			$mProfile = new \MVC\Mapper\ProfileNews();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------													
			$Category = $mCategory->find($IdCategory);
			$Profile = $mProfile->find($IdProfile);
			
			$xml_source = file_get_contents( $Profile->getRSS() );
			$x = simplexml_load_string($xml_source);
			if(count($x) == 0) return self::statuses('CMD_OK');
						
			//Lấy về URL tin tức
			foreach($x->channel->item as $item){
				$Date = (string) $item->pubDate;
				$Link = (string) $item->link;
				//Lấy tin về và lưu vào CSDL
			}
														
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			return self::statuses('CMD_OK');
		}
	}
?>
