<?php
	namespace MVC\Command;	
	class AppSponsorPersonUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdSponsor = $request->getProperty('IdSponsor');
			$IdPerson = $request->getProperty('IdPerson');
			$Name = $request->getProperty('Name');
			$Time = $request->getProperty('Time');
			$Address = $request->getProperty('Address');
			$Value = $request->getProperty('Value');
			$Unit = $request->getProperty('Unit');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mPerson = new \MVC\Mapper\SponsorPerson();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$Person = $mPerson->find($IdPerson);
			$Person->setName($Name);
			$Person->setAddress($Address);
			$Person->setTime($Time);
			$Person->setValue($Value);
			$Person->setUnit($Unit);
			$mPerson->update($Person);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>