<?php
	namespace MVC\Command;	
	use MVC\Library\ReadRss;
	require_once('mvc/library/SimpleHtmlDom.php');	
	class AppNewsRssPublish extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			
			$IdRss = $request->getProperty('IdRss');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews 	= new \MVC\Mapper\CategoryNews();
			$mRssLink 		= new \MVC\Mapper\RssLink();
			$mNewsRss 		= new \MVC\Mapper\NewsRss();
			$mNews 			= new \MVC\Mapper\News();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$dRssLink 	= $mRssLink->find($IdRss);
			$WebUrl 	= $dRssLink->getWeburl();
			$Url 		= $dRssLink->getRssurl();
			$IdCategory = $dRssLink->getType();
			
			$todaytime = new \DateTime('NOW');
				$interval = new \DateInterval('P0Y0DT11H0M');	
				$strDatatime = "_" . $todaytime->format('Y-m-d_H_i_s');
				
				$ReadRssXml = new ReadRss($Url);				
				$ReadRssXml->ReadRssXMLByCurl();				
				$chItems = $ReadRssXml->GetItems();
				
				
				//Công thêm 11 tiếng do lệch múi giờ Mỹ - Việt Nam
				$DateNews = $todaytime->add($interval);
				//Số lấy tin trước đó để so sánh
				$intervalSub = new \DateInterval('P0Y02DT0H0M');
				
				$DateEnd = $DateNews->format('Y-m-d') . " 23:59:59";
				
				$DateNews = $DateNews->sub($intervalSub);
				$DateStart = $DateNews->format('Y-m-d') . " 0:0:0";
				
				//echo "Ngày bắt đầu: " . $DateStart . "<br />";
				//echo "Ngày kết thúc: " .$DateEnd. "<br />";
				
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
									$img->src =  $WebUrl .$img->src; 
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
								$News = new \MVC\Domain\NewsRss(
									null,
									$IdCategory,
									$IdRss,
									$NewsAuthor,
									null,
									$NewsContent,
									$item['title'],
									0,
									""
								);						
								
								$News->reKey();
								$mNewsRss->insert($News);
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
				//echo "Them Thanh Cong ". $i . " cua Id New:" . $IdCategory;
				unset($todaytime);
				unset($interval);
				unset($mNews);
				unset($ReadRssXml);
				unset($chItems);				
				unset($i);
				
				array_map('unlink', glob("data/*.html")); 
			//-------------------------------------------------------------
			//Doc lại tin chua duyet
			//-------------------------------------------------------------	
			$NewsRssAll = $mNewsRss->findAll();				
			
			$Title = mb_strtoupper("DUYỆT TIN TỨC TỪ RSS URL", 'UTF8');
			$Navigation = array(				
				array("TIN TỨC", "/app/news/rss")
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("NewsRssAll", $NewsRssAll);
			$request->setObject("Navigation", $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveAdmin", 'NewsRss');
			
			return self::statuses('CMD_OK');
		}
	}
?>