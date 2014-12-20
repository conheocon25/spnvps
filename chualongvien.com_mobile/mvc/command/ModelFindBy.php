<?php
	namespace MVC\Command;	
	class ModelFindBy extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			\Header('Content-type: text/xml');
			require_once("mvc/base/domain/HelperFactory.php");	
						
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$ObjectName = $request->getProperty('ObjectName');
			$IdObject 	= $request->getProperty('IdObject');
			$Page 		= $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			if (!isset($Page)) $Page=1;			
			$mMapper 	= \MVC\Domain\HelperFactory::getFinder($ObjectName);			
			if (isset($mMapper)){							
				$ObjAll 	= $mMapper->findBy(array($IdObject));
				$ObjAll1 	= $mMapper->findByPage(array($IdObject, $Page, 10));
				$S = "
				<result>				
					<count>".$ObjAll->count()."</count>
					<npage>".((int)($ObjAll->count()/10 + 1) )."</npage>
					<ipage>".$Page."</ipage>
					<rpage>10</rpage>
				</result>
				";
				while ($ObjAll1->valid()){
					$Obj = $ObjAll1->current();
					$S1 = str_replace('&', '&amp;', $Obj->toXML());				
					$S = $S.$S1;
					$ObjAll1->next();
				}
			}else{
				$S = "
				<result>				
					<count>0</count>
					<npage>0</npage>
					<ipage>0</ipage>
					<rpage>10</rpage>
				</result>
				";
			}						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			echo "<model>".trim($S)."</model>";
		}
	}
?>