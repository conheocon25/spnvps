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
			$mPagoda = new \MVC\Mapper\Pagoda();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------													
			$mCaptcha = new Captcha();
			$mCaptcha->createImage();
			$Session->setCurrentCaptcha($mCaptcha->getSecurityCode());
			
			$CategoriesAsk = $mCategoryAsk->findAll();
			$CategoriesNews = $mCategoryNews->findAll();
			$Pagodas = $mPagoda->findAll();
			
			$Category = $mCategoryAsk->find($IdCategory);
			if (!isset($Category)){
				$Category = $CategoriesAsk->current();
			}
						
			$Asks = $mAsk->findBy3(null);
			$Title = "Gửi câu hỏi/trả lời";
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("Category", $Category);
			$request->setObject("CategoriesAsk", $CategoriesAsk);
			$request->setObject("CategoriesNews", $CategoriesNews);
			$request->setObject("Event", $Event);
			$request->setObject('Pagodas', $Pagodas);
			$request->setObject('Asks', $Asks);
			$request->setProperty("ActiveItem", 'Ask');
			$request->setProperty("Title", $Title);
			$request->setProperty("MsgCaptcha", $MsgCaptcha);			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>