<?php
	namespace MVC\Command;	
	class AppPagodaEvent extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdPagoda 	= $request->getProperty('IdPagoda');
			$Page 		= $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mPagoda 	= new \MVC\Mapper\Pagoda();
			$mEvent 	= new \MVC\Mapper\Event();
			$mConfig 	= new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$PagodaAll 	= $mPagoda->findAll();
			$Pagoda 	= $mPagoda->find($IdPagoda);
			
			$Title 		= mb_strtoupper($Pagoda->getName(), 'UTF8');
			
			$Navigation = array(
				array("CHÙA"	, "/app/pagoda")
			);
			
			if (!isset($Page)) $Page=1;			
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$EventAll1 	= $mEvent->findByPage(array($IdPagoda, $Page, $Config->getValue() ));
			$EventAll	= $mEvent->findBy(array($IdPagoda));
			$PN = new \MVC\Domain\PageNavigation($EventAll->count(), $Config->getValue(), $Pagoda->getURLSettingEvent() );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Pagoda"	, $Pagoda);
			$request->setObject("PagodaAll"	, $PagodaAll);
			$request->setObject("EventAll1"	, $EventAll1);
			
			$request->setObject('Navigation', $Navigation);
			$request->setObject('PN', $PN);			
			$request->setProperty("ActiveAdmin", 'Pagoda');
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>