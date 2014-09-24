<div class="span8 fix-width">
<?php 
require './ketnoi.php';
$a=$_GET['id'];
$sql="select * from hoidapct where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$id=$row["id"];
                                                  $hoten=$row["hoten"];
												  $chude=$row["chude"];
												  $cauhoi=$row["cauhoi"];
												  
												$ngayhoi=$row["ngayhoi"];
												 
												   
										$date = explode('-', $ngayhoi); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$kt="$day-$month-$year";
										
									
												
												  
												  ?>
			
					<div class="box radius">
						<div class="page-header pg-header pg-header-event reset-margin">
							<h4 class="reset-margin">Các thảo luận về câu hỏi của "<?php echo $hoten ?>"</h4>
							<i class="pull-right">Ngày hỏi: <span><?php echo "$kt"; ?></span></i>
						</div>
						<div class="b-content news-content padding-content">
							
							<div class="news-author">
								<div class="news-tools">
									<a class="btn btn-primary pull-right" href="tra-loi-cau-hoi<?php echo $a ?>"><i class="icon-thumbs-up icon-white"></i> Trả lời</a> 
								</div>
								<p>Nội dung câu hỏi: <?php echo $cauhoi ?></p>
							</div>
							
							<ul class="nav nav-tabs nav-stacked reset-margin">
								<li class="active news-list-title"><a>Các câu trả lời</a></li>
								
								<?php 
 require './ketnoi.php';
$sql2="select * from hoidaptraloi where idcauhoi ='$a' order by id desc";
$kq2=mysql_query($sql2);
                                            if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
                                                  $idcauhoi=$row2["idcauhoi"];
                                                  $traloi=$row2["traloi"];
												  $nguoitraloi=$row2["nguoitraloi"];
												  $ngaytl=$row2["ngaytl"];
												   
										$date = explode('-', $ngaytl); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$kt="$day-$month-$year";
										
										
												   ?>
								<li class="news-list-item">
									<a>
										<span>Người trả lời :<?php echo "$nguoitraloi"; ?></span><br />
										<span>Nội dung: <?php echo "$traloi"; ?></span><br />
										<span><?php echo "Thời gian trả lời : $kt"; ?></span>
										<i class="icon-chevron-right pull-right"></i>
									</a>
								</li>
								
								
								<?php }} ?>
							</ul>
						</div>
					</div>

				</div>