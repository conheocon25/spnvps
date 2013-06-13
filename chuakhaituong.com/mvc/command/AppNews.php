<?php
	namespace MVC\Command;	
	class AppNews extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
			$IdCurrentCategory = $Session->getCurrentCategoryNews();						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			
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
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoryVideos = $mPanelCategoryVideo->findAll();
			$Configs = $mConfig->findAll();
			
			$Categories1 = $mCategoryNews->findAll();			
			
			if (!isset($IdCategory)){
				if (!isset($IdCurrentCategory)){
					$Category = $Categories->current();
					$IdCategory = $Category->getId();
				}
				else {
					$Category = $mCategoryNews->find($IdCurrentCategory);
					$IdCategory = $IdCurrentCategory;
				}
			}else{
				$Category = $mCategoryNews->find($IdCategory);
			}
			
			$Session->setCurrentCategoryNews($IdCategory);			
			$Title = "Quản lý / Tin tức / ".$Category->getName();
			
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
			$request->setObject('PanelNews', $PanelNews);
			$request->setObject('PanelCategoryVideos', $PanelCategoryVideos);
			
			$request->setObject("Categories", $Categories1);
			$request->setObject("Category", $Category);
			
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'Home');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>