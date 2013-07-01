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
			include("mvc/base/mapper/MapperDefault.php");
			
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
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$PagodaAll = $mPagoda->findAll();
			$AskAll = $mAsk->findBy3(null);
			$Title = "Gửi câu hỏi/trả lời";
			
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();
			
			$SponsorAll = $mSponsor->findAll();						
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("Category", $Category);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("Event", $Event);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('AskAll', $AskAll);
			$request->setObject("Course", $Course);
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			
			$request->setProperty("ActiveItem", 'Ask');
			$request->setProperty("Title", $Title);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>