<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCategory = $request->getProperty('IdCategory');
			$IdVideoLibrary = $request->getProperty('IdVideoLibrary');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mMonk = new \MVC\Mapper\Monk();
			$mVideoLibrary = new \MVC\Mapper\VideoLibrary();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$VL = $mVideoLibrary->find($IdVideoLibrary);
			$Pagodas = $mPagoda->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$Monks = $mMonk->findAll();
			$Title = "Quản lý / chuyên mục video / ".$VL->getVideo()->getName()." / Cập nhật";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('VL', $VL);
			$request->setObject('Monks', $Monks);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('CategoriesAsk', $CategoriesAsk);
			$request->setObject('CategoriesNews', $CategoriesNews);
			
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', "Home");
		}
	}
?>
