<?php
	namespace MVC\Command;	
	class AppMonkVideoUpdLoad extends Command{
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
			$IdVideoMonk = $request->getProperty('IdVideoMonk');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
								
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Monk = $mMonk->find($IdMonk);
			$VM = $mVideoMonk->find($IdVideoMonk);
			$PagodaAll = $mPagoda->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();
			$Title = "Quản lý / Giảng sư / ".$Monk->getName()." / ".$VM->getVideo()->getName()." / Cập nhật";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('Monk', $Monk);
			$request->setObject('VM', $VM);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			$request->setObject('CategoryVideoAll', $CategoryVideoAll);
			$request->setProperty('Title', $Title);
			$request->setProperty('ActiveItem', "Home");
		}
	}
?>
