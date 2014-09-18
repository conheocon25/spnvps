<?php @session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"];
$seo=$_GET["id"];
$seo1=$_GET["id1"];
$seo2=$_GET["id2"];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Hoằng Pháp Vĩnh Long</title>
<?php if(isset($seo)||isset($seo1)||isset($seo2)){ include"module/seo.php";}else{ ?>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="title" content="Hoằng Pháp Vĩnh Long,Hoằng Pháp Vĩnh Long,hoang phap vinh long,hoan phapvinhlong,phật âm,phat am,video phật giáo,video giảng pháp,bài giảng, pháp thoại, phật pháp, nhạc phật giáo,phat phap tong hop,phatphaptonghop,phật pháp tổng họp,các hoạt động từ thiện,cac hoat dong tu thien,cachoatdongtuthien,doan lam phim Phat giao nguyen phong,nguyen phong,quay phim nguyen phong">
<meta name="copyright" content="Hoằng Pháp Vĩnh Long[ngoi_sao269@yahoo.com]">
<meta name="generator" content="Hoằng Pháp Vĩnh Long" />
<meta name="keywords" content="Hoằng Pháp Vĩnh Long,Hoằng Pháp Vĩnh Long,hoang phap vinh long,hoan phapvinhlong,phật âm,phat am,video phật giáo,video giảng pháp,bài giảng, pháp thoại, phật pháp, nhạc phật giáo,phat phap tong hop,phatphaptonghop,phật pháp tổng họp,các hoạt động từ thiện,cac hoat dong tu thien,cachoatdongtuthien,doan lam phim phat giaonguyen phong,nguyen phong,quay phim nguyen phong">
<meta name="description" content="Hoằng Pháp Vĩnh Long">
<meta name="page-topic" content="Hoằng Pháp Vĩnh Long">
<meta name="Abstract" content="Hoằng Pháp Vĩnh Long">
<meta name="classification" content="Hoằng Pháp Vĩnh Long"> <?php } ?>
<link rel="shortcut icon" href="data/images/bg/fo_icon_02.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css_java/jquery.countdown.css"> 
<link rel="stylesheet" type="text/css" href="css_java/eventCalendar.css">
<link rel="stylesheet" type="text/css" href="css_java/eventCalendar_theme.css"> 
<link rel="stylesheet" type="text/css" href="css_java/bootstrap.css" media="screen">
<link rel="stylesheet" type="text/css" href="css_java/base.css">
<link rel="stylesheet" type="text/css" href="css_java/theme.css">
<link rel="stylesheet" type="text/css" href="css_java/style.css">
<link rel="stylesheet" type="text/css" href="css_java/style2.css">
<link rel="stylesheet" type="text/css" href="css_java/video-js.css">
<link rel="stylesheet" type="text/css" href="css_java/styletab.css">
<link rel="stylesheet" type="text/css" href="css_java/menu.css">
<span>
<script type="text/javascript" language="javascript" src="css_java/jquery-1.7.1.min.js"></script>
<script type="text/javascript" language="javascript" src="css_java/jquery.countdown.js"></script>
<script type="text/javascript" language="javascript" src="css_java/amlich-hnd.js"></script>
<script type="text/javascript" language="javascript" src="css_java/jquery.eventCalendar.js"></script>
<script type="text/javascript" language="javascript" src="css_java/jquery.timeago.js"></script>
<script type="text/javascript" language="javascript" src="css_java/bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="css_java/base.js"></script>
<script type="text/javascript" language="javascript" src="css_java/wz_tooltip.js"></script>
<script type="text/javascript" language="javascript" src="css_java/countdown.js"></script>
<script type="text/javascript" language="javascript" src="css_java/jquery.cycle.all.js"></script> 
<script type="text/javascript" language="javascript" src="css_java/floater_xlib.js" ></script>
<script type="text/javascript" language="javascript" src="css_java/loading.js" ></script>
<script type="text/javascript" language="javascript" src="css_java/jwplayer.js" ></script>
<script type="text/javascript" language="javascript" src="css_java/jquery.popupMiendatweb.min.js" ></script>

<script type="text/javascript" language="javascript" src="css_java/modernizr.custom.28468.js" ></script>
<script type="text/javascript" language="javascript" src="css_java/jquery.cslider.js" ></script>
<script type="text/javascript" language="javascript" src="css_java/video.js" ></script>
<script type="text/javascript" language="javascript" src="css_java/jquery-1.2.1.min.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="css_java/flexdropdown.js" ></script>


		</span>
<script>
videojs.options.flash.swf = "video-js.swf";
</script>	
<!-- loadding trang web -->
<script type="text/javascript">
window.onload = detectarCarga;
function detectarCarga() {
document.getElementById("VPimgLOAD").style.display="none";
}</script><div class="vippraoLoad" id="VPimgLOAD">Đang tải...<br><img alt="Loading..." border="0" src="./images/loading.gif"><br><b>Đang tải dữ liệu...</b></div><script language="JavaScript">
function toggleDisplay(id) {
document.getElementById(id).style.visibility = "visible";
if(document.getElementById(id).style.display == "none" ) {
document.getElementById(id).style.display = "";
} else {
document.getElementById(id).style.display = "none";
}
}
</script>
<script type="text/javascript" language="JavaScript">
	$(function(){
		/* khởi tạo popup */
        $('input[rel*=miendatwebPopup]').showPopup({ 
        	closeButton: ".close_popup" , //khai báo nút close cho popup
			scroll : false, 
			//cho phép scroll khi mở popup, mặc định là không cho phép
        	onClose:function(){            	
        		//sự kiện cho phép gọi sau khi đóng popup, cho phép chúng ta gọi 1 số sự kiện khi đóng popup, bạn có thể để null ở đây
        	}
        });	
	});
