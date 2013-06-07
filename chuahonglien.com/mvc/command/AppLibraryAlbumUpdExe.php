<?php
	namespace MVC\Command;	
	class AppLibraryAlbumUpdExe extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdAlbum = $request->getProperty('IdAlbum');
			$Name = $request->getProperty('Name');			
			$URL = $request->getProperty('URL');
			$Note = $request->getProperty('Note');
			$Time = $request->getProperty('Time');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mAlbum = new \MVC\Mapper\Album();
					
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Name))
				return self::statuses('CMD_OK');
				
			$Album = $mAlbum->find($IdAlbum);
			$Album->setName($Name);
			$Album->setURL($URL);
			$Album->setNote($Note);
			$Album->setTime($Time);
						
			$mAlbum->update($Album);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>
