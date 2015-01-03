<?php
	namespace MVC\Command;	
	class ReadCDocument extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Key1 = $request->getProperty('Key1');
			$Page = $request->getProperty('Page');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryDocument 	= new \MVC\Mapper\CategoryDocument();
			$mDocument 			= new \MVC\Mapper\Document();							
			$mConfig 			= new \MVC\Mapper\Config();					
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$Category = $mCategoryDocument->findByKey($Key1);
			$CategoryDocumentAll = $mCategoryDocument->findAll();
			
			if (!isset($Category)) $Category = $CategoryDocumentAll->current();
			$IdCategory = $Category->getId();									
			if (!isset($Page)) $Page = 1;			
			
			$Title = mb_strtoupper("VĂN BẢN / ".$Category->getName(), 'UTF8');			
			$DocumentAll = $mDocument->findByPage(array($IdCategory, $Page, 10));
			$PN = new \MVC\Domain\PageNavigation($Category->getDocumentAll()->count(), 10, $Category->getURLRead());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty("Title", $Title);
						
			$request->setObject("CategoryCurrent", $Category);			
			$request->setObject("CategoryDocumentAll", $CategoryDocumentAll);									
			$request->setObject("DocumentAll", $DocumentAll);
												
			$request->setObject("PN", $PN);			
			$request->setProperty("Page", $Page);	
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
