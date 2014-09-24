<?php 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"]; ?><div class="span8 fix-width">
<?php 
require './ketnoi.php';
$a=$_GET['id'];
$sql="select * from content_items i,users u where i.id='$a' and u.id=i.created_by";
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
												   $link=$row["link"];
												   $hitst=$hits+1;
												  $idcategories=$row["idcategories"];
												  if(isset($a)){mysql_query("update  content_items set hits='$hitst' where id='$a'");}
												  
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
									
									<a class="btn btn-primary pull-right" href="#"><i class="icon-hand-up icon-white"></i><?php echo "$hits Lượt xem"; ?></a>
<div class="accordion accordion-fix" id="accordion2">
<a class="btn btn-primary pull-right" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"><i class="icon-hand-up icon-white"></i>Ẩn / Hiện bình luận</a>								
									
								</div>
								<p>Tin và ảnh: <?php echo "$name"; ?></p>
							</div>
					
<div id="collapseOne" class="accordion-body collapse in b-content">
<div class="carousel-inner">
											
											

						<div class="comment" style="position: relative;">
							<?php
require './ketnoi.php';
				if ( $_GET['act'] == "do" )
	{

    $news_id = $_POST['news_id'];
	$link = $_POST['link'];
   $a=mysql_query("INSERT INTO comment_tt SET news_id='$news_id',
                                              author='".mysql_escape_string($_POST['author'])."',
                                              content='".mysql_escape_string($_POST['content'])."',
                                              date=NOW()");
			   if(isset($a)){
     echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Bình luận thành công. A di đà phật')";
                    echo"</script>";
					   echo "<script>window.location='tin-tuc-chi-tiet-$news_id-$link'</script>";  
} else {
    echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình bình luận')";
                    echo"</script>";}
}
?>
        <?php
        $comment_req = mysql_query("SELECT * FROM comment_tt WHERE news_id='$a'");
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

    <form method="POST" action="index.php?frame=tintucct&act=do" name="f1" onSubmit="return kiemtra();">
        <input type="hidden" name="news_id" value="<?php echo $a?>">
		<input type="hidden" name="link" value="<?php echo $link?>">
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
$sql2="select * from content_items where idcategories='$idcategories' and published='1' order by id desc limit 8";
$kq2=mysql_query($sql2);
                                            if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
                                                  $id=$row2["id"];
                                                  $title=$row2["title"];
												  $link=$row2["link"];
												   $createdd=$row2["created"];		 
										$date = explode('-', $createdd); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$created="$day-$month-$year";
												   ?>
								<li class="news-list-item">
									<a href="tin-tuc-chi-tiet-<?php echo $id ?>-<?php echo $link ?>">
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