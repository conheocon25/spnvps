<?php if($_GET["audio"]='audio'){ ?>
	
				<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Tổng hợp Audio phật pháp</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from theloaialbum where  theloai='bai-giang' order by sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row["id"];
$ten=$row["ten"];
												  
												  $linktheloai=$row["linktheloai"];
												  $theloai=$row["theloai"];
												  
												  $count= mysql_query("SELECT COUNT(id) FROM album where idtheloai='$id'");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="album-audio-album<?php echo $id ?>-<?php echo $linktheloai ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $ten ?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>		
				
				
									
				</div>
				
				
				
				<div class="span6 fix-width-3">
				<div class="accordion accordion-fix" id="accordion2">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-content">Album Nổi Bậc</div>
								<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"></a>
							</div>
							<div id="collapseOne" class="accordion-body collapse in b-content">
								<div class="carousel slide carousel-fade img-polaroid news-slide">
											<div class="carousel-inner">
											<?php  require './ketnoi.php'; $sql="select * from album al,theloaialbum tl where tl.id=al.idtheloai and al.noibac=1 order by al.id desc";
												$kq=mysql_query($sql);
												if(mysql_num_rows($kq)!=0)
												{
												$i=0;
													while($row=mysql_fetch_array($kq))
													{	
																$ten=$row[1];
												  $id=$row[0];
												  $hinhbg=$row["hinhbg"];
                                                
												  $linkal=$row["linkal"];
				
										
																$i=$i+1;
																if($i==1)
																{?>
															
												<div class="item active">													
													<a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>">
														<img src="<?php echo $hinhbg?>">
														<div class="carousel-caption">
															<p><?php echo $ten ?></p>
														</div>
													</a>
												</div>
												<?php }else{?>
												<div class="item">
													<a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>">
														<img src="<?php echo $hinhbg?>">
														<div class="carousel-caption">
															<p><?php echo $ten ?></p>
														</div>
													</a>
												</div>
												
											<?php	}}} ?>
											</div>
										</div>
							
							
							

			

			
			</div>
					</div></div>
					
				
				
				
				
				
				
				
				
					<div class="box radius">
						<div class="page-header pg-header pg-header-video reset-margin">
						<?php 
 require './ketnoi.php';
 $sql="select*from album order by id desc limit 1";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$id=$row["id"];
$mota=$row["mota"];
$ten=$row["ten"];
$linkal=$row["linkal"];
$luotxem=$row["luotxem"];
$count= mysql_query("SELECT sum(luottai) FROM baihat where idalbum='$id'");
$rowc=mysql_fetch_row($count);
?>
							<h4 class="reset-margin"> Album mới nhất</h4> 
							<i class="pull-right"></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="img-polaroid"><img src="./images/1.jpg" class="nenaudio" />
									<embed type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="never" src="nhac/mediaplayer.swf?file=nhac/chay.php?id=<?php echo $id ?>&displayheight=50&backcolor=0x000000&frontcolor=0xFFFFFF&lightcolor=0xFFFFFF&showdigits=true&showeq=true&showfsbutton=true&autostart=false&shuffle=false&repeat=true;volume=100&height=400" width="100%" height="400" /></embed>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<strong>Thuộc album:</strong>
								
								
									<span><?php echo $ten ?><br/></span>
								
								
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo "$luotxem"; ?></span> lượt nghe
								</span>
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo $rowc['0']; ?></span> lượt tải
								</span>
								
							</div><div class="news-author monk-author"><p>
								
								<?php echo "$mota"; ?>
								
							</p></div>
							<div class="news-author monk-author">
							<div class="accordion accordion-fix" id="accordion2">
							<p>
<a class="btn btn-primary pull-right" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Ẩn/hiện bình luận</a></p></div></div>
<div id="collapseOne" class="accordion-body collapse in b-content">
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=webchua"></script>
<div class="carousel-inner">

						<?php
require './ketnoi.php';
				if ( $_GET['act'] == "do" )
	{

    $news_id = $_POST['news_id'];
	$link = $_POST['link'];
   $a=mysql_query("INSERT INTO comment_audio SET news_id='$news_id',
                                              author='".mysql_escape_string($_POST['author'])."',
                                              content='".mysql_escape_string($_POST['content'])."',
                                              date=NOW()");
			   if(isset($a)){
     echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Bình luận thành công. A di đà phật')";
                    echo"</script>";
					   echo "<script>window.location='nghe-album$news_id-$link'</script>";  
} else {
    echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình bình luận')";
                    echo"</script>";}
}
?>
        <?php
        $comment_req = mysql_query("SELECT * FROM comment_audio WHERE news_id='$id'");
        $nbre_comment = mysql_num_rows($comment_req);
        ?>
    <b>Có <?php echo $nbre_comment ?> Bình luận:</b><br />
        <?php while ($comment = mysql_fetch_array($comment_req)) {?>
           <b><i>Họ tên : <?php echo $comment['author'] ?> </i></b><br /><i>Bình luận ngày: <?php $date = explode('-',$comment['date']); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];$ht="$day-$month-$year"; echo $ht ?></i><br />
           Nội dung :  <?php echo $comment['content'] ?><br />
        <?php } ?>
<?php if(isset($user)){
$sql="select * from users where tennguoidung='$user'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$hoten=$row["hoten"];
$hinh=$row["hinh"];


 ?>

    <form method="POST" action="index.php?frame=audio&act=do" name="f1" onSubmit="return kiemtra();">
        <input type="hidden" name="news_id" value="<?php echo $id?>">
		<input type="hidden" name="link" value="<?php echo $linkal?>">
		<input type="hidden" name="author" value="<?php echo $hoten?>">
        <table border="0" width="100%">
		<tr>
        <td width="100%"><textarea name="content" rows="3" cols=""></textarea><img src="./<?php echo $hinh ?>" class="hinh" /><td>
		</tr>
		<tr>
        <td colspan="2" align="left"><input type="submit" name="submit" value="Bình Luận"></td>
		</tr>
		</table>
    </form><?php }else{ ?><br />Vui lòng <a href="index.php?frame=dangky">đăng nhập</a> hoặt <a href="index.php?frame=dangky">đăng ký </a> để lại bình luận <?php } ?>
	




</div></div>
							<div class="news-author monk-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-tags icon-white"></i>Album mới cập nhật
								</span>
							</p></div>
							<ul class="thumbnails grid-item-2 reset-margin"><?php 
 require './ketnoi.php';
$sql2="select*from album al,theloaialbum tl where tl.id=al.idtheloai order by al.id desc limit 30";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                  $ten=$row2[1];
												  $id=$row2[0];
												  $hinhbg=$row2["hinhbg"];
                                                
												  $linkal=$row2["linkal"];
												  
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>">
											<img src="<?php echo $hinhbg ?>">
											<p><?php echo substr($ten,0,55);echo"..."; ?></p>
										</a>
									</div>
								</li>
								
								<?php }} ?>
							</ul>
							
							
							
							
							
								<div class="news-author monk-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-tags icon-white"></i>Album được xem nhiều
								</span>
							</p></div>
							<ul class="thumbnails grid-item-2 reset-margin"><?php 
 require './ketnoi.php';
