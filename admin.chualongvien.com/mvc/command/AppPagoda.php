<?php
	namespace MVC\Command;	
	class AppPagoda extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mPagoda = new \MVC\Mapper\Pagoda();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$PagodaAll 	= $mPagoda->findAll();			
			$Title 		= mb_strtoupper("DANH SÁCH CHÙA", 'UTF8');
			
			$Navigation = array(
				//array("THƯ VIỆN"	, "/app/btype")
			);
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("PagodaAll"	, $PagodaAll);
												
			$request->setObject('Navigation', $Navigation);			
			$request->setProperty("ActiveAdmin", 'Pagoda');
			$request->setProperty("Title", $Title);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>