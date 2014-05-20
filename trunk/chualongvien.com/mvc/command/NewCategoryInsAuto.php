<?php
	namespace MVC\Command;
	use MVC\Library\ReadRss;
	error_reporting(E_ALL);
	include_once('MVC\Library\SimpleHtmlDom.php');
	
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
					    $curl_handle=curl_init();
						curl_setopt($curl_handle, CURLOPT_URL,$item['link']);
						curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
						curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);				
						curl_setopt($curl_handle, CURLOPT_BINARYTRANSFER, true);
						curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);				
						curl_setopt($curl_handle, CURLOPT_USERAGENT, 'giacngo.vn');
						$data = curl_exec($curl_handle);
						curl_close($curl_handle);
						
						$dom = new \DOMDocument();
						@$dom->loadHTML($data);
						//print_r($dom);
						$dom->saveHTMLFile("giacngo.html");
						$HTML = file_get_html("giacngo.html");
						
						//$HTML = file_get_html($item['link']);	
						$NewsTitle = $HTML->find('#ZoomContentHeadline', 0);							
						$NewsAuthor = $HTML->find('.ctcSource', 0);										
						$NewsContent = $HTML->find('.ctcBody', 0);					
						foreach( $NewsContent->find('img') as $img){
							if (substr($img->src,0,1) == "/")
								$img->src = "http://giacngo.vn/".$img->src; 
						}
						
						echo $NewsTitle;
						echo '<br />';
						echo $NewsAuthor ;
						echo '<br />';
						echo $item['pubDate'] ;
						echo '<br />';
						echo $NewsContent;
						echo '<br />';
						unset($dom);
						unset($HTML);
						unset($data);
					}
						
				}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			
			//return self::statuses('CMD_DEFAULT');
		}
	}
?>
