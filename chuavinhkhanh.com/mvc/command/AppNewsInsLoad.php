<?php
	namespace MVC\Command;	
	class AppNewsInsLoad extends Command {
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
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			$Title = "THÊM MỚI TIN TỨC";
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$Category = $mCategoryNews->find($IdCategory);
			$PagodaAll = $mPagoda->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty('Title', $Title);
			$request->setObject( 'CategoryNewsAll', $CategoryNewsAll );
			$request->setObject( 'CategoryAskAll', $CategoryAskAll );
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject( 'Category', $Category );
			$request->setProperty("ActiveItem", 'Home');
		}
	}
?>
