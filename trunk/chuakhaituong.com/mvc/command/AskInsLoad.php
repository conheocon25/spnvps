<?php
	namespace MVC\Command;	
	use MVC\Library\Captcha;	
	class AskInsLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$MsgCaptcha = $request->getProperty('MsgCaptcha');	
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mEvent = new \MVC\Mapper\Event();
			$mAsk = new \MVC\Mapper\Ask();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mConfig = new \MVC\Mapper\Config();
			$mCourse = new \MVC\Mapper\Course();
			$mNews = new \MVC\Mapper\News();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------													
			
			$mCaptcha = new Captcha();
			$mCaptcha->createImage();
			$CaptchaSecurited = $mCaptcha->getSecurityCode();
			$Session->setCurrentCaptcha($CaptchaSecurited);
			
			$CaptchaSecurity = $Session->getCurrentCaptcha();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty("CaptchaSecurity", $CaptchaSecurited);		
			$request->setProperty("MsgCaptcha", $MsgCaptcha);
						
			$Category = $mCategoryAsk->find($IdCategory);
			$CategoriesBType = $mCategoryBType->findAll();
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$Pagodas = $mPagoda->findAll();
			$Asks = $mAsk->findBy3(null);
			$Title = "Gửi câu hỏi/trả lời";
			
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();
			
			$Sponsors = $mSponsor->findAll();						
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoriesVideo = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("Category", $Category);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("CategoriesBType", $CategoriesBType);
			$request->setObject("Event", $Event);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Asks', $Asks);
			$request->setObject("Course", $Course);
			$request->setObject("Sponsors", $Sponsors);
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoriesVideo", $PanelCategoriesVideo);
			
			$request->setProperty("ActiveItem", 'Ask');
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>