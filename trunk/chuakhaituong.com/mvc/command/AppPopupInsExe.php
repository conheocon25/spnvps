<?php
	namespace MVC\Command;	
	class AppPopupInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$Command = $request->getProperty('Command');
			$Enable = $request->getProperty('Enable');
			$URL = $request->getProperty('URL');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mPopup = new \MVC\Mapper\Popup();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Command)||$Command=="")
				return self::statuses('CMD_OK');
			$Enable = ($Enable=="on")?1:0;
			
			$Popup = new \MVC\Domain\Popup(
				null,
				$Command,
				$Enable,
				$URL
			);												
			$mPopup->insert($Popup);
			
			if ($_FILES["file"]["error"] <= 0){
				move_uploaded_file($_FILES["file"]["tmp_name"], $Popup->getSource() );
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');
		}
	}
?>
