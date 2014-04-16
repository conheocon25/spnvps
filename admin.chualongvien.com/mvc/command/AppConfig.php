<?php
	namespace MVC\Command;	
	class AppConfig extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mConfig = new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$ConfigAll = $mConfig->findAll();
									
			$Title = "CẤU HÌNH";
			$Navigation = array(
				
			);
			
			if (!isset($Page)) $Page=1;			
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$ConfigAll1 = $mConfig->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($ConfigAll->count(), $Config->getValue(), "/app/config" );
					
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------																					
			$request->setObject('ConfigAll1', $ConfigAll1);
			$request->setObject('Navigation', $Navigation);
			$request->setObject('PN', $PN);
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'Statistic');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>