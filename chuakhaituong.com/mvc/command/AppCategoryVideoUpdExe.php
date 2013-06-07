<?php
	namespace MVC\Command;	
	class AppCategoryVideoUpdExe extends Command {
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
			$Name = $request->getProperty('Name');
			$Picture = $request->getProperty('Picture');
			$Order = $request->getProperty('Order');
			$Type = $request->getProperty('Type');
			$BType = $request->getProperty('BType');
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();								
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			$Category = $mCategoryVideo->find($IdCategory);			
			$Category->setName($Name);
			$Category->setOrder($Order);
			$Category->setPicture($Picture);
			if ($Type=="on")
				$Type=1;
			else
				$Type=0;
			$Category->setType($Type);
			$Category->setBType($BType);
			
			$mCategoryVideo->update($Category);
														
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');			
		}
	}
?>