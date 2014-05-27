<?php
	namespace MVC\Command;
	use MVC\Library\ReadRss;
	require_once('mvc/library/SimpleHtmlDom.php');	
	class NewCategoryInsAuto extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			
				//15	Hằng ngày	lấy 5 tin đầu tiên
				$UrlHangNgay = "http://giacngo.vn/thongtin/rss/?ID=1";
				$IdCategoryHangNgay= 15;
				InsNewByRssUrl($UrlHangNgay, $IdCategoryHangNgay);
				//11	Phật Giáo
				$UrlPhatGiao = "http://giacngo.vn/thongtin/rss/?ID=130";
				$IdCategoryPhatGiao= 11;
				InsNewByRssUrl($UrlPhatGiao, $IdCategoryPhatGiao);
				//12	Những vị thuốc Đông y phổ thông
				$UrlDongY = "http://giacngo.vn/thongtin/rss/?ID=190";
				$IdCategoryDongY= 12;
				InsNewByRssUrl($UrlDongY, $IdCategoryDongY);
				//17	Các món ăn chay
				$UrlAnChay = "http://giacngo.vn/thongtin/rss/?ID=200";
				$IdCategoryAnChay= 17;
				InsNewByRssUrl($UrlAnChay, $IdCategoryAnChay);				
				
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			
			//return self::statuses('CMD_DEFAULT');
		}
		
	}
	function InsNewByRssUrl($Url, $IdCategory) {
				$mNews = new \MVC\Mapper\News();
				$datetime = new \DateTime('NOW');
				$strDatatime = "_" . $datetime->format('Y-m-d_H_i_s');
				//$Type = 0 binh thuong = 1 đặc biệt
				$Type = 0;
				$ReadRssXml = new ReadRss($Url);				
				$ReadRssXml->ReadRssXMLByCurl();				
				$chItems = $ReadRssXml->GetItems();
				$i = 0;
				if (is_array($chItems) and count($chItems)>0)
				{					
					foreach ($chItems as $key => $item)
					{
					   if($i == 0) {
					   	$Type = 1;
					   }
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
						

						$dom->saveHTMLFile("data/giacngo". $IdCategory . $strDatatime . ".html");
						$HTML = file_get_html("data/giacngo". $IdCategory . $strDatatime . ".html");					

						
						$NewsTitle = $HTML->find('#ZoomContentHeadline', 0);							
						$NewsAuthor = $HTML->find('.ctcSource', 0);										
						$NewsContent = $HTML->find('.ctcBody', 0);					
						foreach( $NewsContent->find('img') as $img){
							if (substr($img->src,0,1) == "/")
								$img->src = "http://giacngo.vn/".$img->src; 
						}
						
						//Them tin mới vào db
						$News = new \MVC\Domain\News(
							null,
							$IdCategory,
							html_entity_decode($NewsAuthor->plaintext, ENT_QUOTES, 'UTF-8'),
							null,
							$NewsContent,
							html_entity_decode($NewsTitle->plaintext, ENT_QUOTES, 'UTF-8'),
							$Type,
							""
						);						
						
						$News->reKey();
						$mNews->insert($News);
						
						if($i > 4) {
							break;
						}
						$i= $i + 1;
						unset($dom);
						unset($HTML);
						unset($data);
						unset($News);						
						$NewsTitle = "";
						$NewsAuthor = "";
						$NewsContent = "";
					}
						
				}
				unset($mNews);
				unset($ReadRssXml);
				unset($chItems);
				unset($i);
				
		}
?>