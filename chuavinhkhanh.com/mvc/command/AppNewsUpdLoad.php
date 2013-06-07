<?php
	namespace MVC\Command;	
	class AppNewsUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			//$IdCategory = $Session->getCurrentCategoryNews();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdNews = $request->getProperty('IdNews');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$News = $mNews->find($IdNews);
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$Title = "Quản lý / chuyên mục tin tức / ".$News->getCategory()->getName()." / cập nhật tin";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject( 'CategoryNewsAll', $CategoryNewsAll );
			$request->setObject( 'CategoryAskAll', $CategoryAskAll );
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject( 'News', $News );
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("Title", $Title);
		}
	}
?>
