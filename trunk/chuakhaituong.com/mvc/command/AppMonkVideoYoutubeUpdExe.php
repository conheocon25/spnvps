<?php
	namespace MVC\Command;	
	class AppMonkVideoYoutubeUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdMonk = $request->getProperty('IdMonk');
			$Type = $request->getProperty('Type');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------												
			$mVideo = new \MVC\Mapper\Video();
			$mVideoMonk = new \MVC\Mapper\VideoMonk();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if ($Type == "on"){
				$mVideoMonk->deleteByMonk(array($IdMonk));
			}
			
			$Index = 0;
			$URLPlayList = 	"http://gdata.youtube.com/feeds/api/playlists/PLhgTKgNKavO75vuTiGQbh3xg75q09xSa-?v=2";
			$data = file_get_contents($URLPlayList."&start-index=".($Index+1)."&max-results=50");
			$xml = simplexml_load_string($data);
				
			while (isset($xml->entry)){
				foreach($xml->entry as $playlist){
					$Media = $playlist->children('http://search.yahoo.com/mrss/');
					$Attrs = $Media->group->thumbnail[0]->attributes();				
					$Thumb = $Attrs['url'];
					$Time = $Attrs['time'];
					$Attrs = $Media->group->player->attributes();				
					$Video = $Attrs['url'];
					$Title = $Media->group->title;
					$Desc = $Media->group->description;
										
					//Thêm dữ liệu vào
					$Video = new \MVC\Domain\Video(
						null,
						$Title,
						null,
						$Video,
						$Desc,
						1
					);
					$Video->setURL( $Video->parseURLYoutube() );
					$Video->reKey();
					
					$mVideo->insert($Video);
					$VM = new \MVC\Domain\VideoMonk(
						null,
						$Video->getId(),
						$IdMonk				
					);
					$mVideoMonk->insert($VM);
				}
				
				$Index += 50;
				$data = file_get_contents($URLPlayList."&start-index=".($Index+1)."&max-results=50");
				$xml = simplexml_load_string($data);
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
						
			return self::statuses('CMD_OK');
		}
	}
?>
