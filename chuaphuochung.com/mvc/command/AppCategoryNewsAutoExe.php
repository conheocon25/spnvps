<?php
	namespace MVC\Command;	
	class AppCategoryNewsAutoExe extends Command {
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
			$URL = $request->getProperty('URL');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																
			$Category = $mCategoryNews->find($IdCategory);									
			$Title = mb_strtoupper($Category->getName(), 'UTF8')." CẬP NHẬT TỰ ĐỘNG";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("TIN TỨC", "/app/category/news")
			);
			
			$NewsTitle = "tựa của tin";
			$NewsAuthor = "Tác giả";
			$NewsContent = "Nội dung";
			
			$HTML = file_get_html('http://giacngo.vn/phathoc/2013/08/14/1A4600/');	
			$NewsTitle = $HTML->find('#ZoomContentHeadline', 0);
				
			$NewsAuthor = $HTML->find('.ctcSource', 0);
							
			$NewsContent = $HTML->find('.ctcBody', 0);
		
			foreach( $NewsContent->find('img') as $img){
				if (substr($img->src,0,1) == "/")
					$img->src = "http://giacngo.vn/".$img->src; 
			}
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject('Category', $Category);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty('Title', $Title);
			$request->setProperty('NewsTitle', $NewsTitle->plaintext);
			$request->setProperty('NewsAuthor', $NewsAuthor->plaintext);
			$request->setProperty('NewsContent', $NewsContent);
		}
	}
?>
