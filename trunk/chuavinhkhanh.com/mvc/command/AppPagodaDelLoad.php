<?php
	namespace MVC\Command;	
	class AppPagodaDelLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdPagoda = $request->getProperty('IdPagoda');		
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Pagoda = $mPagoda->find($IdPagoda);			
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$Title = "Quản lý hệ thống > Các chùa > ".$Pagoda->getName()." > Xóa";			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Pagoda', $Pagoda);								
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);	
			$request->setObject('CategoryAskAll', $CategoryAskAll);	
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', 'Home');

		}
	}
?>
