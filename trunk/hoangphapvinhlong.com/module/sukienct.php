<div class="span8 fix-width">
<?php 
require './ketnoi.php';
$a=$_GET['id'];
$sql="select * from event where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);$id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												  $imgbg=$row["imgbg"];
												  
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
										$h = $date2[3]; 
										$p = $date2[4]; 
										$s = $date2[5];
										$bd="$day2-$month2-$year2-$h-$p-$s";
												
												  
												  ?>
			
					<div class="box radius">
						<div class="page-header pg-header pg-header-event reset-margin">
							<h4 class="reset-margin"><?php echo "$tieude"; ?></h4>
							<i class="pull-right">Bắt đầu: <span><?php echo "$bd"; ?></span></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-main"><div align="left"><?php echo "$noidung"; ?></div></div>
							<div class="news-author">
								<div class="news-tools">
									
								</div>
								<p>Tin và ảnh: Chùa Phù Châu  <div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=webchua"></script></p>
							</div>
							
							<ul class="nav nav-tabs nav-stacked reset-margin">
								<li class="active news-list-title"><a>Các sự kiện khác</a></li>
								
								<?php 
 require './ketnoi.php';
$sql2="select * from event order by id desc limit 15";
$kq2=mysql_query($sql2);
                                            if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
                                                  $id=$row2["id"];
                                                  $tieude=$row2["tieude"];
												  $thoigianbd=$row2["thoigianbd"];
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
										$h = $date2[3]; 
										$p = $date2[4]; 
										$s = $date2[5];
										$bd="$day2-$month2-$year2 $h:$p:$s";
												   ?>
								<li class="news-list-item">
									<a href="chi-tiet-su-kien<?php echo $id ?>">
										<span><?php echo "$tieude"; ?></span>
										<span><?php echo "Thời gian từ : $bd"; ?></span>
										<i class="icon-chevron-right pull-right"></i>
									</a>
								</li>
								
								
								<?php }} ?>
							</ul>
						</div>
					</div>

				</div>