<?php $a2=$_GET["id2"]; ?>
<?php $a1=$_GET["id1"]; ?>
<?php			
	if($a1!=3){?>

				<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Chuyên đề</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where pl.maloai=ca.phanloai and ca.phanloai='$a1' and ca.congbo=1 and ca.id=vi.category and ca.chuyende=1 and vi.congbo=1 group by vi.category order by ca.sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row[0];
												 $name=$row["name"];
												  $category=$row["category"];
												  $noibac=$row["noibac"];
												  $linkpl=$row["linkpl"];
												  $linkca=$row["linkca"];
												   $noibach=$row[4];
												  $count= mysql_query("SELECT COUNT(id) FROM video_video where category='$category' and congbo=1");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>					
				</div>
				<div class="span6 fix-width-3">
					<?php 
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a1' and pl.maloai=ca.phanloai and ca.congbo=1 and ca.id=vi.category and vi.id ='$a2' and vi.congbo=1";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$count2= mysql_query("SELECT COUNT(vi.id) FROM video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a1' and pl.maloai=ca.phanloai and ca.id=vi.category and ca.congbo=1 and vi.congbo=1");
$row2=mysql_fetch_row($count2);
											
                                                  $title=$row["title"];
												  $name=$row["name"];
												  $idt=$row[12];
                                                  $video=$row["video"];
												   
												  $tenloai=$row["tenloai"];
												  $views=$row["views"];
												   $category=$row["category"];
												   $linkpl=$row["linkpl"];
												  $linkca=$row["linkca"];
												   $vit=$views+1;
												   $luottaivideo=$row["luottaivideo"];
												    $luottaivideotang=$luottaivideo+1;
												   if(isset($a1)){mysql_query("update video_video set views='$vit' where id='$idt'");}
					?>
					<div class="box radius">
						<div class="page-header pg-header pg-header-video reset-margin">
							<h4 class="reset-margin"><span><?php echo $title ?></span></h4>
							<i class="pull-right">
								<span><?php echo $tenloai ?> (<?php echo $row2['0']?></span> video)
							</i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="img-polaroid">
								<?php if(substr($video,0,22)=='http://www.youtube.com' || substr($video,0,23)=='https://www.youtube.com'){ ?>
								<iframe width="100%" height="400" frameborder="0" allowfullscreen="true" src="<?php echo $str= str_replace("watch?v=","embed/",$video); ?>?rel=0"></iframe>
								 
								<?php }else{ ?><video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="440" height="300" poster="http://phatphaptonghop.com/images/buddhamin.jpg" data-setup="{}">
    <source src="<?php echo $video ?>" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
	<track kind="captions" src="../css_java/demo.captions.vtt" srclang="en" label="English"></track>
    <track kind="subtitles" src="../css_java/demo.captions.vtt" srclang="en" label="English"></track>
  </video>
               
								
								
								
								
								<?php } ?>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<strong>Giảng sư:</strong>
								<span><a href="<?php echo $a1 ?>-<?php echo $category ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>"> <?php echo $name ?><br/></a></span>
								<!--
								<a tal:attributes="href VMUpdateTopAll/current/getMonk/getURLRead">
									<span tal:content="VMUpdateTopAll/current/getMonk/getPreName"/> - 
									<span tal:content="VMUpdateTopAll/current/getMonk/getName"/>
								</a>
								-->
								
								
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo $luottaivideo ?></span> lượt tải
									
								</span>
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo $views ?></span> lượt xem
									
								</span>
								
									<a  class="btn btn-danger pull-right disabled btn-small" target="_" title="Tải về" href="./taivideo.php?id=<?php echo $idt ?>">Click Tải Video</a>
								
							</div>
							<div class="news-author monk-author">
							<div class="accordion accordion-fix" id="accordion2">
							<p>Sắp xếp:<a href="video-<?php echo $a1 ?>-<?php echo $a2 ?>">Tăng</a> / <a href="videohat-<?php echo $a1 ?>-<?php echo $a2 ?>">Giảm</a></p><p>
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

    $news_id1 = $_POST['news_id1'];
	$linkvi = $_POST['linkvi'];
	$linkca = $_POST['linkca'];
	 $news_id2 = $_POST['news_id2'];
   $a=mysql_query("INSERT INTO comment_vi SET news_id='$news_id2',
                                              author='".mysql_escape_string($_POST['author'])."',
                                              content='".mysql_escape_string($_POST['content'])."',
                                              date=NOW()");
			   if(isset($a)){
     echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Bình luận thành công. A di đà phật')";
                    echo"</script>";
					   echo "<script>window.location='video-$news_id1-$news_id2'</script>";  
} else {
    echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình bình luận')";
                    echo"</script>";}
}
?>
        <?php
        $comment_req = mysql_query("SELECT * FROM comment_vi WHERE news_id='$a2'");
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
$hinha=$row["hinh"];


 ?>

    <form method="POST" action="index.php?frame=videoplayer&act=do" name="f1" onSubmit="return kiemtra();">
        <input type="hidden" name="news_id2" value="<?php echo $a2?>">
		<input type="hidden" name="linkvi" value="<?php echo $linkvi?>">
		<input type="hidden" name="news_id1" value="<?php echo $a1?>">
		<input type="hidden" name="linkca" value="<?php echo $linkca?>">
		<input type="hidden" name="author" value="<?php echo $hoten?>">
        <table border="0" width="100%">
		<tr>
        <td width="100%"><textarea name="content" rows="3" cols="100"></textarea><img src="./<?php echo $hinha ?>" class="hinh" /><td>
		</tr>
		<tr>
        <td colspan="2" align="left"><input type="submit" name="submit" value="Bình Luận"></td>
		</tr>
		</table>
    </form><?php }else{ ?><br />Vui lòng <a href="index.php?frame=dangky">đăng nhập</a> hoặt <a href="index.php?frame=dangky">đăng ký </a> để lại bình luận <?php } ?>
	




