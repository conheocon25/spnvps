<?php
	namespace MVC\Command;
	use MVC\Library\ReadRss;
	require_once('mvc/library/SimpleHtmlDom.php');	
	class NewCategoryInsAuto extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			
				$IdRss = $request->getProperty('IdRss');
				
				//15	Hằng ngày
				$Url = "http://giacngo.vn/thongtin/rss/?ID=". $IdRss;
				
				if (isset($IdRss) && $IdRss == '1')
				{
					$IdCategory= 15;
				}
				if (isset($IdRss) && $IdRss == '130')
				{
					$IdCategory= 11;
				}
				if (isset($IdRss) && $IdRss == '190')
				{
					$IdCategory= 12;
				}
				if (isset($IdRss) && $IdRss == '200')
				{
					$IdCategory= 17;
				}
				
				$mNews = new \MVC\Mapper\News();
				$todaytime = new \DateTime('NOW');
				$interval = new \DateInterval('P0Y0DT11H0M');	
				$strDatatime = "_" . $todaytime->format('Y-m-d_H_i_s');
				//$Type = 0 binh thuong = 1 đặc biệt
				$Type = 0;
				$ReadRssXml = new ReadRss($Url);				
				$ReadRssXml->ReadRssXMLByCurl();				
				$chItems = $ReadRssXml->GetItems();
				$i = 0;
				$j = 0;
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
						

						$dom->saveHTMLFile("data/giacngo_". $IdCategory . "_" . $strDatatime . "_" . $j . ".html");
						$HTML = file_get_html("data/giacngo_". $IdCategory . "_" . $strDatatime . "_" . $j . ".html");					

						
						//$NewsTitle = $HTML->find('#ZoomContentHeadline', 0);							
						$NewsAuthor = $HTML->find('.ctcSource', 0);										
						$NewsContent = $HTML->find('.ctcBody', 0);					
						foreach( $NewsContent->find('img') as $img){
							if (substr($img->src,0,1) == "/")
								$img->src = "http://giacngo.vn/".$img->src; 
						}
						
						//xu ly thoi gian tao tin de them tin moi thoi
						$DateArray = explode(' ', $item['pubDate']);
						$CurDate = explode('/',$DateArray[0]);
						$CNewDate = $CurDate[2] . "/". $CurDate[1] . "/" . $CurDate[0] . " " . $DateArray[1];
						//Cong them 5h do lech muoi gio quoc te
											
						$todaytime->add($interval);
						//tao ngay từ rss	
						$date = new \DateTime($CNewDate);	
						
						if (($todaytime->diff($date)->format('%D') <= 0) && ($todaytime->diff($date)->format('%R') == '-')) {
							$News = new \MVC\Domain\News(
								null,
								$IdCategory,
								html_entity_decode($NewsAuthor->plaintext, ENT_QUOTES, 'UTF-8'),
								null,
								$NewsContent,
								$item['title'],
								$Type,
								""
							);						
							
							$News->reKey();
							$mNews->insert($News);
							$i= $i + 1;
						}
												
						if($i > 15) {
							break;
						}
						
						unset($dom);
						unset($HTML);
						unset($data);
						unset($News);						
						unset($DateArray);						
						unset($CurDate);						
						unset($CNewDate);						
						//$NewsTitle = "";
						$NewsAuthor = "";
						$NewsContent = "";
						$Type = 0;
						$j=$j+1;
					}
						
				}
				echo "Them Thanh Cong ".$i. " cua Id New:" . $IdCategory;
				unset($todaytime);
				unset($interval);
				unset($mNews);
				unset($ReadRssXml);
				unset($chItems);				
				unset($i);
				unset($j);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			
			//return self::statuses('CMD_DEFAULT');
		}
		
	}	
?>