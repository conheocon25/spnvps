<?php
	namespace MVC\Command;	
	class AppCourseInsLoad extends Command{
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
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();			
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mAlbum = new \MVC\Mapper\Album();
			$mEvent = new \MVC\Mapper\Event();
			$mMonk = new \MVC\Mapper\Monk();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mCourse = new \MVC\Mapper\Course();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			
			$PagodaAll = $mPagoda->findAll();
			$AlbumAll = $mAlbum->findAll();
			$EventAll = $mEvent->findAll();
			$MonkAll = $mMonk->findAll();
			$SponsorAll = $mSponsor->findAll();
			$CourseAll = $mCourse->findAll();			
			$Title = "THÊM MỚI";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("ĐÀO TẠO", "/app/course")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('AlbumAll', $AlbumAll);
			$request->setObject('EventAll', $EventAll);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject('CourseAll', $CourseAll);
			
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'Course');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>