</script>
<!-- dang ky trang web voi google -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46093692-4', 'auto');
  ga('send', 'pageview');

</script>
<!-- sidle hinh anh trang web -->
<script>
			/*<![CDATA[*/
			$(document).ready(function(){
				$('.news-slide').carousel({interval: 6000});
				$(".hidden-control").click(function(){
					($(this).hasClass("icon-chevron-down")==false) ? $(this).addClass("icon-chevron-down") : $(this).removeClass("icon-chevron-down")
				});
			});
			/*]]>*/
			</script>
<!-- Quang cao hai ben trang web -->			
<style> 
#left_ads_float 
{ 
top:40px; 
left:0px; 
position:fixed; 
} 

#right_ads_float 
{ 
top:40px; 
right:0px; 
position:fixed; 
} 
</style> 
<script> 
var vtlai_remove_fads=false; 
function vtlai_check_adswidth() 
{ 
if(vtlai_remove_fads) 
{ 
document.getElementById('left_ads_float').style.display='none'; 
document.getElementById('right_ads_float').style.display='none'; 
return; 
}else if(document.cookie.indexOf('vtlai_remove_float_ads')!=-1) 
{ 
vtlai_remove_fads=true; 
vtlai_check_adswidth(); 
return; 
} 
else 
{ 
var lwidth=parseInt(document.body.clientWidth); 
if(lwidth<1110) 
{ 
document.getElementById('left_ads_float').style.display='none'; 
document.getElementById('right_ads_float').style.display='none'; 
} 
else 
{ 
document.getElementById('left_ads_float').style.display='block'; 
document.getElementById('right_ads_float').style.display='block'; 
} 
setTimeout('vtlai_check_adswidth()',10); 
} 
} 
function remove_ads() 
{ 
document.cookie = "vtlai_remove_float_ads=1; expires=Thu, 11-Aug-2020 18:09:14 GMT; path=/"; 
document.getElementById('left_ads_float').style.display='none'; 
document.getElementById('right_ads_float').style.display='none'; 
} 
</script>
<!-- hiệu ứng chuột trang web --> 
<style type="text/css">
a:hover{
text-decoration: none;
background: url("data/images/bg/ngoisao.gif");
background-position: bottom bottom;
}
<!--cursor : url("images/hot.png"), progress;
HTML,BODY{cursor: url("images/hot.png"), progress;} --!>
</style> 
<body>
<!-- quảng cáo hai bên trang web -->
<!-- <div id="left_ads_float"> 
        <a href="#" target="_blank"><img border="0" src="images/trai.png" width="190"></a> 
    </div> 
    <div id="right_ads_float"> 

<a href="javascript:remove_ads()" style="display:block;border-bottom: 1px solid #03C">[X] Remove Ads</a>
        <a href="#" target="_blank"><img border="0" src="images/phai.png" width="190"></a> 
    </div>  -->
<!-- <div class="headermn-top">
<?php // include'module/topmenu.php'; ?>
</div>	-->
<div class="container">
		<div class="row reset-margin">
		<div class="headermn-top">
<?php include'module/topmenu.php'; ?>
</div>
				<div class="header">
				<?php include'module/banner.php'; ?>
				</div>
				<div class="top-menu">
				<?php include'module/mainmenu.php'; ?>
				</div>
		</div>
<div class="row reset-margin main">
		<div class="row reset-margin date-time">
		<div id="date-time" class="span6 fix-width">
			<script type="text/javascript">getLunarDateString(09,11,2012,16,39,13);</script>
		</div>
		<div class="span6 fix-width">
			<marquee behavior="scroll" direction="left" scrollamount="1">
				Kính chúc chư tôn đức tăng ni cùng quý Phật tử thân tâm thường an lạc ! Nguyện đem công đức này hướng về khắp tất cả đệ tử và chúng sanh đều trọn thành Phật đạo.
			</marquee>
		</div>
		</div>				
				<?php
					if( empty( $_REQUEST['frame'] ) )
					{
						include('module/home.php');
					}
					else 
					{
                       include('module/processFrame.php');         
                    }
					if(isset($_GET["videoid"])||isset($_GET["id1"])||isset($_GET["id2"])||isset($_GET["audio"])||isset($_GET["nhacvideo"]))
					{}
					else
					{
					include'module/right.php';
					} ?>
</div>

			  <div id="mcts1"><marquee direction="left"  scrollamount="6" onMouseOver="this.stop()" onMouseOut="this.start()">
            <?php
				require './ketnoi.php';
				 $sql="select * from quancao order by id desc";
				$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
											
                                                while($row=mysql_fetch_array($kq))
                                                {
												  $hinhanh=$row["hinhanh"];
												   $tieude=$row["tieude"];
												  $id=$row["id"];
												   ?>
													<a href="quang-cao-chi-tiet-<?php echo $id ?>" onMouseOver="Tip('<?php echo $tieude ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()"><img src="<?php echo $hinhanh ?>"/></a>
												  
												<?php  }}?>
		
			</marquee>
			</div>
			<div>
	<div class="crunchify-top" data-toggle="tooltip" data-placement="left" data-original-title="Chuyển đến đầu trang" style="display: none;"></div>
</div><div class="row reset-margin footer">
				<?php include'module/botmenu.php'; ?>
				<div class="row reset-margin">
				<?php include'module/info.php'; ?>
				</div>
			</div></div>
<?php include'module/quangcaocuoitrang.php'; ?>
</body></html>