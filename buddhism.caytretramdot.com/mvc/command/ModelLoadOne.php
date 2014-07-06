<?php
	namespace MVC\Command;	
	class ModelLoadOne extends Command{
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
			$Id 		= $request->getProperty('Id');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
									
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$mMapper 	= \MVC\Domain\HelperFactory::getFinder($ObjectName);
			if (isset($mMapper)){
				$Obj 		= $mMapper->find($Id);
				$S = "
				<result>				
					<count>1</count>
					<npage>1</npage>
					<rpage>10</rpage>
				</result>
				".$Obj->toXML();
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