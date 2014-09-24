<?php $a1=$_GET["iddb1"]; ?>
<?php $a2=$_GET["iddb2"]; ?>
			
				<div class="span8 fix-width">
					<?php 
 require './ketnoi.php';
$sql="select*from danhbachua db,danhbachua_chitiet ct where db.id=ct.idchua and ct.id ='$a2'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$count2= mysql_query("SELECT COUNT(ct.id) FROM danhbachua db,danhbachua_chitiet ct where db.id='$a1' and db.id=ct.idchua");
$row2=mysql_fetch_row($count2);
											
                                                  $tieude=$row["tieude"];
												 
                                                  $video=$row["video"];
												   $tenchua=$row["tenchua"];
												  
												  $xem=$row["xem"];
												   $giangsu=$row["giangsu"];
												   $linkchua=$row["linkchua"];
												  $link=$row["link"];
												   $xem=$xem+1;
												   if(isset($a2)){mysql_query("update danhbachua_chitiet set xem='$xem' where id='$a2'");}
					?>
					<div class="box radius">
						<div class="page-header pg-header pg-header-video reset-margin">
							<h4 class="reset-margin"><span><?php echo $tieude ?></span></h4>
							<i class="pull-right">
								<span><?php echo $tenchua ?> (<?php echo $row2['0']?></span> video)
							</i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="img-polaroid">
								<iframe width="100%" height="400" frameborder="0" wmode="Opaque" src="<?php echo $str= str_replace("watch?v=","embed/",$video); ?>?wmode=transparent"></iframe>
								<script>
									/*<![CDATA[*/
									$("iframe").each(function(){
										  var ifr_source = $(this).attr('src');
										  var wmode = "?wmode=transparent";
										  $(this).attr('src',ifr_source+wmode);
									});
									/*]]>*/
								</script>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<strong>Giảng sư:</strong>
								<span><?php echo $giangsu ?></span>
								<!--
								<a tal:attributes="href VMUpdateTopAll/current/getMonk/getURLRead">
									<span tal:content="VMUpdateTopAll/current/getMonk/getPreName"/> - 
									<span tal:content="VMUpdateTopAll/current/getMonk/getName"/>
								</a>
								-->
									
								
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo $xem ?></span> lượt xem
									
								</span>
								<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=webchua"></script>
							</div>
							
							<div class="news-author monk-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-tags icon-white"></i> Cùng thể loại
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from danhbachua db,danhbachua_chitiet ct where db.id=ct.idchua and ct.idchua ='$a1' order by ct.id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from danhbachua db,danhbachua_chitiet ct where db.id=ct.idchua and ct.idchua ='$a1' order by ct.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{	
								
											
                                                   $tieude=$row["tieude"];
												 
                                                  $video=$row["video"];
												   $tenchua=$row["tenchua"];
												    $id=$row[7];
												  
												  $xem=$row["xem"];
												  $bgimg=$row["bgimg"];
												   $giangsu=$row["giangsu"];
												   $linkchua=$row["linkchua"];
												  $link=$row["link"];
												   $xem=$xem+1;
                                                 
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="hat-video-<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkchua ?>-<?php echo $link ?>">
											<img src="<?php echo $bgimg ?>">
											<p><?php echo substr($tieude,0,55);echo "..."; ?></p>
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
								
											<a href='hat-video-<?php echo $a1 ?>-<?php echo $id ?>-page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>
</li>
									</ul>
								</div>
							</center>
								
								
							
</div></div></div>
						
			
				
				
			
					
				