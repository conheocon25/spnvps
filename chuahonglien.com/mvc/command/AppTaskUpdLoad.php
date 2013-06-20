<?php
	namespace MVC\Command;	
	class AppTaskUpdLoad extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTask = $request->getProperty('IdTask');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$CategoryTaskAll = $mCategoryTask->findAll();						
			$Task = $mTask->find($IdTask);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject('CategoryTaskAll', $CategoryTaskAll);			
			$request->setObject('Task', $Task);
			
			$request->setProperty("Title", 'QUẢN LÝ / CÔNG VIỆC / '.$Task->getTitle()." / CẬP NHẬT" );
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'Task');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>