$sql2="select*from album al,theloaialbum tl where tl.id=al.idtheloai  order by al.luotxem desc limit 30";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                  $ten=$row2[1];
												  $id=$row2[0];
												  $hinhbg=$row2["hinhbg"];
                                                
												  $linkal=$row2["linkal"];
												  
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>">
											<img src="<?php echo $hinhbg ?>">
											<p><?php echo substr($ten,0,55);echo"..."; ?></p>
										</a>
									</div>
								</li>
								
								<?php }} ?>
							</ul>
							
						</div>
					</div>
				</div>
				
				
			
				
				
				<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-giangsu">Album Nhạc Audio</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
						<?php 
								
 require './ketnoi.php';
$sql="select*from theloaialbum where  theloai='nhac' order by sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row["id"];
												  $ten=$row["ten"];
												  $linktheloai=$row["linktheloai"];
												  $theloai=$row["theloai"];
												  
												  $count= mysql_query("SELECT COUNT(id) FROM album where idtheloai='$id'");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="album-audio-album<?php echo $id ?>-<?php echo $linktheloai ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $ten ?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>							
				</div>
				<?php 
				}else{} ?>
				<script language="javascript" type="text/javascript">
	function kiemtra(){
		if(document.f1.content.value=="")
	{	
		alert('Vui lòng điền đầy đủ thông tin vào');
		document.f1.content.focus();
		return false;
	}
	}
	</script>