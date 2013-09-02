<?php
	namespace MVC\Command;	
	use MVC\Library\Mail;
	class OnlineExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Email = $request->getProperty('Email');
			$Name = $request->getProperty('Name');			
			$Subject = $request->getProperty('Subject');
			$Content = $request->getProperty('Content');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mUser = new \MVC\Mapper\User();			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			
			
			if ($Email != ""){				
				//lấy ngày hiện tại
				$Today = \getdate();
				$CurDateTime = $Today['year']."-".$Today['mon']."-".$Today['mday']." ".$Today['hours'].":".$Today['minutes'].":".$Today['seconds'];
				//Gửi mail về Admin
				$AdminMailName = "cafe.123app.net";
				$AdminMail ="contact@123app.net";			
				$MailSubject = "Ngày $CurDateTime - $Name đã gửi Thư phản hồi với chủ đề: ". $Subject;
				$MailContent = "Nội dung phản hồi:<br /> Người gửi: $Name <br /> Email: $Email <br /> Chủ đề: $Subject <br /> Nội dung: $Content";
				//Mail($smtp_host, $admin_email, $smtp_username, $smtp_password);
				$mMail = new Mail('localhost', 'contact@123app.net', 'contact@123app.net', 'admin123456');
				$mMail->SendMail( $AdminMailName, $AdminMail, 'thanhbao2007vl@gmail.com', $MailSubject, $MailContent);
				$mMail->SendMail( $AdminMailName, $AdminMail, 'tuan_buithanh@yahoo.com', $MailSubject, $MailContent);
				return self::statuses('CMD_OK');
			}
			return self::statuses('CMD_NO_AUTHOR');
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
		}
	}
?>