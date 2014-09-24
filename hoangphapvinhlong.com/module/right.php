<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
}
.style2 {
	color:#339966;
	font-weight: bold;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	
}
--> 
</style>
<div class="span4 fix-width">
  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-thongbao">Thông Báo mới	</div>
    </div>
    <div class="b-content">

      <?php require './ketnoi.php';
$sql2="select*from thongbao where noibac='1' order by id desc limit 1";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                  $tieude=$row2["tieude"];
												  $noidung=$row2["noidung"];
                                                  $id=$row2["id"];
												  ?>
      <a class="btn btn-info" href="thong-bao-chi-tiet<?php echo $id ?>"><img src="data/images/bg/thong-bao-300x300.png" class="thongbao">
          <?php echo $tieude ?>
          <img src="./images/hot (1).gif" />
      </a>
      <div class="media img-polaroid new-list-polaroid">

        <div class="media-body">
          <?php echo mb_substr($noidung,0,400,'UTF-8');echo"...<a href='thong-bao-chi-tiet$id'>Xem thêm </a>"; ?>

        </div>
      </div>




      <?php }} ?>
    </div>
  </div>

  <!--<div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-right">Các hoạt động</div>
    </div>
    <div class="b-content">
      <p align="center" class="style1">CÁC SỰ KIỆN SẮP XẢY RA:</p>
      <?php 
						
//require './ketnoi.php';
$sql2="select*from event order by id desc";
$kq2=mysql_query($sql2);
$i=0;
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
												$thoigianbd=$row2["thoigianbd"];
												$tieude=$row2["tieude"];
												$id=$row2["id"];
												$date2 = explode('-', $thoigianbd); 
										$day2 = $date2[2]; 
										$month2 = $date2[1]; 
										$year2 = $date2[0];
										$h = $date2[3]; 
										$p = $date2[4]; 
										$s = $date2[5];
										date_default_timezone_set("asia/bangkok");
										$bd="$day2-$month2-$year2-$h-$p-$s";
						$ngaybd=mktime($h,$p,$s,$month2,$day2,$year2);
						$now=time();
												$i=$i+1;
												if($now < $ngaybd){
												?>
      <a href="chi-tiet-su-kien"<?php echo $id ?>">
      <?php	echo "<p align='left' class='style2'>$i. $tieude<img src='./images/new.gif'/></p></a>";

?>
      <script>
        deadline("<?php echo $thoigianbd ?>");
      </script>
      <?php }else{} }
	  }
		?>	<div id="eventCalendarLocale"></div>
      <script type="text/javascript">
        /*<![CDATA[*/
				$(document).ready(function() {
					$("#eventCalendarLocale").eventCalendar({
						eventsjson: 'json/events.json.php',
						monthNames: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6",
							"Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
						dayNames: [ 'Chủ Nhật','Thứ 2','Thứ 3','Thứ 4', 'Thứ 5','Thứ 6','Thứ 7' ],
						dayNamesShort: [ 'CN','Th2','Th3','Th4', 'Th5','Th6','Th7' ],
						txt_noEvents: "Không có sự kiện nào xảy ra",
						txt_SpecificEvents_prev: "",
						txt_SpecificEvents_after: "sự kiện:",
						txt_next: "Tới",
						txt_prev: "Lui",
						txt_NextEvents: "Sự kiện sắp xảy ra:",
						txt_GoToEventUrl: "đi đến sự kiện"
					});
				});
				/*]]>*/
      </script>



    </div>
  </div> -->
  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-videotc">Video Nổi bật</div>
    </div>
    <div class="b-content">
      <?php require './ketnoi.php';
$sql2="select*from videonoibac where hienthi='1'";
$kq2=mysql_query($sql2);
$row2=mysql_fetch_array($kq2);
$link=$row2["link"];
$id=$row2["id"];
$hienthi=$row2["hienthi"];?>
      <iframe width="100%" height="315" src="<?php echo $link ?>" frameborder="0" allowfullscreen>
      </iframe>
    </div>
  </div>


  <!--
	<div class="box radius">
		<div class="b-title">
			<div class="b-t-icon-videotc">Video Nổi Bậc</div>
		</div>
		<div class="b-content"><marquee direction="down"  height="300" scrollamount="6" onMouseOver="this.stop()" onMouseOut="this.start()">
				<?php 
