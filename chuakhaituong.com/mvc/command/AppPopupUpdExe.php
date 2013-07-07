<?php
	namespace MVC\Command;	
	class AppPopupUpdExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$IdPopup = $request->getProperty('IdPopup');
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
			$Popup = $mPopup->find($IdPopup);
			$Popup->setCommand($Command);
			$Popup->setEnable($Enable);
			$Popup->setURL($URL);			
			$mPopup->update($Popup);
			
			if ($_FILES["file"]["error"] > 0){
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else{
				//echo "Upload: " . $_FILES["SWF"]["name"] . "<br>";
				//echo "Type: " . $_FILES["SWF"]["type"] . "<br>";
				//echo "Size: " . ($_FILES["SWF"]["size"] / 1024) . " kB<br>";
				//echo "Temp file: " . $_FILES["SWF"]["tmp_name"] . "<br>";				
				move_uploaded_file($_FILES["file"]["tmp_name"], $Popup->getSource() );
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			return self::statuses('CMD_OK');			
		}
	}
?>