<div class="span8 fix-width">
				
					<div class="box radius">
					
					<?php 
$a=$_GET["id"];
require 'ketnoi.php';
$sql="select*from anhhoatdong where id='$a'";
$kq=mysql_query($sql);
                                        $row=mysql_fetch_array($kq);
                                                
                                                  $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												  $ngay=$row["ngay"];
												  $date = explode('-', $ngay); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$ht="$day-$month-$year";
						
						?> 	
						<div class="page-header pg-header pg-header-picture reset-margin">
							<h4 class="reset-margin"><?php echo $tieude ?></h4>
							<i class="pull-right">Cập nhật: <span><?php echo $ht ?></span></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-main">
								<?php echo $noidung ?>
								
							</div>
							<div class="news-author"></div>
							
							<ul class="nav nav-tabs nav-stacked reset-margin">
								<li class="active news-list-title"><a>Hình ảnh khác</a></li>
								<?php 
 require 'ketnoi.php';
$sql="select*from anhhoatdong order by id desc";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												  $ngay=$row["ngay"];
												  $date = explode('-', $ngay); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$ht="$day-$month-$year"; 
												   ?>
						
						<li class="news-list-item">
									<a href="anh-hoat-dong<?php echo $id ?>">
										<span><?php echo $tieude ?></span>
										<span><?php echo $ht ?></span>
										<i class="icon-chevron-right pull-right"></i>
									</a>
								</li>
						<?php }} ?>
								
							</ul>
						</div>
					</div>
					
				</div>