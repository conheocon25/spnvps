<div class="span8 fix-width">
<?php 
require './ketnoi.php';
$a=$_GET['id'];
$sql="select * from daotao where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                 $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $img=$row["imgbg"];
												   $thoigianbd=$row["thoigianbd"];
												  $thoigiankt=$row["thoigiankt"];
												   
										$date = explode('-', $thoigiankt); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$kt="$day-$month-$year";
										
										$date2 = explode('-', $thoigianbd); 
										$day2 = $date2[2]; 
										$month2 = $date2[1]; 
										$year2 = $date2[0];
										$bd="$day2-$month2-$year2";
												  
												 
												  
												  ?>
			
					<div class="box radius">
						<div class="page-header pg-header pg-header-event reset-margin">
							<h4 class="reset-margin"><?php echo "$tieude"; ?></h4>
							<i class="pull-right">Bắt đầu: <span><?php echo "$bd"; ?> - Kết thúc: <span><?php echo "$kt"; ?></span></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-main"><div align="left"><?php echo "$noidung"; ?></div></div>
							<div class="news-author">
								<div class="news-tools">
									<a class="btn btn-success pull-right" href="https://www.facebook.com/sharer/sharer.php?u=http://chuakhaituong.com/tin-tuc/phong-kham-dong-y" target="_blank"><i class="icon-share icon-white"></i> Chia sẻ</a>
									<a class="btn btn-primary pull-right" href="https://www.facebook.com/sharer/sharer.php?u=http://chuakhaituong.com/tin-tuc/phong-kham-dong-y" target="_blank"><i class="icon-thumbs-up icon-white"></i> Thích</a>
								</div>
								<p>Tin và ảnh: Chùa Long Viễn</p>
							</div>
							
							<ul class="nav nav-tabs nav-stacked reset-margin">
								<li class="active news-list-title"><a>Các bài khác</a></li>
								
								<?php 
 require './ketnoi.php';
$sql2="select * from daotao order by id desc";
$kq2=mysql_query($sql2);
                                            if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
                                                  $id=$row2["id"];
                                                  $title=$row2["tieude"];
												   $createdd=$row2["created"];		 
										
												   ?>
								<li class="news-list-item">
									<a href="?frame=daotaoct&id=<?php echo $id; ?>">
										<span><?php echo "$title"; ?></span>
										
										<i class="icon-chevron-right pull-right"></i>
									</a>
								</li>
								
								
								<?php }} ?>
							</ul>
						</div>
					</div>

				</div>