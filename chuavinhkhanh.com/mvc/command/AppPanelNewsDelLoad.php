<?php
	namespace MVC\Command;	
	class AppPanelNewsDelLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdPanelNews = $request->getProperty('IdPanelNews');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$AlbumAll = $mAlbum->findAll();
			$EventAll = $mEvent->findAll();
			$MonkAll = $mMonk->findAll();
			$CourseAll = $mCourse->findAll();
						
			$PanelNews = $mPanelNews->find($IdPanelNews);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('AlbumAll', $AlbumAll);
			$request->setObject('EventAll', $EventAll);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('CourseAll', $CourseAll);
			$request->setObject('PanelNews', $PanelNews);
			
			$request->setProperty("Title", 'QUẢN LÝ / PANEL/ NEWS / '.$PanelNews->getId()." / XÓA");
			$request->setProperty("ActiveItem", 'Home');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>