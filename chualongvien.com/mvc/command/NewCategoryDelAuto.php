<?php
	namespace MVC\Command;		
	class NewCategoryDelAuto extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
				
				$Session = \MVC\Base\SessionRegistry::instance();
				
				$IdCategory = $request->getProperty('IdCategory');
				$IdMonth = $request->getProperty('IdMonth');
				
				$mNews 	= new \MVC\Mapper\News();
				
				$mNews->deleteByCategoryDate(array($IdCategory, $IdMonth));
				
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			echo "Xóa Thành Công Danh Mục News ID = ".$IdCategory. " các tháng <= " . $IdMonth;
			//$json = array('result' => "OK");
			//echo json_encode($json);
			//return self::statuses('CMD_DEFAULT');
		}
		
	}	
?>