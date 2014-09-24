<div class="span8 fix-width">				
<div id="da-slider" class="da-slider">
<?php  require './ketnoi.php'; 
$sqltc="select * from  sidletrangchu order by maside desc limit 8";
												$kqtc=mysql_query($sqltc);
												if(mysql_num_rows($kqtc)!=0)
												{
													while($rowtc=mysql_fetch_array($kqtc))
													{	
																$maside=$rowtc["maside"];	
																$tieudeside=$rowtc["tieudeside"];	
																$noidungside=$rowtc["noidungside"];
																$hinhanhside=$rowtc["hinhanhside"];
																$linkside=$rowtc[linkside];																
																echo"<div class=\"da-slide\">";
																echo"<h2><a href=$linkside>";
																echo mb_substr($tieudeside,0,40,'UTF-8');
																echo"...</a></h2><p>";	
																echo  mb_substr($noidungside,0,245,'UTF-8');echo"...";
																echo"</p>"; ?>
																<a href="<?php echo $linkside ?>" class="da-link">Xem thêm
																</a>
<?php																
																echo"<a href=$linkside><img class=\"da-img\" src=\"$hinhanhside\" height=\"100px\" alt=\"$tieudeside\"/></a>";	
																echo"</div>";
													}
												}
												?>
				
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
		
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 2000
				});
			
			});
		</script>	
	
	
	<div class="accordion accordion-fix" id="accordion3">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-videotc">Giảng sư Hoằng Pháp Vĩnh Long</div>
							<div class="b-t-icon-xemtatca"><a href="giang-su-tat-ca" title="Xem tất cả pháp âm của giảng sư Thích Phước Tiến">Xem thêm</a></div>
							<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="accordion11tt" href="#collapse32ttt"></a>	
							</div>
							<div class="accordion-body collapse in b-content"  id="collapse32ttt">
					<ul class="thumbnails grid-item reset-margin">
					<table><tr><td width='170px' valign="top">
<div class="menu-left">
        <div class="menu-left-bottom ">
            <div class="menutitle">
               Hoằng pháp Vĩnh Long
            </div>
            <ul class="submenu">
                   
					
					<?php 
 require 'ketnoi.php';
$sql="select*from giangsu gs,video_categories ca where gs.magiangsu=ca.giangsu and ca.tinhthanh='1' group by ca.giangsu order by gs.magiangsu asc";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $magiangsu=$row["magiangsu"];
                                                  $tengiangsu=$row["tengiangsu"];
												  $linkgiangsu=$row["linkgiangsu"];
												  
												   ?>
						<li>
						<p style="text-align:left"><a href="#" data-flexmenu="flexmenu<?php echo $magiangsu; ?>" data-dir="h" data-offsets="8,0"><?php echo $tengiangsu; ?></a></p>
						</li>
						<?php 
 require 'ketnoi.php';
