<?php
	namespace MVC\Command;	
	class LibraryVideoMonkPlay extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdBType = $request->getProperty('IdBType');
			$IdMonk = $request->getProperty('IdMonk');
			$IdVideoMonk = $request->getProperty('IdVideoMonk');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			
			$mVideo = new \MVC\Mapper\Video();
			$mMonk = new \MVC\Mapper\Monk();
			$mVM = new \MVC\Mapper\VideoMonk();
			$mAlbum = new \MVC\Mapper\Album();
						
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();			
			
			$CategoryBType = $mCategoryBType->find($IdBType);
			
			$Monks = $mMonk->findAll();
			$VM = $mVM->find($IdVideoMonk);
			$VMs = $mVM->findBy(array($IdMonk));
						
			$Pagodas = $mPagoda->findAll();
			
			$MonkSelected = $mMonk->find($IdMonk);			
			$Video = $VM->getVideo();
			$Video->setCount( $Video->getCount()+1 );
			$mVideo->update($Video);
			
			$Sponsors = $mSponsor->findAll();
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesVideo", $CategoriesVideo);			
			$request->setObject("Monks", $Monks);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject("Sponsors", $Sponsors);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			
			$request->setObject("CategoryBType", $CategoryBType);			
			$request->setObject("VM", $VM);
			$request->setObject("VMs", $VMs);
			$request->setObject("MonkSelected", $MonkSelected);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>