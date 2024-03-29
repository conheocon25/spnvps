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
			$mCategoryBType 	= new \MVC\Mapper\CategoryBType();
			$mCategoryNews 		= new \MVC\Mapper\CategoryNews();						
			$mNews 				= new \MVC\Mapper\News();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoryBTypeAll 	= $mCategoryBType->findAll();
			$CategoryNewsAll 	= $mCategoryNews->findAll();			
			$News 				= $mNews->find($IdNews);
						
			$Title = $News->getTitle();
			$Navigation = array(
				array("TIN TỨC", "/app/category/news"),
				array( mb_strtoupper($News->getCategory()->getName(), 'UTF8'), $News->getCategory()->getURLView())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject( 'CategoryBTypeAll', $CategoryBTypeAll );
			$request->setObject( 'CategoryNewsAll', $CategoryNewsAll );									
			$request->setObject( 'News', $News );
			
			$request->setObject( 'Navigation', $Navigation );
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("Title", $Title);			
		}
	}
?>
