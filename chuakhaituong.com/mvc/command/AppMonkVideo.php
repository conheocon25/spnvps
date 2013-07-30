<?php
	namespace MVC\Command;	
	class AppMonkVideo extends Command{
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
			$IdMonk = $request->getProperty('IdMonk');
			$IdBType = $request->getProperty('IdBType');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Monk = $mMonk->find( $IdMonk );			
			$MonkAll = $mMonk->findAll();
						
			if (!isset($Page)) $Page=1;
			$VMAll = $mVM->findByPage(array($IdMonk, $Page, 10));
			$PN = new \MVC\Domain\PageNavigation($Monk->getVMs()->count(), 10, $Monk->getURLVideo());
						
			$Title = $Monk->getName();
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("DANH SÁCH GIẢNG SƯ", "/app/monk")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------															
			$request->setObject("Monk", $Monk);
			$request->setObject("MonkAll", $MonkAll);
			$request->setObject("VMAll", $VMAll);
			$request->setObject("PN", $PN);
			$request->setObject("Navigation", $Navigation);
			$request->setProperty("Page", $Page);			
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>