</div></div>
<div class="news-author monk-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-tags icon-white"></i> Cùng giảng sư
								</span>
							</p></div>
							<ul class="thumbnails grid-item-2 reset-margin">
								<?php 
require("ketnoi.php");//kết  nối đến CSDL
$baitren_mottrang=15;
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !$_GET['page'] )
{
    $page = 0 ;
}
else
{
$page=$_GET['page'];
}
							$sodu_lieu = mysql_num_rows(mysql_query("select*from video_video vi,video_categories ca where ca.id=vi.category and vi.category ='$category' and vi.congbo=1 order by vi.id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from video_video vi,video_categories ca where ca.id=vi.category and vi.category ='$category' and vi.congbo=1 order by vi.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row3 = mysql_fetch_array($result )) 
{	
								
											
                                                   $id=$row3[0];
												   $title=$row3["title"];
												   $imgbg=$row3["imgbg"];
												   $linkca=$row3["linkca"];
												   $linkvi=$row3["linkvi"];
                                                 
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="video-<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
											<img src="<?php echo $imgbg ?>">
											<p><?php echo substr($title,0,55);echo "..."; ?></p>
										</a>
									</div>
								</li>
								
								<?php }} ?>
								</ul>
								<center>
<div class="pagination page-number">

									<ul>
										<li>
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href='video-<?php echo $a1 ?>-<?php echo $a2 ?>&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>
</li>
									</ul>
								</div>
							</center>
								
								
							

						</div>
					</div>
				</div>
				
				
				
				<div class="span3 fix-width-3">
				<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-giangsu"><?php if($a=='4'){echo "Video Nội bộ";}else{echo"Giảng sư";}?></div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where pl.maloai=ca.phanloai and ca.phanloai='$a1' and ca.id=vi.category and ca.congbo=1 and ca.chuyende!=1 and vi.congbo=1 group by vi.category order by ca.giangsu asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row[0];
												  $name=$row["name"];
												  $category=$row["category"];
												  $noibac=$row["noibac"];
												  $linkpl=$row["linkpl"];
												  $linkca=$row["linkca"];
												   $noibac=$row[4];
												  $count= mysql_query("SELECT COUNT(id) FROM video_video where category='$category' and congbo=1");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>	
					</div>
					<?php }else{?>
					<div class="spanvideo fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Chuyên đề</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where pl.maloai=ca.phanloai and ca.phanloai='$a1' and ca.congbo=1 and ca.id=vi.category and ca.chuyende=1 and vi.congbo=1 group by vi.category order by ca.sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row[0];
												$name=$row["name"];
												  $category=$row["category"];
												  $linkca=$row["linkca"];
												  $linkpl=$row["linkpl"];
												  $noibac=$row["noibac"];
												   $noibach=$row[4];
												  $count= mysql_query("SELECT COUNT(id) FROM video_video where category='$category' and congbo=1");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>					
				</div>
				<div class="span6 fix-width-3">
					<?php 
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a1' and pl.maloai=ca.phanloai and ca.congbo=1 and ca.id=vi.category and vi.id ='$a2' and vi.congbo=1";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$count2= mysql_query("SELECT COUNT(vi.id) FROM video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a1' and pl.maloai=ca.phanloai and ca.id=vi.category and ca.congbo=1 and vi.congbo=1");
$row2=mysql_fetch_row($count2);
											
                                                  $title=$row["title"];
												  $name=$row["name"];
												   $idt=$row[12];
                                                  $video=$row["video"];
												  $tenloai=$row["tenloai"];
												  $views=$row["views"];
												  $linkca=$row["linkca"];
												  $linkpl=$row["linkpl"];
												   $category=$row["category"];
												   $vit=$views+1;
												    $luottaivideo=$row["luottaivideo"];
												    $luottaivideotang=$luottaivideo+1;
												   if(isset($a1)){mysql_query("update video_video set views='$vit' where id='$idt'");}
					?>
					<div class="box radius">
						<div class="page-header pg-header pg-header-video reset-margin">
							<h4 class="reset-margin"><span><?php echo $title ?></span></h4>
							<i class="pull-right">
								<span><?php echo $tenloai ?> (<?php echo $row2['0']?></span> video)
							</i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="img-polaroid">
									<?php if(substr($video,0,22)=='http://www.youtube.com' || substr($video,0,23)=='https://www.youtube.com'){ ?>
								<iframe width="100%" height="400" frameborder="0" allowfullscreen="true" src="<?php echo $str= str_replace("watch?v=","embed/",$video); ?>?rel=0"></iframe>
								
								<?php }else{ ?>												
<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="440" height="300" poster="http://phatphaptonghop.com/images/buddhamin.jpg" data-setup="{}">
    <source src="<?php echo $video ?>" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
	<track kind="captions" src="../css_java/demo.captions.vtt" srclang="en" label="English"></track>
    <track kind="subtitles" src="../css_java/demo.captions.vtt" srclang="en" label="English"></track>
  </video>
  <?php } ?>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<strong>Giảng sư:</strong>
								<span><a href="<?php echo $a1 ?>-<?php echo $category ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>"> <?php echo $name ?></a></span><br/>
								<!--
								<a tal:attributes="href VMUpdateTopAll/current/getMonk/getURLRead">
									<span tal:content="VMUpdateTopAll/current/getMonk/getPreName"/> - 
									<span tal:content="VMUpdateTopAll/current/getMonk/getName"/>
								</a>
								-->
								
								
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo $luottaivideo ?></span> lượt tải
									
								</span>
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo $views ?></span> lượt xem
								</span>
								<a  class="btn btn-danger pull-right disabled btn-small" target="_" title="Tải về" href="./taivideo.php?id=<?php echo $idt ?>">Click Tải Video</a>
									

							</div>
							
							<div class="news-author monk-author"><div class="accordion accordion-fix" id="accordion2"><p>Sắp xếp:<a href="video-<?php echo $a1 ?>-<?php echo $a2 ?>">Tăng</a>/<a href="videohat-<?php echo $a1 ?>-<?php echo $a2 ?>">Giảm</a></p><p>
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

    $news_id1 = $_POST['news_id1'];
	$linkvi = $_POST['linkvi'];
	$linkca = $_POST['linkca'];
	 $news_id2 = $_POST['news_id2'];
   $a=mysql_query("INSERT INTO comment_vi SET news_id='$news_id2',
                                              author='".mysql_escape_string($_POST['author'])."',
                                              content='".mysql_escape_string($_POST['content'])."',
                                              date=NOW()");
			   if(isset($a)){
     echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Bình luận thành công. A di đà phật')";
                    echo"</script>";
					   echo "<script>window.location='video-$news_id1-$news_id2'</script>";  
} else {
    echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình bình luận')";
                    echo"</script>";}
}
?>
        <?php
        $comment_req = mysql_query("SELECT * FROM comment_vi WHERE news_id='$a2'");
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
$hinha=$row["hinh"];


 ?>

    <form method="POST" action="index.php?frame=videoplayer&act=do" name="f1" onSubmit="return kiemtra();">
        <input type="hidden" name="news_id2" value="<?php echo $a2?>">
		<input type="hidden" name="linkvi" value="<?php echo $linkvi?>">
		<input type="hidden" name="news_id1" value="<?php echo $a1?>">
		<input type="hidden" name="linkca" value="<?php echo $linkca?>">
		<input type="hidden" name="author" value="<?php echo $hoten?>">
        <table border="0" width="100%">
		<tr>
        <td width="100%"><textarea name="content" rows="3" cols="100"></textarea><img src="./<?php echo $hinha ?>" class="hinh" /><td>
		</tr>
		<tr>
        <td colspan="2" align="left"><input type="submit" name="submit" value="Bình Luận"></td>
		</tr>
		</table>
    </form><?php }else{ ?><br />Vui lòng <a href="index.php?frame=dangky">đăng nhập</a> hoặt <a href="index.php?frame=dangky">đăng ký </a> để lại bình luận <?php } ?>
	