// require './ketnoi.php';
$sql2="select*from video_categories ca,video_video vi where ca.id=vi.category and vi.noibac='1' and vi.congbo=1 and ca.congbo=1 order by vi.id desc limit 10";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                 
												  $img=$row2["imgbg"];
												  $title=$row2["title"];
												  $id=$row2["id"];
												    $phanloai=$row2["phanloai"];
												  
												 
					?>
								
					
										<div class="thumbnail" align='center'>
											<a href="?frame=videoplayer&id1=<?php echo $id ?>&id2=<?php echo $phanloai ?>">
												<img src="<?php echo $img ?>" width='200px'>
												<p><?php echo  $title; ?></p>
											</a>
										</div>
									
								<?php }} ?></marquee>
		</div>
	</div>
	
	-->
  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-anh">Ảnh Hoạt Động</div>
    </div>
	<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right1"></a>
    <div id="right1" class="accordion-body collapse b-content">
      <?php 
 require 'ketnoi.php';
$sql="select*from anhhoatdong order by id desc limit 1";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  
												  
												   ?>
      <a href="anh-hoat-dong<?php echo $id ?>">
        <img width="100%" src="./tintuc_files/top_img.jpg">
			</a>
      <?php }} ?>
    </div>
  </div>


  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-videotc">Phật Âm</div>
    </div>
    <a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right2"></a>
    <div id="right2" class="accordion-body collapse b-content">
      <div id="BuddhaCarousel" class="carousel slide carousel-fade sidebar-slide reset-margin">
        <ol class="carousel-indicators">

        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <a href="phat-am-1-nam-tong">
              <img src="./tintuc_files/nam_tong.jpg">
            </a>
          </div>
          <div class="item">
            <a href="phat-am-2-bac-tong">
              <img src="./tintuc_files/bac_tong.jpg">
            </a>
          </div>
          <div class="item">
            <a href="phat-am-3-tong-hop">
              <img src="./tintuc_files/tong_hop.jpg">
            </a>
          </div>
        </div>
        <a class="carousel-control left" href="chualongvien.net/#BuddhaCarousel" data-slide="prev">‹</a>
        <a class="carousel-control right" href="chualongvien.net/#BuddhaCarousel" data-slide="next">›</a>
      </div>
    </div>
  </div>

  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-right">GIẢNG SƯ NỔI BẬT</div>
    </div>
    <a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right10"></a>
    <div id="right10" class="accordion-body in collapse b-content">
      <ul class="grid-item-3 thumbnails reset-margin">

        <?php 
 require './ketnoi.php';
$sql2="select*from video_categories ca,video_phanloai pl where pl.maloai=ca.phanloai and ca.noibac='1' and ca.congbo='1' and ca.chuyende!='1' order by ca.sapxep asc";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                 
												  $img=$row2["img"];
												  $name=$row2["name"];
												  $id=$row2["id"];
												  $phanloai=$row2["phanloai"];
												  $linkca=$row2["linkca"];
												  $linkpl=$row2["linkpl"];
												 
					?>


        <li class="span2">
          <a href="<?php echo $phanloai ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
            <div class="thumbnail">
              <img class="monk-tooltip" data-toggle="tooltip" data-placement="bottom" src="<?php echo $img; ?>" data-original-title="<?php echo $name; ?>">
            </div>
          </a>
        </li>

        <?php }} ?>


      </ul>
    </div>
  </div>


  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-nghenhac">Đáng Chú Ý</div>
    </div>
	<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right3"></a>
    <div id="right3" class="accordion-body collapse b-content">
    <div class="row reset-margin footer3">
      <marquee behavior="scroll" direction="down" scrollamount="6" onMouseOver="this.stop()" onMouseOut="this.start()" height="500">
        <?php
require 'ketnoi.php';
 $sql="select * from video_phanloai pl,video_categories ca where pl.maloai=ca.phanloai and ca.chuyende='1' and ca.congbo='1' and ca.noibac='1' order by ca.id desc limit 20";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
											
                                                while($row=mysql_fetch_array($kq))
                                                {
												  $img=$row["img"];
												   $name=$row["name"];
												  $maloai=$row["maloai"];
												    $id=$row["id"];  $linkca=$row["linkca"];
													$linkpl=$row["linkpl"];?>
        <a href="<?php echo $maloai ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>" onMouseOver="Tip('<?php echo $name ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()"><img src="<?php echo $img ?>"/>
        </a>

        <?php  }}?>


        <?php
