<div class="span8 fix-width">
<?php 
require './ketnoi.php';
$a=$_GET['id'];
$sql="select * from thongbao";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												  $createdd=$row["created"];	
												   $img=$row["img"];	 
										$date = explode('-', $createdd); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$created="$day-$month-$year";
												
												  
												  ?>
			
					<div class="box radius">
						<div class="page-header pg-header pg-header-news reset-margin">
							<h4 class="reset-margin"><?php echo "$tieude"; ?></h4>
							<i class="pull-right">Cập nhật: <span><?php echo "$created"; ?></span></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-main"><div align="left"><?php echo "$noidung"; ?><img src="<?php echo "$img"; ?>"/></div></div>
							<div class="news-author">
								<div class="news-tools">
									
								</div>
								<p>Tin và ảnh: <?php 
 require './ketnoi.php';
$sql2="select * from users where quyen='1'";
$kq2=mysql_query($sql2);
$row2=mysql_fetch_array($kq2);
$hoten=$row2["hoten"];
echo $hoten; ?>
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=webchua"></script>


</p>
							</div>
							
							<ul class="nav nav-tabs nav-stacked reset-margin">
								<li class="active news-list-title"><a>Các bài khác</a></li>
								
								<?php 
 require './ketnoi.php';
$sql2="select * from thongbao order by id desc";
$kq2=mysql_query($sql2);
                                            if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
                                                  $id=$row2["id"];
                                                  $tieude=$row2["tieude"];
												   $createdd=$row2["created"];		 
										$date = explode('-', $createdd); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$created="$day-$month-$year";
												   ?>
								<li class="news-list-item">
									<a href="thong-bao-chi-tiet<?php echo $id; ?>">
										<span><?php echo "$tieude"; ?></span>
										<span><?php echo "$created"; ?></span>
										<i class="icon-chevron-right pull-right"></i>
									</a>
								</li>
								
								
								<?php }} ?>
							</ul>
						</div>
					</div>

				</div>