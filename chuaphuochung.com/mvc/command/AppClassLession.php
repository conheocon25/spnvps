<?php
	namespace MVC\Command;	
	class AppClassLession extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdClass = $request->getProperty('IdClass');
			$IdCourse = $request->getProperty('IdCourse');			
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAllVideo = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$AlbumAll = $mAlbum->findAll();
			$Events = $mEvent->findAll();
			$Monks = $mMonk->findAll();
			$Courses = $mCourse->findAll();
			$Course = $mCourse->find($IdCourse);
			$Class = $mCourseClass->find($IdClass);
			
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAllAll = $mPanelAds->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("CategoryBTypeAll", $CategoryBType);
			$request->setObject("PanelAdsAll", $PanelAdsAllAll);						
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAllVideo", $CategoryAllVideo);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('AlbumAll', $AlbumAll);
			$request->setObject('Events', $Events);
			$request->setObject('Monks', $Monks);
			$request->setObject('Courses', $Courses);
			$request->setObject('Course', $Course);
			$request->setObject('Class', $Class);
			
			$request->setProperty("Title", 'Quản Lý / ...'.$Class->getName()." / CÁC BÀI");
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'Course');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>