require 'ketnoi.php';
 $sql="select * from albumvideo where noibac='1' order by id desc limit 10";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
											
                                                while($row=mysql_fetch_array($kq))
                                                {
												  $hinhbg=$row["hinhbg"];
												   $ten=$row["ten"];
												 
												    $id=$row["id"]; 
													$linkal=$row["linkal"];?>
        <a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>" onMouseOver="Tip('<?php echo $ten ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()"><img src="<?php echo $hinhbg ?>"/>
        </a>

        <?php  }}?>



      </marquee>
    </div></div>
  </div>


  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-nghenhac">Nghe nhạc phật</div>
    </div>
    <a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right9"></a>
    <div id="right9" class="accordion-body collapse in b-content">
      <img src="./images/1.jpg" class="nenaudiotc" />
      <embed type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="never" src="nhac/mediaplayer.swf?file=nhac/chaytc.php&displayheight=50&backcolor=0x000000&frontcolor=0xFFFFFF&lightcolor=0xFFFFFF&showdigits=true&showeq=true&showfsbutton=true&autostart=false&shuffle=false&repeat=true;volume=100&height=400" width="100%" height="400" />
      </embed>





    </div>
  </div>




  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-nghenhac">Album Nhạc Nổi Bật</div>
    </div>
	<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right4"></a>
    <div id="right4" class="accordion-body collapse b-content">
    <div class="row reset-margin footer3">
      <marquee behavior="scroll" direction="up" scrollamount="6" onMouseOver="this.stop()" onMouseOut="this.start()" height="500">
        <?php
require 'ketnoi.php';
 $sql="select * from album where noibac='1' order by id desc limit 10";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
											
                                                while($row=mysql_fetch_array($kq))
                                                {
												  $hinhbg=$row["hinhbg"];
												   $ten=$row["ten"];
												 
												    $id=$row["id"]; 
													$linkal=$row["linkal"];?>
        <a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>" onMouseOver="Tip('<?php echo $ten ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()"><img src="<?php echo $hinhbg ?>"/>
        </a>

        <?php  }}?>



      </marquee>
    </div>
  </div></div>
  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-right">Trợ Duyên</div>
    </div>
    <a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right5"></a>
    <div id="right5" class="accordion-body collapse b-content">
      <?php require './ketnoi.php';
$sql="select * from sovang order by id desc limit 1";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $id=$row["id"]; $link=$row["link"]; ?>
      <a href="so-vang-cong-duc-"
        <?php echo $id ?>-<?php echo $link ?>">
        <img width="100%" src="./data/images/bg/sponsor.jpg">
			</a>
    </div>
  </div>

 

  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-right">Thống kê</div>
    </div>
    <a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right6"></a>
    <div id="right6" class="accordion-body collapse  b-content">
      <div class="thongke">
        <?php require'module/counter.php' ?>
        <p>
          <img src="./images/truycap.png" />Tổng lượng truy cập : <?php echo number_format($rowt['0'],"0",",",".");  ?> Truy cập
        </p>
        <p>
          <img src="./tintuc_files/count_logo.gif">
            Đang trực tuyến : <?php echo "$count_user_online ";  ?> Phật tử
        </p>
        <p>
          <img src="./images/thanhvien.png" />Tổng số thành viên :  <?php $count= mysql_query("SELECT COUNT(id) FROM users");
$row=mysql_fetch_row($count); echo number_format($row['0'],"0",",","."); ?> Thành viên
        </p>
        <p>
          <img src="./images/video.png" />Tổng số video : <?php $count= mysql_query("SELECT COUNT(id) FROM video_video where congbo='1'");
$row=mysql_fetch_row($count); echo number_format($row['0'],"0",",","."); ?> Video
        </p>
        <p>
          <img src="./images/video.png" />Tổng số audio : <?php $count= mysql_query("SELECT COUNT(id) FROM baihat");
$row=mysql_fetch_row($count); echo number_format($row['0'],"0",",","."); ?> Bài audio
        </p>
        <p>
          <img src="./images/xem.png" />Tổng số lượt xem video : <?php $count= mysql_query("SELECT sum(views) FROM video_video");
$row=mysql_fetch_row($count);
$count2= mysql_query("SELECT sum(luotxem) FROM albumvideo");
$row2=mysql_fetch_row($count2);


 echo number_format($row['0']+$row2['0'],"0",",","."); ?> Lượt xem
        </p>
        <p>
          <img src="./images/xem.png" />Tổng số lượt nghe nhạc : <?php $count= mysql_query("SELECT sum(luotxem) FROM album");
$row=mysql_fetch_row($count); echo number_format($row['0'],"0",",","."); ?> Lượt nghe
        </p>
		 <p>
          <img src="./images/down.png" />Tổng số lượt tải nhạc : <?php $count= mysql_query("SELECT sum(luottai) FROM baihat");
$row=mysql_fetch_row($count); echo number_format($row['0'],"0",",","."); ?> Lượt tải        </p>
<p>
          <img src="./images/down.png" />Tổng số lượt tải video : <?php $count= mysql_query("SELECT sum(luottaivideo) FROM video_video");
$row=mysql_fetch_row($count); echo number_format($row['0'],"0",",","."); ?> Lượt tải        </p>
      </div>
    </div>
  </div>
  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-right">Liên kết Website</div>
    </div>
    <a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right8"></a>
    <div id="right8" class="accordion-body collapse b-content">
      <br />
      <select style="FONT-SIZE: 8pt; FONT-FAMILY: Arial" onchange="window.open(this.options[this.selectedIndex].value,'_blank'); sites.options[0].selected=true" size="1" name="sites" border="0">
        <option selected="">------Chọn website liên kết-----</option>

        <?php 
