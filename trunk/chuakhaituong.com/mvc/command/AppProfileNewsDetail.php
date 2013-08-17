<?php
	namespace MVC\Command;	
	class AppProfileNewsDetail extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCategory = $request->getProperty('IdCategory');
			$IdProfile = $request->getProperty('IdProfile');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategory = new \MVC\Mapper\CategoryNews();
			$mProfile = new \MVC\Mapper\ProfileNews();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------													
			$Category = $mCategory->find($IdCategory);
			$Profile = $mProfile->find($IdProfile);
			
			$xml_source = file_get_contents( $Profile->getRSS() );
			$x = simplexml_load_string($xml_source);
			if(count($x) == 0) return;
			
			$PostAll = array();
			$i = 1;
			foreach($x->channel->item as $item){
				$Date = (string) $item->pubDate;
				$Link = (string) $item->link;
				$Title = (string) $item->title;				
				$PostAll[] = array($i++, $Title, $Link, $Date);
			}
															
			$Title = "CHI TIẾT";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("TIN TỨC", "/app/category/news"),
				array(mb_strtoupper($Category->getName(), 'UTF8'), $Category->getURLView()),
				array(mb_strtoupper($Profile->getName(), 'UTF8'), $Category->getURLProfile())
			);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject('Category', $Category);
			$request->setObject('Profile', $Profile);
			$request->setObject('PostAll', $PostAll);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty('Title', $Title);
		}
	}
?>
