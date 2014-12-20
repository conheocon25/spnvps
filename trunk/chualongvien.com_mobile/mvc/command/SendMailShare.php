<?php
	namespace MVC\Command;	
	use MVC\Library\Mail;
	class SendMailShare extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$EmailShare = $request->getProperty('EmailShare');	
			$ID_New = $request->getProperty('ID_New');			
			$ContentShare = $request->getProperty('ContentShare');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mFeed = new \MVC\Mapper\Feed();
			$mNews = new \MVC\Mapper\News();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Feed = $mFeed->findByEmail($EmailShare);
			if (!isset($Feed)){
				$Feed  = new \MVC\Domain\Feed(null, $EmailShare);
				$mFeed->insert($Feed);
			}
						
			$New	= $mNews->find($ID_New);
			$URLNew = $New->getURLRead();
			$doMail = new Mail("mail.chualongvien.com", "admin@chualongvien.com", "longvien", "admin068198");
			 
			$Content = "Website Chùa Long Viễn - chualongvien.com - Bạn được mời xem thông tin cùng với nội dung như sau: $ContentShare <br />
						Hãy click vào link xem chi tiết http://chualongvien.com$URLNew <br /> Cám ơn bạn đã ủng hộ website chúng tôi!";
			
			$doMail->SendMail("Ban Biên Tập Website http://chualongvien.com", "admin@chualongvien.com", $EmailShare, "Gui Mailo ", $Content);
			   
			//echo "da send!!". $EmailShare . " - ulr " . $URLNew . " Content: " . $ContentShare;
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
