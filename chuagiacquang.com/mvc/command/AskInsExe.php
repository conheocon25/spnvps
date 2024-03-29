<?php
	namespace MVC\Command;	
	use MVC\Library\Mail;
	class AskInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$Question = $request->getProperty('Question');
			$Author1 = $request->getProperty('Author1');
			$CodeCaptcha = $request->getProperty('CodeCaptcha');
			$Answer = "";
			$Author2 = "";
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mAsk = new \MVC\Mapper\Ask();
			
			$OldCodeCaptcha = $Session->getCurrentCaptcha();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------							
			if ($OldCodeCaptcha == $CodeCaptcha)
			{				
				if (!isset($Question)) {				
					return self::statuses('CMD_ERROR');
				}
				else {
					//lấy ngày hiện tại
					$Today = \getdate();
					$CurDateTime = $Today['year']."-".$Today['mon']."-".$Today['mday']." ".$Today['hours'].":".$Today['minutes'].":".$Today['seconds'];
					//Gửi mail về Admin
					$AdminMailName = "Chùa giác Quang";
					$AdminMail ="contact@123app.net";			
					$MailSubject = "Ngày $CurDateTime - $Author1 đã gửi Thư hỏi! ";
					$MailContent = "Người hỏi: $Author1 <br /> Nội dung: $Question";
					//Mail($smtp_host, $admin_email, $smtp_username, $smtp_password);
					$mMail = new Mail('localhost', 'contact@123app.net', 'contact@123app.net', 'admin123456');
					$mMail->SendMail( $AdminMailName, $AdminMail, 'thanhbao2007vl@gmail.com', $MailSubject, $MailContent);
					$mMail->SendMail( $AdminMailName, $AdminMail, 'tuan_buithanh@yahoo.com', $MailSubject, $MailContent);
					$mMail->SendMail( $AdminMailName, $AdminMail, 'tnhuethanh@yahoo.com', $MailSubject, $MailContent);
					$request->setProperty("MsgCaptcha", '');
					return self::statuses('CMD_OK');
				}
					/*	
				$Ask = new \MVC\Domain\Ask(
					null,
					$IdCategory,
					$Question,
					$Author1,
					null,
					$Answer,
					$Author2
				);
				$mAsk->insert($Ask);
				*/				
			}
			else
			{
				$request->setProperty("MsgCaptcha", 'Mã bảo mật không đúng!');
				return self::statuses('CMD_ERROR');
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>