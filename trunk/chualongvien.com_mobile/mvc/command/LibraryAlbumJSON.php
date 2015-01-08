<?php
	namespace MVC\Command;	
	class LibraryAlbumJSON extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
												
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KAlbum = $request->getProperty('KAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mAlbum 			= new \MVC\Mapper\Album();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Album = $mAlbum->findByKey($KAlbum);
			$ImageAll = $Album->getImageAll();
			
			$Data = array();
			while ($ImageAll->valid()){
				$Image = $ImageAll->current();
				$Data[] = array('src' => $Image->getURL(), 'w'=> 800, 'h'=>600);
				$ImageAll->next();
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			echo json_encode($Data);
		}
	}
?>