$sqlp="select * from video_phanloai pl,video_categories ca,giangsu gs,tinhthanh tt where gs.magiangsu=ca.giangsu and pl.maloai=ca.phanloai and tt.matinh=ca.tinhthanh and tt.matinh='1' and ca.congbo='1' and ca.chuyende!='1' and ca.giangsu='$magiangsu' order by ca.giangsu desc";
$kqp=mysql_query($sqlp); ?>
<ul id="flexmenu<?php echo $magiangsu; ?>" class="flexdropdownmenu"><?php 
$i=0;
                                            if(mysql_num_rows($kqp)!=0)
                                            {
                                                while($rowp=mysql_fetch_array($kqp))
                                                {
												$i=$i+1;
                                                  $magiangsu=$rowp["magiangsu"];
                                                  $tengiangsu=$rowp["tengiangsu"];
												   $linkgiangsu=$rowp["linkgiangsu"];
												   $name=$rowp["name"];
												   $idgs=$rowp[4];	
																
																$maloai=$rowp["maloai"];															
																$linkca=$rowp["linkca"];
																$linkpl=$rowp["linkpl"];
												  
												   ?>
						
<li><a href="<?php echo $maloai ?>-<?php echo $idgs ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>"><?php echo $i; ?>.<?php echo $name; ?></a></li>

						<?php }} ?>
						</ul>
						
						<?php }} ?>
       </ul>                 
                    
           
        </div>
    </div>					
					
					</td><td>
					<?php  require './ketnoi.php'; $sql55="select * from video_phanloai pl,video_categories ca1,giangsu gs,tinhthanh tt where gs.magiangsu=ca1.giangsu and pl.maloai=ca1.phanloai and tt.matinh=ca1.tinhthanh and tt.matinh='1' and ca1.congbo='1' and ca1.chuyende!='1' order by ca1.sapxep asc limit 6";
												$kq55=mysql_query($sql55);
												if(mysql_num_rows($kq55)!=0)
												{
													while($row55=mysql_fetch_array($kq55))
													{	
																$idgs=$row55[4];	
																$name=$row55["name"];
																$maloai=$row55["maloai"];																
																$img=$row55["img"];
																$tentinh=$row55["tentinh"];																
																$linkca=$row55["linkca"];
																$linkpl=$row55["linkpl"];																	
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="<?php echo $maloai ?>-<?php echo $idgs ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>" onMouseOver="Tip('<?php echo $name ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $img ?>">
												<p><?php echo  $name ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
								</ul></td></tr></table>
							
							
							</div>
						</div>
					</div>
					
					
					<div class="accordion accordion-fix" id="accordion45">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-videotc">Giảng sư ngoài tỉnh</div>
								<!-- <div class="b-t-icon-xemtatca"><a href="giang-su-tat-ca" title="Xem tất cả pháp âm của giảng sư Thích Phước Tiến">Xem tất cả</a></div> -->
							</div>
					<ul class="thumbnails grid-item reset-margin">
					<table><tr><td width='170px' valign="top">
<div class="menu-left">
        <div class="menu-left-bottom ">
            <div class="menutitle">
               Giảng sư ngoài tỉnh
            </div>
            <ul class="submenu">
                   
					
					<?php 
 require 'ketnoi.php';
$sqlnt1="select*from giangsu gs,video_categories ca where gs.magiangsu=ca.giangsu and ca.tinhthanh!=1 group by ca.giangsu order by magiangsu asc";
$kqnt1=mysql_query($sqlnt1);
                                            if(mysql_num_rows($kqnt1)!=0)
                                            {
                                                while($rownt1=mysql_fetch_array($kqnt1))
                                                {
                                                  $magiangsunt1=$rownt1["magiangsu"];
                                                  $tengiangsunt1=$rownt1["tengiangsu"];
												 
												  
												   ?>
						<li>
						<p style="text-align:left"><a href="#" data-flexmenu="flexmenu1<?php echo $magiangsunt1; ?>" data-dir="h" data-offsets="8,0"><?php echo $tengiangsunt1; ?></a></p>
						</li>
						<?php 
 require 'ketnoi.php';
$sqlnt2="select * from video_phanloai pl,video_categories ca,giangsu gs,tinhthanh tt where gs.magiangsu=ca.giangsu and pl.maloai=ca.phanloai and tt.matinh=ca.tinhthanh and tt.matinh!=1 and ca.congbo='1' and ca.chuyende!='1' and ca.giangsu='$magiangsunt1' order by ca.giangsu desc";
$kqnt2=mysql_query($sqlnt2); ?>
<ul id="flexmenu1<?php echo $magiangsunt1; ?>" class="flexdropdownmenu"><?php 
$i=0;
                                            if(mysql_num_rows($kqnt2)!=0)
                                            {
                                                while($rownt2=mysql_fetch_array($kqnt2))
                                                {
												$i=$i+1;
                                                  $magiangsunt2=$rownt2["magiangsu"];
                                                  $tengiangsunt2=$rownt2["tengiangsu"];
												   $linkgiangsunt2=$rownt2["linkgiangsu"];
												   $nament2=$rownt2["name"];
												   $idgsnt2=$rownt2[4];	
																
																$maloaint2=$rownt2["maloai"];															
																$linkcant2=$rownt2["linkca"];
																$linkplnt2=$rownt2["linkpl"];
												  
												   ?>
						
<li><a href="<?php echo $maloaint2 ?>-<?php echo $idgsnt2 ?>-<?php echo $linkplnt2 ?>-<?php echo $linkcant2 ?>"><?php echo $i; ?>.<?php echo $nament2; ?></a></li>

						<?php }} ?>
						</ul>
						
						<?php }} ?>
       </ul>                 
                    
           
        </div>
    </div>					
					
					</td><td>
					
								<?php  require './ketnoi.php'; $sql5r="select * from video_phanloai pl,video_categories ca,giangsu gs,tinhthanh tt where gs.magiangsu=ca.giangsu and pl.maloai=ca.phanloai and tt.matinh=ca.tinhthanh and tt.matinh!='1' and ca.congbo='1' and ca.chuyende!='1' order by ca.sapxep asc limit 6";
												$kq5r=mysql_query($sql5r);
												if(mysql_num_rows($kq5r)!=0)
												{
													while($row5r=mysql_fetch_array($kq5r))
													{	
																$idgs=$row5r[4];	
																$name=$row5r["name"];
																$maloai=$row5r["maloai"];																
																$img=$row5r["img"];
																$tentinh=$row5r["tentinh"];																
																$linkca=$row5r["linkca"];
																$linkpl=$row5r["linkpl"];																	
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="<?php echo $maloai ?>-<?php echo $idgs ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>" onMouseOver="Tip('<?php echo $name ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $img ?>">
												<p><?php echo  $name ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
								</ul></td></tr></table>
							
							
							
						</div>
					</div>
					<div class="accordion accordion-fix" id="accordion32">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-videotctd">Tiêu Điểm</div>
							</div>
							
							<div class="accordion-body collapse in b-content" >
											
	<div class="row reset-margin footer4">
											<marquee direction="left"  scrollamount="6" onMouseOver="this.stop()" onMouseOut="this.start()">
				<?php 
 require './ketnoi.php';
$sql2="select*from content_items i, content_categories ca  where ca.id=i.idcategories and i.noibac='1' and ca.published='1' order by i.id desc limit 10";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
											
                                                while($row2=mysql_fetch_array($kq2))
                                                {
												  $img=$row2["img"];
												  $link=$row2["link"];
												  $title=$row2["title"];
												  $id=$row2[0];
												 ?>
												  
											<a href="tin-tuc-chi-tiet-<?php echo $id ?>-<?php echo $link ?>" onMouseOver="Tip('<?php echo $title ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $img ?>" title="<?php echo $title ?>">
												
											</a> <?php
											
											
											 }} 
											 
											 
											 require './ketnoi.php';
$sql2="select*from  video_categories ca, video_phanloai pl,video_video vi  where pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo='1' and vi.noibac='1' order by vi.id desc limit 10";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
											
                                                while($row2=mysql_fetch_array($kq2))
                                                {
												  $imgbg=$row2["imgbg"];
												  $title=$row2["title"];
												  $id=$row2[12];
												  $maloai=$row2["maloai"];
												  $linkca=$row2["linkca"];	
																$linkvi=$row2["linkvi"];	
												 ?>
												  
											<a href="video-<?php echo $maloai ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>" onMouseOver="Tip('<?php echo $title ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $imgbg ?>" title="<?php echo $title ?>">
												
											</a> <?php
											
											
											 }}
											 
											 
											 
											 
											 ?></marquee></div>
							</div>
						</div>
					</div>	

<div class="accordion accordion-fix" id="accordion11tt">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-content">Tin Tức phật giáo Trong Tỉnh</div>
								<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="accordion11tt" href="#collapse32tt"></a>
							</div>
							<div class="accordion-body collapse in b-content"  id="collapse32tt">
								<div class="row reset-margin">
								
									
									
											
											
											
											<table><tr><td width='170px' valign="top">
<div class="menu-left">
        <div class="menu-left-bottom ">
            <div class="menutitle">
               Tin tức trong tỉnh
            </div>
            <ul class="submenu">                   
					
					<?php 
 require 'ketnoi.php';
$sql="select*from content_categories where published = '1' and id >= 100";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                 $id=$row["id"];
                                                  $name=$row["name"];
												  
												   ?>
						<li>
							<a href="tin-tuc<?php echo $id ?>"><?php echo $name; ?></a>
						</li>
						<?php }} ?>
       </ul>                 
                    
           
        </div>
    </div>					
					
					</td><td width='500px' valign="top">
		
		
										
							
									<div class="spantttctt reset-margin pull-right news-list">
										<ul class="nav nav-tabs nav-stacked">
											<li class="active news-list-title"><a>MỚI CẬP NHẬT <img src="./images/new.gif" /></a></li>
											<?php  require './ketnoi.php'; $sql44="select * from content_items ct,content_categories ca where ca.id=ct.idcategories and ca.id >=100 order by ct.id desc limit 8";
												$kq44=mysql_query($sql44);
												if(mysql_num_rows($kq44)!=0)
												{
													while($row44=mysql_fetch_array($kq44))
													{	
																$idc24=$row44[0];	
																$link=$row44["link"];
																$img2=$row44["img"];	
																$title2=$row44["title"];	?>
												<li class="news-list-item">
												<a href="tin-tuc-chi-tiet-<?php echo $idc24 ?>-<?php echo $link ?>"><?php echo  mb_substr($title2,0,45,'UTF-8');echo"..."; ?></a>
											</li>
											
												<?php }} ?>
											
										</ul>
									</div></td></tr></table>
								</div>
							</div>
						</div>
					</div>					
