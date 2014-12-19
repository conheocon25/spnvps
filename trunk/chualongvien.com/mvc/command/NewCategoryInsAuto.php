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
				
				if (isset($IdRss) && $IdRss == '110')
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
				
				$ReadRssXml = new ReadRss($Url);				
				$ReadRssXml->ReadRssXMLByCurl();				
				$chItems = $ReadRssXml->GetItems();
				
				
				//Công thêm 11 tiếng do lệch múi giờ Mỹ - Việt Nam
				$DateNews = $todaytime->add($interval);
				//Số lấy tin trước đó để so sánh
				$intervalSub = new \DateInterval('P0Y05DT0H0M');
				
				$DateEnd = $DateNews->format('Y-m-d') . " 23:59:59";
				
				$DateNews = $DateNews->sub($intervalSub);
				$DateStart = $DateNews->format('Y-m-d') . " 0:0:0";
				
				echo "Ngày bắt đầu: " . $DateStart . "<br />";
				echo "Ngày kết thúc: " .$DateEnd. "<br />";
				
				$ListNews = $mNews->findByDateTime(array($IdCategory, $DateStart, $DateEnd));
				
				$ListOldNews = array();
				$k=0;		
				while ($ListNews->valid()){
					$dNews = $ListNews->current();
						$OldNew = trim($dNews->getTitle());
						$OldNew = mb_convert_case($OldNew, MB_CASE_LOWER, "UTF-8"); 
						$ListOldNews[$k] = $OldNew;	
						$k=$k +1;
					$ListNews->next();
				}
						
							
				$flagIns = false;				
				$i = 0;
				$lengthOld = count($ListOldNews);
				$length = count($chItems);
				if (is_array($chItems) and count($chItems)>0)
				{					
					foreach ($chItems as $key => $item)
					{
						$CurTitle = trim($item['title']);						
						$CurTitle = mb_convert_case($CurTitle, MB_CASE_LOWER, "UTF-8"); 
						
						for($l=0; $l < $lengthOld; ++$l) {
								$OldNew = $ListOldNews[$l];															
								if (strcmp($OldNew, $CurTitle) == 0) {
									$flagIns = true;									
									break;
								}								
						}
						
						if ($flagIns == false) {
							
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
							
							$dom->saveHTMLFile("data/giacngo_". $IdCategory . "_" . $strDatatime . "_" . $i . ".html");
							$HTML = file_get_html("data/giacngo_". $IdCategory . "_" . $strDatatime . "_" . $i . ".html");					
								
							$NewsAuthor = $HTML->find('.ctcSource', 0);										
							$NewsContent = $HTML->find('.ctcBody', 0);					
							foreach( $NewsContent->find('img') as $img){
								if (substr($img->src,0,1) == "/")
									$img->src = "http://giacngo.vn/".$img->src; 
							}
							if (!isset($IdCategory)) {
								$IdCategory = 15;
							}
							
							if (!isset($NewsAuthor)) {
								$NewsAuthor = "BBT";
							}else {
								$NewsAuthor = html_entity_decode($NewsAuthor->plaintext, ENT_QUOTES, 'UTF-8');
							}				
							// Thêm tin mới							
								$News = new \MVC\Domain\News(
									null,
									$IdCategory,
									$NewsAuthor,
									null,
									$NewsContent,
									$item['title'],
									0,
									""
								);						
								
								$News->reKey();
								$mNews->insert($News);
								$i= $i + 1;
								
								//echo "<br />" . $i . "Đã thêm tin moi: " . $CurTitle . "<br />";							
							
							
							unset($dom);
							unset($HTML);
							unset($data);
							unset($News);						
							unset($DateArray);						
							unset($CurDate);						
							unset($CNewDate);
							$NewsAuthor = "";
							$NewsContent = "";														
						}
						$flagIns = false;
					}
					
				}
				array_map('unlink', glob("data/*.html")); 	
				echo "Them Thanh Cong ". $i . " cua Id New:" . $IdCategory;
				unset($todaytime);
				unset($interval);
				unset($mNews);
				unset($ReadRssXml);
				unset($chItems);				
				unset($i);			
				
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			
			//return self::statuses('CMD_DEFAULT');
		}
		
	}	
?>