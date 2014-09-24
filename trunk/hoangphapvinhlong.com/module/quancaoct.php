<?php 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"]; ?><div class="span8 fix-width">
<?php 
require './ketnoi.php';
$a=$_GET['id'];
$sql="select * from quancao where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												
												  $hits=$row["luotxem"];
												  
												   $hitst=$hits+1;
												
												  if(isset($a)){mysql_query("update  quancao set luotxem='$hitst' where id='$a'");}
												  
												  ?>
			
					<div class="box radius">
						<div class="page-header pg-header pg-header-news reset-margin">
							<h4 class="reset-margin"><?php echo "$tieude"; ?></h4>
							
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-main"><div align="left"><?php echo "$noidung"; ?></div></div>
							<div class="news-author">
								<div class="news-tools">
									
									<a class="btn btn-primary pull-right" href="#"><i class="icon-hand-up icon-white"></i><?php echo "$hits Lượt xem"; ?></a>
<div class="accordion accordion-fix" id="accordion2">
<a class="btn btn-primary pull-right" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"><i class="icon-hand-up icon-white"></i>Ẩn / Hiện bình luận</a>								
									
								</div>
								<p>Nguồn từ: Nguyên Phong</p>
							</div>
					
<div id="collapseOne" class="accordion-body collapse in b-content">
<div class="carousel-inner">
											
											

						<div class="comment" style="position: relative;">
							<?php
require './ketnoi.php';
				if ( $_GET['act'] == "do" )
	{

    $news_id = $_POST['news_id'];
   $a=mysql_query("INSERT INTO comment_qc SET news_id='$news_id',
                                              author='".mysql_escape_string($_POST['author'])."',
                                              content='".mysql_escape_string($_POST['content'])."',
                                              date=NOW()");
			   if(isset($a)){
     echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Bình luận thành công. A di đà phật')";
                    echo"</script>";
					   echo "<script>window.location='quang-cao-chi-tiet-$news_id'</script>";  
} else {
    echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình bình luận')";
                    echo"</script>";}
}
?>
        <?php
        $comment_req = mysql_query("SELECT * FROM comment_qc WHERE news_id='$a'");
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

    <form method="POST" action="index.php?frame=quancaoct&act=do" name="f1" onSubmit="return kiemtra();">
        <input type="hidden" name="news_id" value="<?php echo $a?>">
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
	

<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=webchua"></script>


</div></div></div></div>	
	
	
	<div class="news-author">
								<div class="news-tools"><p>Các tin có liên quan</p></div></div>
							<ul class="nav nav-tabs nav-stacked reset-margin">
								<li class="active news-list-title"><a>Các bài khác</a></li>
								
								<?php 
 require './ketnoi.php';
$sql2="select * from quancao order by id desc";
$kq2=mysql_query($sql2);
                                            if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
                                                  $id=$row2["id"];
                                                  $tieude=$row2["tieude"];
												 
												   ?>
								<li class="news-list-item">
									<a href="quang-cao-chi-tiet-<?php echo $id ?>">
										<span><?php echo "$tieude"; ?></span>
										
										<i class="icon-chevron-right pull-right"></i>
									</a>
								</li>
								
								
								<?php }} ?>
							</ul>
						</div>
					</div>

				</div>
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