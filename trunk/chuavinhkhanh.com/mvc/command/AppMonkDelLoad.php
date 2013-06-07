<?php
	namespace MVC\Command;	
	class AppMonkDelLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdMonk = $request->getProperty('IdMonk');		
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Monk = $mMonk->find($IdMonk);			
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$PagodaAll = $mPagoda->findAll();
			
			$Title = "Quản lý hệ thống > Các giảng sư > ".$Monk->getName()." > Xóa";			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Monk', $Monk);								
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);	
			$request->setObject('CategoryAskAll', $CategoryAskAll);	
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');

		}
	}
?>
