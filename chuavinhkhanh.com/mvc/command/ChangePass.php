<?php
	namespace MVC\Command;	
	class ChangePass extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
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
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mAlbum = new \MVC\Mapper\Album();
			$mEvent = new \MVC\Mapper\Event();
			$mMonk = new \MVC\Mapper\Monk();
			$mCourse = new \MVC\Mapper\Course();
			$mTask = new \MVC\Mapper\Task();
																		
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$Albums = $mAlbum->findAll();
			$Events = $mEvent->findAll();
			$Monks = $mMonk->findAll();
			$CourseAll = $mCourse->findAll();
			$Tasks = $mTask->findAll();
			
			$Title = "ĐỔI MẬT KHẨU";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('Albums', $Albums);
			$request->setObject('Events', $Events);
			$request->setObject('Monks', $Monks);
			$request->setObject('CourseAll', $CourseAll);
			$request->setObject('Tasks', $Tasks);
						
			$request->setObject("Title", $Title);
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'Admin');			
			
		}
	}
?>