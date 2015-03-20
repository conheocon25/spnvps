<?php
	namespace MVC\Command;	
	class ServiceYouTubeAddVideoFromPlayList extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory	= $request->getProperty("IdCategory");
			$DTitle 	= $request->getProperty("DTitle");
			$DURL 		= $request->getProperty("DURL");
			$DViewed 	= $request->getProperty("DViewed");
			$DLiked 	= $request->getProperty("DLiked");
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mConfig 	= new \MVC\Mapper\Config();
			$mVideo 	= new \MVC\Mapper\Video();
			$mVideoLibrary 	= new \MVC\Mapper\VideoLibrary();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			\ini_set('max_execution_time', 300); //300 seconds = 5 minutes
			
			for ($i = 0; $i< count($DURL); $i++)
			{	
				//echo "Thêm -" . $DTitle[$i];
				$Video = new \MVC\Domain\Video(
					null,					
					$DTitle[$i],				
					date('Y-m-d H:i:s'),
					"http://www.youtube.com/embed/". $DURL[$i],					
					$DLiked[$i],
					$DViewed[$i],
					""
				);						
				$Video->reKey();
				$mVideo->insert($Video);
				$IdVideo = $Video->getId();
				
				$dVideoLibrary = new \MVC\Domain\VideoLibrary(
					null,
					$IdVideo,
					$IdCategory
				);
				
				$mVideoLibrary->insert($dVideoLibrary);			
				
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>