<?php if($_GET["nhacvideo"]='nhacvideo'){ ?>
	
				<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Nhạc phật</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from theloaialbumvideo where  theloai='bai-giang' order by sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row["id"];
												  $ten=$row["ten"];
												  $linktheloai=$row["linktheloai"];
												  $theloai=$row["theloai"];
												  
												  $count= mysql_query("SELECT COUNT(id) FROM albumvideo where idtheloai='$id'");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="albumvideo-album<?php echo $id ?>-<?php echo $linktheloai ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $ten ?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>		
				
				
									
				</div>
				
				
				
				<div class="span6 fix-width-3">
					<div class="box radius">
						<div class="page-header pg-header pg-header-video reset-margin">
						<?php 
 require './ketnoi.php';
 $id=$_GET["id"];
 $sql2="select*from albumvideo where id = '$id'";
$kq2=mysql_query($sql2);
$row2=mysql_fetch_array($kq2);
$ten=$row2["ten"];
$idt=$row2["id"];
$linkal=$row2["linkal"];
$luotxem=$row2["luotxem"];
$mota=$row2["mota"];
$xem=$luotxem+1;
   if(isset($id)){mysql_query("update albumvideo set luotxem='$xem' where id='$idt'");}
?>
							<h4 class="reset-margin"> Hát album <?php echo $ten; ?></h4> 
							<i class="pull-right"></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="img-polaroid">
									<embed width="100%" height="600" type="application/x-shockwave-flash"  src="videolist/player.swf"  flashvars="file=videolist/chay.php?id=<?php echo $id ?>&stretching=exactfit&screencolor=0x444444&playlist=bottom&playlistsize=300&autostart=false&repeat=list&showdigits=true&showeq=true &showfsbutton=true&autostart=false&shuffle=false" allowfullscreen="true"> 
</embed>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<strong>Thuộc album:</strong>
								
							
									<span><?php echo $ten ?></span>
								
								
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo "$luotxem"; ?></span> lượt nghe
								</span>
							</div>
							<div class="news-author monk-author"><p>
								
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
   $a=mysql_query("INSERT INTO comment_video SET news_id='$news_id',
                                              author='".mysql_escape_string($_POST['author'])."',
                                              content='".mysql_escape_string($_POST['content'])."',
                                              date=NOW()");
			   if(isset($a)){
     echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Bình luận thành công. A di đà phật')";
                    echo"</script>";
					   echo "<script>window.location='xem-album$news_id-$link'</script>";  
} else {
    echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình bình luận')";
                    echo"</script>";}
}
?>
        <?php
        $comment_req = mysql_query("SELECT * FROM comment_video WHERE news_id='$id'");
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

    <form method="POST" action="index.php?frame=nhacvideohat&act=do" name="f1" onSubmit="return kiemtra();">
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
							
							
						</div>
					</div>
				</div>
				
				
			
				
				
				<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-giangsu">Thể loại khác</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
						<?php 
								
 require './ketnoi.php';
$sql="select*from theloaialbumvideo where  theloai='nhac' order by sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row["id"];
												  $ten=$row["ten"];
												  $linktheloai=$row["linktheloai"];
												  $theloai=$row["theloai"];
												  
												  $count= mysql_query("SELECT COUNT(id) FROM albumvideo where idtheloai='$id'");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="albumvideo-album<?php echo $id ?>-<?php echo $linktheloai ?>">
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