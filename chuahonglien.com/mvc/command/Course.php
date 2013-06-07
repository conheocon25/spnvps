<?php
	namespace MVC\Command;	
	class Course extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------						
			$IdCourse = $request->getProperty('IdCourse');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mAsk = new \MVC\Mapper\Ask();
			$mEvent = new \MVC\Mapper\Event();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mDhammapadaDetail = new \MVC\Mapper\DhammapadaDetail();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			
			$Title = "Đào tạo / ";
			$Courses = $mCourse->findAll();
			if (!isset($IdCourse)){
				$Course = $Courses->current();
			}else{
				$Course = $mCourse->find( $IdCourse );
			}
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesNews", $CategoriesNews);			
			$request->setObject("Event", $Event);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Courses', $Courses);
			$request->setObject('Course', $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setProperty("ActiveItem", 'Course');
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
