<?php
	namespace MVC\Command;	
	class AppLibraryAlbum extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();			
			$Pagodas = $mPagoda->findAll();
			$Albums = $mAlbum->findAll();
			$Events = $mEvent->findAll();
			$Monks = $mMonk->findAll();
			$Courses = $mCourse->findAll();
			$Sponsors = $mSponsor->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoryVideos = $mPanelCategoryVideo->findAll();
			$Configs = $mConfig->findAll();
			$Tasks = $mTask->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("CategoriesAsk", $CategoriesAsk);			
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Albums', $Albums);
			$request->setObject('Events', $Events);
			$request->setObject('Monks', $Monks);
			$request->setObject('Courses', $Courses);
			$request->setObject('Sponsors', $Sponsors); 
			$request->setObject('Configs', $Configs); 
			$request->setObject('PanelAdsAll', $PanelAdsAll);
			$request->setObject('PanelNews', $PanelNews);
			$request->setObject('PanelCategoryVideos', $PanelCategoryVideos);
			$request->setObject('Tasks', $Tasks);
			
			$request->setProperty('Title', 'Quản trị / Album / ');
			$request->setProperty('ActiveItem', 'Home');
			$request->setProperty("ActiveAdmin", 'Album');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>