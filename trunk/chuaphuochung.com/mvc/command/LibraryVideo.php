<?php
	namespace MVC\Command;	
	class LibraryVideo extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdBType = $request->getProperty("IdBType");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Monks = $mMonk->findAll();			
			$VM1s = $mVM->findByUpdateTop(null);
			$VM2s = $mVM->findByUpdateTop(null);
			$VM3s = $mVM->findByUpdateTop(null);
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoryBType = $mCategoryBType->find($IdBType);
			$Pagodas = $mPagoda->findAll();
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			
			$PanelAds = $mPanelAds->findAll();
			$CategoriesBType = $mCategoryBType->findAll();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Monks", $Monks);			
			$request->setObject("VM1s", $VM1s);
			$request->setObject("VM2s", $VM2s);
			$request->setObject("VM3s", $VM3s);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoryBType", $CategoryBType);
			$request->setObject("Event", $Event);
			$request->setObject('Pagodas', $Pagodas);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoriesBType", $CategoriesBType);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>