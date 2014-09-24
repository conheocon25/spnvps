<?php ob_start();if($_GET["audio"]='audio'){ 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"];


?>
	
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
					<div class="box radius">
						<div class="page-header pg-header pg-header-video reset-margin">
						<?php 
 require './ketnoi.php';
$id=$_GET["id"];
$sql2="select*from album where id = '$id'";
$kq2=mysql_query($sql2);
$row2=mysql_fetch_array($kq2);
$ten=$row2["ten"];
$linkal=$row2["linkal"];
$luotxem=$row2["luotxem"];
$mota=$row2["mota"];
$idt=$row2["id"];
$xem=$luotxem+1;
   if(isset($id)){mysql_query("update album set luotxem='$xem' where id='$idt'");}
?>
							<h4 class="reset-margin"> Hát album <?php echo $ten; ?></h4> 
							<i class="pull-right"></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="img-polaroid"><img src="./images/1.jpg" class="nenaudio" />
<embed type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="never" src="nhac/mediaplayer.swf?file=nhac/chay.php?id=<?php echo $id ?>&displayheight=50&backcolor=0x000000&frontcolor=0xFFFFFF&lightcolor=0xFFFFFF&showdigits=true&showeq=true&showfsbutton=true&autostart=false&shuffle=false&repeat=true;volume=100&height=400" width="100%" height="400" /></embed>

<table cellpadding="5" cellspacing="0" border="1" width="100%" bordercolor="#cccccc" style="border-collapse:collapse; border:1px solid #cccccc; background:#ffffff">
			  	    <tbody><tr style="background: #FC3">
			  	      <td align="center" valign="top"><strong>Tiêu đề</strong></td>
					  <td align="center" valign="top"><strong>Lượt tải</strong></td>
                

			  	      <td valign="top" align="center" width="75"><strong>Thao tác</strong></td>
		  	        </tr>
					<?php  require './ketnoi.php';
$sql="select*from baihat bh,album al where al.id=bh.idalbum and bh.idalbum='$id' order by bh.id asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
											$i=0;
											$j=0;
                                                while($row=mysql_fetch_array($kq))
                                                {
											$i=$i+1;
                                                  $tieude=$row["tieude"];
                                                  $luottai=$row["luottai"];
												  $j+=$luottai;
												   
												   $idbh=$row[0];
												   $link=substr($row["duongdan"],29);
												   
												  $ten=$row["ten"]; ?>
			  	    <tr>
			  	      <td valign="top" align="left"><img src="./images/music.png" width="24" height="24" align="absmiddle"><?php echo $i ?>. <?php echo mb_substr($tieude,0,20,'UTF-8')?>...<br><span style="color:#ababab;font-size:11px;font-style:italic"></span></td><td><?php echo $luottai ?></td>
               <td align="center" valign="middle">
			   <a href="./tainhac.php?file=<?php echo $link ?>&id=<?php echo $idbh ?>"><img src="./images/tai.gif" width="9" height="11" align="absmiddle" title="Tải bài hát">
               </a>
               </td>
			   <td></td>
		  	        </tr>
					<?php }} ?>
	  	        </tbody></table>

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
									<span><?php echo "$j"; ?></span> lượt tải
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

    <form method="POST" action="index.php?frame=audiohat&act=do" name="f1" onSubmit="return kiemtra();">
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