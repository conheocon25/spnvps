<div class="span8 fix-width">
<?php 
require './ketnoi.php';
$a=$_GET['id'];
$sql="select * from tuthien_ct i,users u where i.id='$a' and u.id=i.created_by";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $id=$row["id"];
                                                  $title=$row["title"];
												  $img=$row["img"];
												  $createdd=$row["created"];		 
										$date = explode('-', $createdd); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$created="$day-$month-$year";
												  $shottext=$row["shottext"];
												  $fulltext=$row["fulltext"];
												  $published=$row["published"];
												  $name=$row["hoten"];
												  $hits=$row["hits"];
												   $hitst=$hits+1;
												  $idcategories=$row["idcategories"];
												  if(isset($a)){mysql_query("update  tuthien_ct set hits='$hitst' where id='$a'");}
												  
												  ?>
			
					<div class="box radius">
						<div class="page-header pg-header pg-header-news reset-margin">
							<h4 class="reset-margin"><?php echo "$title"; ?></h4>
							<i class="pull-right">Cập nhật: <span><?php echo "$created"; ?></span></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-main"><div align="left"><?php echo "$fulltext"; ?></div></div>
							<div class="news-author">
								<div class="news-tools">
									
									 <a class="btn btn-primary pull-right" href="" target="_blank"><i class="icon-hand-up icon-white"></i><?php echo "$hits Lượt xem"; ?></a>
								</div>
								<p>Tin và ảnh: <?php echo "$name"; ?></p><p><div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=webchua"></script></p>
							</div>
							
							<ul class="nav nav-tabs nav-stacked reset-margin">
								<li class="active news-list-title"><a>Các bài khác</a></li>
								
								<?php 
 require './ketnoi.php';
$sql2="select * from tuthien_ct where idcategories='$idcategories' and published='1' order by id desc limit 8";
$kq2=mysql_query($sql2);
                                            if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
                                                  $id=$row2["id"];
                                                  $title=$row2["title"];
												   $createdd=$row2["created"];		 
										$date = explode('-', $createdd); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$created="$day-$month-$year";
												   ?>
								<li class="news-list-item">
									<a href="tu-thien-chi-tiet<?php echo $id ?>">
										<span><?php echo "$title"; ?></span>
										<span><?php echo "$created"; ?></span>
										<i class="icon-chevron-right pull-right"></i>
									</a>
								</li>
								
								
								<?php }} ?>
							</ul>
						</div>
					</div>

				</div>