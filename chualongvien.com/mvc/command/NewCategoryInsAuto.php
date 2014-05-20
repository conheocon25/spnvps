<?php
	namespace MVC\Command;
	use MVC\Library\ReadRss;
	class NewCategoryInsAuto extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			//$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
				
				
				$HTML = "";
				$NewsTitle = "";
				$NewsAuthor = "";
				$NewsContent = "";
				
				$url = "http://giacngo.vn/thongtin/rss/?ID=1";	
			
				$ReadRssXml = new ReadRss($url);				
				$ReadRssXml->ReadRssXMLByCurl();				
				$chItems = $ReadRssXml->GetItems();
				
				if (is_array($chItems) and count($chItems)>0)
				{					
					foreach ($chItems as $key => $item)
					{
					    /*
						$HTML = file_get_html($item['link']);	
						$NewsTitle = $HTML->find('#ZoomContentHeadline', 0);							
						$NewsAuthor = $HTML->find('.ctcSource', 0);										
						$NewsContent = $HTML->find('.ctcBody', 0);					
						foreach( $NewsContent->find('img') as $img){
							if (substr($img->src,0,1) == "/")
								$img->src = "http://giacngo.vn/".$img->src; 
						}
						*/
						echo $item['link'] ;
						echo '<br />';
						echo $item['title'] ;
						echo '<br />';
						echo $item['pubDate'] ;
						echo '<br />';
						echo $NewsContent;
						echo '<br />';
						echo $NewsContent;
						echo '<br />';
					}
						
				}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			
			//return self::statuses('CMD_DEFAULT');
		}
	}
?>
