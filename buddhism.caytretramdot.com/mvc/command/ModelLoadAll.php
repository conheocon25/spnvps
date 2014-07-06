<?php
	namespace MVC\Command;	
	class ModelLoadAll extends Command {
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
												
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$mMapper 	= \MVC\Domain\HelperFactory::getFinder($ObjectName);			
			if (isset($mMapper)){
				$ObjAll 	= $mMapper->findAll();
				$S = "
				<result>				
					<count>".$ObjAll->count()."</count>
					<npage>".((int)($ObjAll->count()/10 + 1) )."</npage>
					<rpage>10</rpage>
				</result>
				";
				while ($ObjAll->valid()){
					$Obj = $ObjAll->current();
					$S = $S.trim($Obj->toXML());
					$ObjAll->next();
				}	
			}else{
				$S = "
				<result>				
					<count>0</count>					
					<npage>0</npage>
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