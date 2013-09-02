<?php
	namespace MVC\Command;	
	class AppLinkedUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdLinked = $request->getProperty('IdLinked');
			$Name = $request->getProperty('Name');
			$URL = $request->getProperty('URL');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mLinked = new \MVC\Mapper\Linked();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Linkeds = $mLinked->findAll();
						
			$Linked = $mLinked->find($IdLinked);
			$Linked->setName($Name);
			$Linked->setURL($URL);
			$mLinked->update($Linked);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
			return self::statuses('CMD_OK');
		}
	}
?>