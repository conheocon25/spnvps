<?php 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"]; ?>
<div class="span8 fix-width">			
					<div class="box radius">
						<div class="page-header pg-header pg-header-news reset-margin">
							<h4 class="reset-margin">Trang download</h4>
							
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-main"><div align="left">
							
							<table cellpadding="5" cellspacing="0" border="1" width="100%" bordercolor="#cccccc" style="border-collapse:collapse; border:1px solid #cccccc; background:#ffffff">
			  	    <tbody><tr style="background: #FC3">
			  	    
			  	      <td align="center" valign="top"><strong>Tên file</strong></td>

			  	      <td valign="top" align="center" width="75"><strong>Thao tác</strong></td>
					   <td valign="top" align="center" width="75"><strong>Lượt Tải</strong></td>
		  	        </tr>
					
					<?php  require './ketnoi.php';
$sql="select * from download order by id desc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
											$i=0;
                                                while($row=mysql_fetch_array($kq))
                                                {
											$i=$i+1;
                                                  $id=$row["id"];
												   $duongdan=$row["duongdan"];
												    $luotdownlaod=$row["luotdownlaod"];
												  $ten=$row["ten"]; ?>
			  	    <tr>
			  	      
			  	      <td valign="top" align="left"><?php echo "$i. $ten"; ?></p></td>
			  	      <td align="center" valign="middle"><?php if(isset($user)){?><a href="download.php?bien=<?php echo $id ?>&filename=<?php echo $duongdan ?>"><?php }else{ ?><a href="index.php?frame=dangky"/><?php } ?><img src="http://www.phapamthuongchuyen.com/images/skin/icondown-boxnhac.gif" width="9" height="11" align="absmiddle" title="Tải file"></a></td>
					  <td align="center" valign="middle"><?php echo $luotdownlaod ?> Lần </td>
		  	        </tr>
					<?php }} ?>
	  	        </tbody></table>
							
							
							
							</div></div>
							<div class="news-author">
								<div class="news-tools">		
									
								</div>
								<p>Nguồn từ: Nguyên Phong</p>
							</div>
					

							
   Lưu ý: Quý phật tử muốn tải file  Vui lòng <a href="index.php?frame=dangky">đăng nhập</a> hoặt <a href="index.php?frame=dangky">đăng ký </a> để tải file 
	




</div></div></div>
	
	
	
							
					