</div></div>
	<div class="news-author monk-author">
<p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-tags icon-white"></i> Cùng giảng sư
								</span>
							</p></div>
							<ul class="thumbnails grid-item-2 reset-margin">
	<?php 
require("ketnoi.php");//kết  nối đến CSDL
$baitren_mottrang=15;
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !$_GET['page'] )
{
    $page = 0 ;
}
else
{
$page=$_GET['page'];
}
$sodu_lieu = mysql_num_rows(mysql_query("select*from video_video vi,video_categories ca where ca.id=vi.category and vi.category ='$category' and vi.congbo=1 group by vi.id desc")) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from video_video vi,video_categories ca where ca.id=vi.category and vi.category ='$category' and vi.congbo=1 order by vi.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row3 = mysql_fetch_array($result )) 
{	
								

											
                                                   $id=$row3[0];
												   $title=$row3["title"];
												   $imgbg=$row3["imgbg"];
												    $linkca=$row3["linkca"];
												   $linkvi=$row3["linkvi"];
                                                 
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="video-<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
											<img src="<?php echo $imgbg ?>">
											<p><?php echo substr($title,0,55);echo "..."; ?></p>
										</a>
									</div>
								</li>
								
								<?php }} ?>	</ul>
								<center>
<div class="pagination page-number">

									<ul>
										<li>
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href='video-<?php echo $a1 ?>-<?php echo $a2 ?>&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>
</li>
								
								</div>
							</center>
								
								
							</ul>

						</div>
					</div>
				</div>
				
				
				<?php include'right.php';?>
					<?php }?>