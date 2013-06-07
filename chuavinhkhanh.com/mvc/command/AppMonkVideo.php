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
			$IdMonk = $request->getProperty('IdMonk');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$Monk = $mMonk->find( $IdMonk );
			$MonkAll = $mMonk->findAll( );
			$PagodaAll = $mPagoda->findAll();
			
			$Title = "Quản trị / Giảng sư / ".$Monk->getName();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("Monk", $Monk);
			$request->setObject("MonkAll", $MonkAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", "Home");
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>