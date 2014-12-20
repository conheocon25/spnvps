<?php
	namespace MVC\Command;		
	class NewCategoryDelAuto extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
				
				$Session = \MVC\Base\SessionRegistry::instance();
				$Today = \getdate();
				$IdCategory = $request->getProperty('IdCategory');
				$CountMonth = $request->getProperty('CountMonth');
				
				$IdMonth = $Today['mon'] - $CountMonth;
				
				$mNews 	= new \MVC\Mapper\News();
				
				$mNews->deleteByCategoryDate(array($IdCategory, $IdMonth));
				
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			echo "Xóa Thành Công Danh Mục News ID = ".$IdCategory. " các tháng <= " .$IdMonth. " - Dữ liệu " .$CountMonth. " Trước sẽ xóa";
			//$json = array('result' => "OK");
			//echo json_encode($json);
			//return self::statuses('CMD_DEFAULT');
		}
		
	}	
?>