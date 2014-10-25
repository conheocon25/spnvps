<?php
	namespace MVC\Command;	
	class AppPagodaPostInsExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐÉN
			//-------------------------------------------------------------
			$IdProvince = $request->getProperty('IdProvince');
			$IdDistrict = $request->getProperty('IdDistrict');
			$IdPagoda 	= $request->getProperty('IdPagoda');
									
			$Author = $request->getProperty('Author');
			$Content = \stripslashes($request->getProperty('Content'));
			$Title = $request->getProperty('Title');
			$Type = $request->getProperty('Type');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mPPost = new \MVC\Mapper\PPost();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Title))
				return self::statuses('CMD_OK');
			if ($Type=="on")
				$Type=1;
			else
				$Type=0;
				
			$PPost = new \MVC\Domain\PPost(
				null,
				$IdPagoda,
				$Author,
				null,
				$Content,
				$Title,
				$Type,
				""
			);
			$PPost->reKey();
			$mPPost->insert($PPost);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>