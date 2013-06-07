<?php
	namespace MVC\Command;	
	class ReadCategory extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$IdNews = $request->getProperty('IdNews');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mNews = new \MVC\Mapper\News();
			$mEvent = new \MVC\Mapper\Event();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mConfig = new \MVC\Mapper\Config();
			$mCourse = new \MVC\Mapper\Course();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$Pagodas = $mPagoda->findAll();
			$Sponsors = $mSponsor->findAll();
			
			$Category = $mCategoryNews->find($IdCategory);
			$CategoriesNews = $mCategoryNews->findAll();
			
			if (!isset($IdCategory)){
				$Category = $CategoriesNews->current();
			}else{
				$Category = $mCategoryNews->find($IdCategory);
			}
			
			if (!isset($IdNews)){
				$News = $Category->getNewsLimit()->current();
			}else{
				$News = $mNews->find($IdNews);
			}			
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();
			
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------															
			$request->setObject("Category", $Category);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("News", $News);
			$request->setObject("Event", $Event);
			$request->setObject("Pagodas", $Pagodas);
			$request->setObject("Sponsors", $Sponsors);
			$request->setObject("Course", $Course);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			
			$request->setProperty("Title", "CHÙA KHẢI TƯỜNG");
			$request->setProperty("ActiveItem", 'ReadCategory');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