// require './ketnoi.php';
$sql2="select*from lienketweb order by id desc";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                 
												  $link=$row2["link"];
												  $tieude=$row2["tieude"];
												  ?>
        <option value="<?php echo $link ?>"><?php echo $tieude ?>
        </option>
        <?php }} ?>

      </select>
    </div>
  </div>
  <div class="box radius">
    <div class="b-title">
      <div class="b-t-icon-right">FaceBook</div>
    </div>
	<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" href="#right7"></a>
    <div id="right7" class="accordion-body collapse in b-content">
      <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FHo%25E1%25BA%25B1ng-Ph%25C3%25A1p-V%25C4%25A9nh-Long%2F558358810936375%3Fref%3Dhl&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px;" allowTransparency="true"></iframe>





    </div>
  </div>
   
  <!--
<div class="box radius">
		<div class="b-title">
			<div class="b-t-icon-right">Góp Ý</div>
		</div>
		<div class="divvinh">
		
		<?php // require './ketnoi.php';
$sql2="select*from ykien order by comment_id desc limit 15";
$kq2=mysql_query($sql2);
if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                 
												  $author=$row2["author"];
												   $email=$row2["email"];
												   $date=$row2["date"];
												  $content=$row2["content"]; ?>
												<div class="dtxt2"><?php echo $date ?></div><a href="mailto:<?php echo $email ?>" target="_blank"><b class="nme pn_std"><img src="./images/us.png" /> <?php echo $author ?></b></a>: <?php echo $content ?>
											<?php	  }} ?>

			<form class="form-horizontal"method="post" name="f1" action="?frame=right&actgy=do" onSubmit="return kiemtra();">			
			<table><tr><td><img src="./images/chat.png" /> Gủi ý kiến:</td></tr><tr><td>
										<input type="text" name="hoten" id="hoten" class="span4" title="Bạn hãy nhập vào họ và tên của bạn" onFocus="if (this.value=='Nhập vào họ và tên...') this.value='';" onBlur="if (this.value=='') this.value='Nhập vào họ và tên...';" value="Nhập vào họ và tên..."></td></tr>
										<tr><td><input type="text" name="email" id="diachiemail" class="span4" title="Bạn hãy nhập vào địa chỉ email của bạn" onFocus="if (this.value=='Nhập vào địa chỉ email...') this.value='';" onBlur="if (this.value=='') this.value='Nhập vào địa chỉ email...';" value="Nhập vào địa chỉ email..."></td></tr>
										
										<tr><td><textarea name="noidung" cols="" rows="" class="span4" title="Bạn hãy nhập vào nội dung" onFocus="if (this.value=='Nhập vào nội dung...') this.value='';" onBlur="if (this.value=='') this.value='Nhập vào nội dung...';" value="Nhập vào nội dung..."></textarea></td></tr>
									  
							
			<tr><td><center><button type="submit" class="btn"> Gủi </button></center></td></tr>
			</table>
			
</form> -->
  <?php 
	if ( $_GET['actgy'] == "do" )
{


$hoten=$_POST["hoten"];
$email=$_POST["email"];
$noidung=$_POST["noidung"];
date_default_timezone_set("asia/bangkok");
$timezone = +7;
$ngayhientai=gmdate("d-m-Y H:i:s", time() + 3600*($timezone+date("I")));
 $a=mysql_query("INSERT INTO ykien (author,email,date,content) VALUES ('{$hoten}', '{$email}', '{$ngayhientai}','{$noidung}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Quý phật tử đã góp ý thành công. A di đà phật!')";
                    echo"</script>";
					 echo "<script>window.location='trang-chu'</script>";           
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình góp ý')";
                    echo"</script>";
					echo "<script>window.location='trang-chu'</script>";      }

		
} ?>






<script language="javascript" type="text/javascript">
	function kiemtra(){
	
		if(document.f1.hoten.value==""||document.f1.email.value==""||document.f1.noidung.value=="")
	{	
		alert('Vui lòng điền đầy đủ thông tin vào');
		document.f1.hoten.focus();
		return false;
	}
	if(document.f1.email.value == "" || document.f1.email.value.indexOf('@')==-1 || document.f1.email.value.indexOf('.')==-1)
	{
		alert('Email Không Hợp Lệ');
		document.f1.email.focus();
		return false;
	}
	if(document.f1.noidung.value.length > 200)
	{	
		
		alert("Nội dung bạn nhập quá dài");
		document.f1.noidung.focus();
				return false;
	}
	}
	</script>


</div>