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
			$Profile = $mProfile->find($IdProfile);
			
			$xml_source = file_get_contents( $Profile->getRSS() );
			$x = simplexml_load_string($xml_source);
			if(count($x) == 0) return self::statuses('CMD_OK');
						
			//Lấy về URL tin tức
			foreach($x->channel->item as $item){
				$Date = (string) $item->pubDate;
				$Link = (string) $item->link;
				//Lấy tin về và lưu vào CSDL
				$NewsTitle = "tựa của tin";
				$NewsAuthor = "Tác giả";
				$NewsContent = "Nội dung";
				
				$HTML = file_get_html($Link);
				$NewsTitle = $HTML->find('#ZoomContentHeadline', 0);					
				$NewsAuthor = $HTML->find('.ctcSource', 0);
				$NewsContent = $HTML->find('.ctcBody', 0);			
				foreach( $NewsContent->find('img') as $img){
					if (substr($img->src,0,1) == "/")
						$img->src = "http://giacngo.vn/".$img->src; 
				}
				
				$News = new \MVC\Domain\News(
					null,
					$IdCategory,
					isset($NewsAuthor)?$NewsAuthor->plaintext:"không tác giả",
					null,
					$NewsContent,
					$NewsTitle->plaintext,
					0,
					""
				);
				$News->reKey();
				$mNews->insert($News);
				unset($HTML);
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			return self::statuses('CMD_OK');
		}
	}
?>
