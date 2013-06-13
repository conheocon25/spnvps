<?php
	namespace MVC\Command;	
	class AppTaskUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTask = $request->getProperty('IdTask');
			
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
			$Tasks = $mTask->findAll();
			$CategoriesTask = $mCategoryTask->findAll();
			$Sponsors = $mSponsor->findAll();
			
			$Task = $mTask->find($IdTask);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject('CategoriesTask', $CategoriesTask);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Albums', $Albums);
			$request->setObject('Events', $Events);
			$request->setObject('Monks', $Monks);
			$request->setObject('Courses', $Courses);			
			$request->setObject('Sponsors', $Sponsors);
			$request->setObject('Task', $Task);
			
			$request->setProperty("Title", 'QUẢN LÝ / CÔNG VIỆC / '.$Task->getTitle()." / CẬP NHẬT" );
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'Task');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>