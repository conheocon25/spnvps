<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailYoutubeUpdExe extends Command{
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
			$Type = $request->getProperty('Type');
			$IdPlaylist = $request->getProperty('URL');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------												
			$mVideo = new \MVC\Mapper\Video();
			$mVideoLibrary = new \MVC\Mapper\VideoLibrary();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if ($Type == "on"){
				$mVideoLibrary->deleteByCategory(array($IdCategory));
			}
			
			$Index = 0;
			$URLPlayList = 	"http://gdata.youtube.com/feeds/api/playlists/".$IdPlaylist."?v=2";
			
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
					$VL = new \MVC\Domain\VideoLibrary(
						null,
						$Video->getId(),
						$IdCategory				
					);
					$mVideoLibrary->insert($VL);
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