<?php 
 require './ketnoi.php';
$sql2="select * from content_categories where published = '1' and id < 100";
$kq2=mysql_query($sql2);
                                            if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
                                                 $id=$row2["id"];
												 $name=$row2["name"];	
					?>
					<div class="accordion accordion-fix" id="<?php echo "accordion1$id"; ?>">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-content"><?php echo $name ?></div>
								<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="<?php echo "accordion1$id"; ?>" href="#<?php echo "collapse1$id"; ?>"></a>
							</div>
							<div class="accordion-body collapse b-content"  id="<?php echo "collapse1$id"; ?>" >
								<div class="row reset-margin">
								
									<div class="span4 reset-margin">
									<div class="carousel slide carousel-fade img-polaroid news-slide">
											<div class="carousel-inner">
			<?php  require './ketnoi.php'; $sql3="select * from content_items where idcategories='$id' order by id  desc limit 6";
												$kq3=mysql_query($sql3);
												if(mysql_num_rows($kq3)!=0)
												{ 
												$i=0;
												while($row3=mysql_fetch_array($kq3))
													{	
																$idc=$row3["id"];	
																$img=$row3["img"];	
																$link=$row3["link"];	
																$title=$row3["title"];
																$i=$i+1;
																if($i==1)
																{?>
												<div class="item active">													
													<a href="tin-tuc-chi-tiet-<?php echo $idc ?>-<?php echo $link ?>" onMouseOver="Tip('<?php echo $title ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
														<img src="<?php echo $img ?>">
														<div class="carousel-caption">
															<p> <?php echo $title ?></p>
														</div>
													</a>
												</div>
												<?php }else{?>
												<div class="item">
													<a href="tin-tuc-chi-tiet-<?php echo $idc ?>-<?php echo $link ?>" onMouseOver="Tip('<?php echo $title ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
														<img src="<?php echo $img ?>">
														<div class="carousel-caption">
															<p> <?php echo $title ?></p>
														</div>
													</a>
												</div>
			
											
												<?php }}} ?> 
		
		</div> </div>						
										
										
											
		
			
		
												
										
										
										
										
										
									</div>
									<div class="spantttc reset-margin pull-right news-list">
										<ul class="nav nav-tabs nav-stacked">
											<li class="active news-list-title"><a>MỚI CẬP NHẬT <img src="./images/new.gif" /></a></li>
											<?php  require './ketnoi.php'; $sql4="select * from content_items where idcategories='$id' order by id desc limit 6";
												$kq4=mysql_query($sql4);
												if(mysql_num_rows($kq4)!=0)
												{
													while($row4=mysql_fetch_array($kq4))
													{	
																$idc2=$row4["id"];	
																$link=$row4["link"];
																$img2=$row4["img"];	
																$title2=$row4["title"];	?>
												<li class="news-list-item">
												<a href="tin-tuc-chi-tiet-<?php echo $idc2 ?>-<?php echo $link ?>"><?php echo  mb_substr($title2,0,45,'UTF-8');echo"..."; ?></a>
											</li>
											
												<?php }} ?>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php }}?>
						
					<div class="accordion accordion-fix" id="accordion4">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-videotc">Bài giảng mới nhất</div>
								<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion4" href="http://chualongvien.com/#collapse4"></a>
							</div>
							<div id="collapse4" class="accordion-body collapse b-content">
								<ul class="thumbnails grid-item reset-margin">
								<?php  require './ketnoi.php'; $sql5="select * from video_video vi,video_phanloai pl,video_categories ca where pl.maloai !='3' and pl.maloai!='4' and pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo=1 and ca.congbo=1 and ca.chuyende!=1 and vi.noibac='1' order by vi.id desc limit 4";
												$kq5=mysql_query($sql5);
												if(mysql_num_rows($kq5)!=0)
												{
													while($row5=mysql_fetch_array($kq5))
													{	
																$idc5=$row5[0];	
																$img5=$row5["imgbg"];	
																$title5=$row5["title"];	
																$maloai=$row5["maloai"];
																$linkca=$row5["linkca"];	
																$linkvi=$row5["linkvi"];	
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="video-<?php echo $maloai ?>-<?php echo $idc5 ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
												<img src="<?php echo $img5 ?>">
												<p><?php echo  $title5; ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
												<?php  require './ketnoi.php'; $sql5="select * from video_video vi,video_phanloai pl,video_categories ca where pl.maloai !='3' and pl.maloai!='4' and pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo=1 and ca.congbo=1 and ca.chuyende!=1 and vi.noibac!=1 order by vi.id desc limit 8";
												$kq5=mysql_query($sql5);
												if(mysql_num_rows($kq5)!=0)
												{
													while($row5=mysql_fetch_array($kq5))
													{	
																$idc5=$row5[0];	
																$img5=$row5["imgbg"];	
																$title5=$row5["title"];	
																$maloai=$row5["maloai"];
																$linkca=$row5["linkca"];	
																$linkvi=$row5["linkvi"];	
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="video-<?php echo $maloai ?>-<?php echo $idc5 ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>" onMouseOver="Tip('<?php echo $title5 ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $img5 ?>">
												<p><?php echo  $title5; ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
								
								
								</ul>
							</div>
						</div>
					</div>
					
					<div class="accordion accordion-fix" id="accordion5">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-videotc">Chuyên đề mới nhất</div>
								<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion5" href="http://chualongvien.com/#collapse5"></a>
							</div>
							<div id="collapse5" class="accordion-body collapse b-content">
								<ul class="thumbnails grid-item reset-margin">
									<?php  require './ketnoi.php'; $sql5="select * from video_video vi,video_phanloai pl,video_categories ca where  pl.maloai!='4' and pl.maloai=ca.phanloai and ca.id=vi.category and ca.chuyende='1' and vi.congbo=1 and ca.congbo=1 and vi.noibac='1' order by vi.id desc limit 4";
												$kq5=mysql_query($sql5);
												if(mysql_num_rows($kq5)!=0)
												{
													while($row5=mysql_fetch_array($kq5))
													{	
																$idc5=$row5[0];	
																$img5=$row5["imgbg"];	
																$title5=$row5["title"];	
																$phanloai=$row5["phanloai"];	
																$linkca=$row5["linkca"];	
																$linkvi=$row5["linkvi"];	
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="video-<?php echo $phanloai ?>-<?php echo $idc5 ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>" onMouseOver="Tip('<?php echo $title5 ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $img5 ?>">
												<p><?php echo  $title5 ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
												
												<?php  require './ketnoi.php'; $sql5="select * from video_video vi,video_phanloai pl,video_categories ca where  pl.maloai!='4' and pl.maloai=ca.phanloai and ca.id=vi.category and ca.chuyende='1' and vi.congbo=1 and ca.congbo=1 and vi.noibac!=1 order by vi.id desc limit 8";
												$kq5=mysql_query($sql5);
												if(mysql_num_rows($kq5)!=0)
												{
													while($row5=mysql_fetch_array($kq5))
													{	
																$idc5=$row5[0];	
																$img5=$row5["imgbg"];	
																$title5=$row5["title"];	
																$phanloai=$row5["phanloai"];	
																$linkca=$row5["linkca"];	
																$linkvi=$row5["linkvi"];	
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="video-<?php echo $phanloai ?>-<?php echo $idc5 ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>" onMouseOver="Tip('<?php echo $title5 ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $img5 ?>">
												<p><?php echo  $title5 ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
								</ul>
							</div>
						</div>
					</div>


<div class="accordion accordion-fix" id="accordion133">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-videotc">Album Audio mới</div>
								<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion133" href="http://chualongvien.com/#collapse133"></a>
							</div>
							<div id="collapse133" class="accordion-body collapse b-content">
								<ul class="thumbnails grid-item reset-margin">
								<?php  require './ketnoi.php'; $sql5="select * from album al,theloaialbum tl where tl.id=al.idtheloai and al.noibac=1 order by al.id desc limit 4";
												$kq5=mysql_query($sql5);
												if(mysql_num_rows($kq5)!=0)
												{
													while($row5=mysql_fetch_array($kq5))
													{	
																$ten=$row5[1];
												  $id=$row5[0];
												  $hinhbg=$row5["hinhbg"];
                                                
												  $linkal=$row5["linkal"];
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>" onMouseOver="Tip('<?php echo $ten ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $hinhbg ?>">
												<p><?php echo  $ten; ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
														
												
												<?php  require './ketnoi.php';$sql6="select * from album al,theloaialbum tl where tl.id=al.idtheloai and al.noibac !=1 order by al.id desc limit 8";
												$kq6=mysql_query($sql6);
												if(mysql_num_rows($kq6)!=0)
												{
													while($row6=mysql_fetch_array($kq6))
													{	
																	$ten=$row6[1];
												  $id=$row6[0];
												  $hinhbg=$row6["hinhbg"];
                                                
												  $linkal=$row6["linkal"];
																?>
															<li class="span2">
										<div class="thumbnail">
											<a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>" onMouseOver="Tip('<?php echo $ten ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $hinhbg ?>">
												<p><?php echo  $ten; ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
												
								
									
								</ul>
							</div>
						</div>
					</div>


  <div class="accordion accordion-fix" id="accordion233">
    <div class="accordion-group box radius">
      <div class="accordion-heading b-title clearfix">
        <div class="b-t-icon-videotc">Album video new</div>
        <a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion233" href="http://chualongvien.com/#collapse233"></a>
      </div>
      <div id="collapse233" class="accordion-body collapse b-content">
        <ul class="thumbnails grid-item reset-margin">
          <?php  require './ketnoi.php'; $sql15="select * from albumvideo al,theloaialbumvideo tl where tl.id=al.idtheloai and al.noibac=1 order by al.id desc limit 4";
												$kq15=mysql_query($sql15);
												if(mysql_num_rows($kq15)!=0)
												{
													while($row15=mysql_fetch_array($kq15))
													{	
																$ten=$row15[1];
												  $id=$row15[0];
												  $hinhbg=$row15["hinhbg"];
                                                
												  $linkal=$row15["linkal"];
																?>
          <li class="span2">
            <div class="thumbnail">
              <a href="xem-album<?php echo $id ?>-<?php echo $linkal ?>" onMouseOver="Tip('<?php echo $ten ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
                <img src="<?php echo $hinhbg ?>">
                <p>
                  <?php echo  $ten; ?>
                </p>
              </a>
            </div>
          </li>

          <?php				
													}
												}
												?>


          <?php  require './ketnoi.php';$sql16="select * from albumvideo al,theloaialbumvideo tl where tl.id=al.idtheloai and al.noibac !=1 order by al.id desc limit 8";
												$kq16=mysql_query($sql16);
												if(mysql_num_rows($kq16)!=0)
												{
													while($rowt=mysql_fetch_array($kq16))
													{	
																	$ten=$rowt[1];
												  $id=$rowt[0];
												  $hinhbg=$rowt["hinhbg"];
                                                
												  $linkal=$rowt["linkal"];
																?>
          <li class="span2">
            <div class="thumbnail">
              <a href="xem-album<?php echo $id ?>-<?php echo $linkal ?>" onMouseOver="Tip('<?php echo $ten ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
                <img src="<?php echo $hinhbg ?>">
                <p>
                  <?php echo  $ten; ?>
                </p>
              </a>
            </div>
          </li>

          <?php				
													}
												}
												?>



        </ul>
      </div>
    </div>
  </div>

				</div>