<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_Backontop(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="crunchify-top" data-toggle="tooltip" data-placement="left" data-original-title="Chuyển đến đầu trang"></div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_Footer(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="row reset-margin footer">
		<?php /* tag "div" from line 496 */; ?>
<div class="top-menu">
			<?php /* tag "ul" from line 497 */; ?>
<ul class="nav nav-pills">
				<?php /* tag "li" from line 498 */; ?>
<li><?php /* tag "a" from line 498 */; ?>
<a href="/trang-chu">Trang chủ</a></li>								
				<?php /* tag "li" from line 499 */; ?>
<li><?php /* tag "a" from line 499 */; ?>
<a href="/tin-tuc">Tin tức</a></li>
				<?php /* tag "li" from line 500 */; ?>
<li><?php /* tag "a" from line 500 */; ?>
<a href="/dao-tao">Đào tạo</a></li>
				<?php /* tag "li" from line 501 */; ?>
<li><?php /* tag "a" from line 501 */; ?>
<a href="/su-kien">Sự kiện</a></li>				
				<?php /* tag "li" from line 502 */; ?>
<li><?php /* tag "a" from line 502 */; ?>
<a href="/phat-am">PHẬT ÂM</a></li>
				<?php /* tag "li" from line 503 */; ?>
<li><?php /* tag "a" from line 503 */; ?>
<a href="/hoi-dap/dat-cau-hoi">Hỏi đáp</a></li>
				<?php /* tag "li" from line 504 */; ?>
<li><?php /* tag "a" from line 504 */; ?>
<a href="/thu-vien-anh">Ảnh hoạt động</a></li>
				<?php /* tag "li" from line 505 */; ?>
<li><?php /* tag "a" from line 505 */; ?>
<a href="/chua-ban">Danh bạ</a></li>
				<?php /* tag "li" from line 506 */; ?>
<li><?php /* tag "a" from line 506 */; ?>
<a href="/lien-he">Liên hệ</a></li>
				<?php /* tag "li" from line 507 */; ?>
<li id="last"><?php /* tag "a" from line 507 */; ?>
<a href="/signin/load">Quản trị</a></li>
			</ul>
		</div>
		<?php /* tag "div" from line 510 */; ?>
<div class="row reset-margin">
			<?php /* tag "div" from line 511 */; ?>
<div class="span6 reset-margin">
				<?php /* tag "div" from line 512 */; ?>
<div class="f-left">
					<?php /* tag "p" from line 513 */; ?>
<p><?php /* tag "b" from line 513 */; ?>
<b>Địa chỉ:</b> ấp Thạnh Hiệp - xã Hòa Thành - huyện Tam Bình - T.Vĩnh Long - Việt Nam</p>
					<?php /* tag "p" from line 514 */; ?>
<p><?php /* tag "b" from line 514 */; ?>
<b>Di Động:</b> 0939 925 154 - 0983 36 77 11</p>
					<?php /* tag "p" from line 515 */; ?>
<p><?php /* tag "b" from line 515 */; ?>
<b>Email:</b> chuaphuochungminhhoa@gmail.com</p>
					<?php /* tag "p" from line 516 */; ?>
<p><?php /* tag "b" from line 516 */; ?>
<b>Website:</b> <?php /* tag "i" from line 516 */; ?>
<i><?php /* tag "u" from line 516 */; ?>
<u>chuaphuochung.com</u></i></p>
				</div>
			</div>
			<?php /* tag "div" from line 519 */; ?>
<div class="span6 pull-right reset-margin">
				<?php /* tag "div" from line 520 */; ?>
<div class="f-right">
					<?php /* tag "p" from line 521 */; ?>
<p><?php /* tag "b" from line 521 */; ?>
<b>© 12/2012 Chùa Phước Hưng</b></p>
					<?php /* tag "p" from line 522 */; ?>
<p>Biên tập - Đại đức Thích Minh Hòa</p>
					<?php /* tag "p" from line 523 */; ?>
<p>Phát triển - SPN Co, Ltd &amp; Nguyên Phong Studio</p>
					<?php /* tag "p" from line 524 */; ?>
<p>Ghi rõ nguồn <?php /* tag "b" from line 524 */; ?>
<b><?php /* tag "i" from line 524 */; ?>
<i>chuaphuochung.com</i></b> khi phát hành thông tin từ website này</p>
				</div>
			</div>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_Popup(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div>
		<?php /* tag "script" from line 434 */; ?>
<script>
		/*<![CDATA[*/
			$(document).ready(function(){								
				$("#ads-open").click( function(){
					//alert("Mở");
					$.session.set('ads-box', 'true');
					$("#ads-open").slideUp('slow', function(){
						$(".ads-popup").slideDown('slow');
					});
				});
				$(".ads-close").click( function(){
					//alert("Đóng");
					$.session.set('ads-box', 'false');
					$(".ads-popup").slideUp('slow', function(){
						$("#ads-open").slideDown('slow');
					});
				});
				$("#ads-open").hide();
				
				if ($.session.get('ads-box')=='true'){
					//$("#ads-open").show();
					$("#ads-open").slideUp('slow', function(){
						$(".ads-popup").slideDown('slow');
					});
				}else{
					//$("#ads-open").hide();
					$(".ads-popup").slideUp('slow', function(){
						$("#ads-open").slideDown('slow');
					});
				}
			});
		/*]]>*/
		</script>
		<?php 
/* tag "div" from line 467 */ ;
if ($ctx->path($ctx->Popup, 'getEnable')):  ;
?>
<div class="ads-popup ads-popup-center">
			<?php /* tag "div" from line 468 */; ?>
<div class="ads-close"><?php /* tag "i" from line 468 */; ?>
<i class="icon-chevron-down icon-white"></i></div>
			<?php /* tag "div" from line 469 */; ?>
<div id="PopupCarousel" class="carousel slide carousel-fade popup-slide reset-margin">
				<?php /* tag "ol" from line 470 */; ?>
<ol class="carousel-indicators">
					<?php /* tag "li" from line 471 */; ?>
<li data-target="#PopupCarousel" data-slide-to="0" class="active"></li>
				</ol>
				<?php /* tag "div" from line 473 */; ?>
<div class="carousel-inner">
					
					<?php /* tag "div" from line 475 */; ?>
<div class="active item">
						<?php 
/* tag "a" from line 476 */ ;
if (null !== ($_tmp_1 = ('#'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
							<?php 
/* tag "img" from line 477 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->SponsorAll, 'current/getPicture')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img width="100%" class="img-rounded"<?php echo $_tmp_2 ?>
/>
						</a>
					</div>
					
					<?php 
/* tag "div" from line 481 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Sponsor = new PHPTAL_RepeatController($ctx->SponsorAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Sponsor as $ctx->Sponsor): ;
?>
<div class="item">
						<?php 
/* tag "a" from line 482 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Sponsor, 'getURLView')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
>
							<?php 
/* tag "img" from line 483 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Sponsor, 'getPicture')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img width="100%" class="img-rounded"<?php echo $_tmp_2 ?>
/>
						</a>
					</div><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>
					
				</div>
			</div>
		</div><?php endif; ?>

		<?php /* tag "div" from line 489 */; ?>
<div id="ads-open" class="ads-open-center"><?php /* tag "i" from line 489 */; ?>
<i class="icon-chevron-up icon-white"></i></div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_CourseBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
if ($ctx->path($ctx->Course, 'getLessionNext')):  ;
?>
<div class="box radius">
		<?php /* tag "div" from line 409 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 410 */; ?>
<div class="b-t-icon-content">Sắp khai giảng</div>
		</div>
		<?php /* tag "div" from line 412 */; ?>
<div class="b-content">
			<?php /* tag "div" from line 413 */; ?>
<div align="center" style="padding-top:10px;">
				<?php 
/* tag "a" from line 414 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Course, 'getLessionNext/getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
					<?php 
/* tag "img" from line 415 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Course, 'getLessionNext/getImage')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img width="300"<?php echo $_tmp_2 ?>
/>
				</a>
			</div>
			<?php /* tag "div" from line 418 */; ?>
<div align="center" style="padding:10px;">
				<?php 
/* tag "a" from line 419 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Course, 'getLessionNext/getURLRead')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a style="font-size:12px; color:#980707; line-height:30px;"<?php echo $_tmp_4 ?>
>
					<?php /* tag "h1" from line 420 */; ?>
<h1><?php echo phptal_escape($ctx->path($ctx->Course, 'getLessionNext/getName')); ?>
</h1>
				</a>
			</div>
			<?php /* tag "div" from line 423 */; ?>
<div style="margin-left:10px;">
				<?php /* tag "div" from line 424 */; ?>
<div id="CourseCountdown"></div>
			</div>
			<?php /* tag "script" from line 426 */; ?>
<script type="text/javascript">/*<![CDATA[*/$(function(){var d1 = $("#CourseBox").attr('alt');var parts = d1.match(/(\d+)/g);var d2 = new Date(parts[0], parts[1]-1, parts[2]);var austDay = new Date();austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);$('#CourseCountdown').countdown({until: d2});});/*]]>*/</script>
		</div>
	</div><?php 
endif ;

}

?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_EventBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 378 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 379 */; ?>
<div class="b-t-icon-content">Đào tạo</div>
		</div>
		<?php /* tag "div" from line 381 */; ?>
<div id="LessionCarousel" class="carousel slide carousel-fade lession-slide reset-margin">
			<?php /* tag "div" from line 382 */; ?>
<div class="carousel-inner">
				<?php /* tag "div" from line 383 */; ?>
<div class="active item">
					<?php 
/* tag "a" from line 384 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Course, 'getLessions/current/getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
						<?php 
/* tag "img" from line 385 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Course, 'getLessions/current/getImage')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img<?php echo $_tmp_2 ?>
/>
						<?php /* tag "div" from line 386 */; ?>
<div class="carousel-caption">
							<?php /* tag "p" from line 387 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->Course, 'getLessions/current/getName')); ?>
</p>
						</div>
					</a>
				</div>
				<?php 
/* tag "div" from line 391 */ ;
$_tmp_1 = $ctx->repeat ;
$_tmp_1->Lession = new PHPTAL_RepeatController($ctx->path($ctx->Course, 'getLessions'))
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_1->Lession as $ctx->Lession): ;
?>
<div class="item">
					<?php 
/* tag "a" from line 392 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Lession, 'getURLRead')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
>
						<?php 
/* tag "img" from line 393 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Lession, 'getImage')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img<?php echo $_tmp_2 ?>
/>
						<?php /* tag "div" from line 394 */; ?>
<div class="carousel-caption">
							<?php /* tag "p" from line 395 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->Lession, 'getName')); ?>
</p>
						</div>
					</a>
				</div><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

			</div>
			<?php /* tag "a" from line 400 */; ?>
<a class="carousel-control left" href="#LessionCarousel" data-slide="prev">&lsaquo;</a>
			<?php /* tag "a" from line 401 */; ?>
<a class="carousel-control right" href="#LessionCarousel" data-slide="next">&rsaquo;</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_CallendarBar(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="row reset-margin date-time">
		<?php /* tag "div" from line 364 */; ?>
<div id="date-time" class="span6 fix-width">
			<?php /* tag "script" from line 365 */; ?>
<script type="text/javascript">getLunarDateString(09,11,2012,16,39,13);</script>
		</div>
		<?php /* tag "div" from line 367 */; ?>
<div class="span6 fix-width">
			<?php /* tag "marquee" from line 368 */; ?>
<marquee behavior="scroll" direction="left" scrollamount="1">
				Kính chúc chư tôn đức tăng ni cùng quý phật tử thân tâm thường an lạc ! Nguyện đem công đức này hướng về khắp tất cả đệ tử và chúng sanh đều trọn thành Phật Đạo.
			</marquee>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_CallendarBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 327 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 328 */; ?>
<div class="b-t-icon-content">Lịch Dương <?php /* tag "small" from line 328 */; ?>
<small>Âm</small></div>
		</div>
		<?php /* tag "div" from line 330 */; ?>
<div class="b-content padding-content">
			<?php /* tag "table" from line 331 */; ?>
<table class="calendar-paper" width="100%" border="0" cellpadding="1" cellspacing="1">
				<?php /* tag "tbody" from line 332 */; ?>
<tbody>
					<?php /* tag "tr" from line 333 */; ?>
<tr><?php /* tag "td" from line 333 */; ?>
<td colspan="2" id="thangduong" class="thangduong"></td></tr>
					<?php /* tag "tr" from line 334 */; ?>
<tr><?php /* tag "td" from line 334 */; ?>
<td colspan="2" id="ngayduong" class="ngayduong"></td></tr>
					<?php /* tag "tr" from line 335 */; ?>
<tr><?php /* tag "td" from line 335 */; ?>
<td colspan="2" id="thuduong" class="thuduong"></td></tr>
					<?php /* tag "tr" from line 336 */; ?>
<tr>
						<?php /* tag "td" from line 337 */; ?>
<td> 
							<?php /* tag "div" from line 338 */; ?>
<div id="thangam" class="thangam"></div>
							<?php /* tag "div" from line 339 */; ?>
<div id="ngayam" class="ngayam"></div>
							<?php /* tag "div" from line 340 */; ?>
<div id="namam" class="namam"></div>
						</td>
						<?php /* tag "td" from line 342 */; ?>
<td class="canchi">
							<?php /* tag "div" from line 343 */; ?>
<div id="canchithang" class="gioam"></div>
							<?php /* tag "div" from line 344 */; ?>
<div id="canchingay" class="gioam"></div>
						</td>
					</tr>
					<?php /* tag "tr" from line 347 */; ?>
<tr><?php /* tag "td" from line 347 */; ?>
<td colspan="2" id="hoangdao" class="hoangdao"></td></tr>
				</tbody>
			</table>
			<?php /* tag "script" from line 350 */; ?>
<script language="JavaScript">
			<!--
				setOutputSize("small");
				document.writeln(printSelectedMonth());
				loadToDay();
			-->
			</script>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_ContactBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box">
		<?php /* tag "div" from line 320 */; ?>
<div class="b-content"><?php /* tag "a" from line 320 */; ?>
<a href="/lien-he"><?php /* tag "img" from line 320 */; ?>
<img width="100%" src="/data/images/logo/contact.jpg"/></a></div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_SponsorBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 306 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 307 */; ?>
<div class="b-t-icon-content">Trợ Duyên</div>
		</div>
		<?php /* tag "div" from line 309 */; ?>
<div class="b-content">
			<?php /* tag "a" from line 310 */; ?>
<a href="/so-vang">
				<?php /* tag "img" from line 311 */; ?>
<img width="100%" src="/data/images/logo/sponsor.jpg"/>
			</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_FixedFunction(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="fixed-function">
		<?php /* tag "div" from line 292 */; ?>
<div class="fb-like fb_edge_widget_with_comment fb_iframe_widget" data-href="https://www.facebook.com/ChuaKhaiTuong" data-send="false" data-layout="box_count" data-width="450" data-show-faces="false" data-font="tahoma" fb-xfbml-state="rendered"></div>
		<?php /* tag "div" from line 293 */; ?>
<div class="bubble"><?php echo phptal_escape(\MVC\Library\Statistic::getCountPrint()); ?>
</div>
		<?php /* tag "p" from line 294 */; ?>
<p class="bubble-item">Truy cập</p>
		<?php /* tag "div" from line 295 */; ?>
<div class="bubble">
			<?php /* tag "img" from line 296 */; ?>
<img src="/data/images/logo/count_logo.gif"/>
			<?php /* tag "span" from line 297 */; ?>
<span><?php echo phptal_escape(\MVC\Library\Statistic::getOnlinePrint()); ?>
</span>
		</div>
		<?php /* tag "p" from line 299 */; ?>
<p class="bubble-item">Trực tuyến</p>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_AskBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 278 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 279 */; ?>
<div class="b-t-icon-content">Hỏi &amp; Đáp PHẬT HỌC</div>
		</div>
		<?php /* tag "div" from line 281 */; ?>
<div class="b-content">
			<?php /* tag "a" from line 282 */; ?>
<a href="/hoi-dap/dat-cau-hoi">
				<?php /* tag "img" from line 283 */; ?>
<img width="100%" src="/data/images/logo/question.jpg"/>
			</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_TopMonkBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 258 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 259 */; ?>
<div class="b-t-icon-content">GIẢNG SƯ NỔI BẬT</div>
		</div>
		<?php /* tag "div" from line 261 */; ?>
<div class="b-content">
			<?php /* tag "ul" from line 262 */; ?>
<ul class="grid-item-3 thumbnails reset-margin">
				<?php 
/* tag "li" from line 263 */ ;
$_tmp_4 = $ctx->repeat ;
$_tmp_4->Monk = new PHPTAL_RepeatController($ctx->MonkAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_4->Monk as $ctx->Monk): ;
?>
<li class="span2">
					<?php 
/* tag "a" from line 264 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Monk, 'getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
						<?php /* tag "div" from line 265 */; ?>
<div class="thumbnail">
							<?php 
/* tag "img" from line 266 */ ;
$ctx->noThrow(true) ;
if (!phptal_isempty($_tmp_3 = ($ctx->path($ctx->Monk, 'getURLPic', true)))):  ;
$_tmp_3 = ' src="'.phptal_escape($_tmp_3).'"' ;
elseif (null !== ($_tmp_3 = ('/data/images/exit_picture.jpg'))):  ;
$_tmp_3 = ' src="'.phptal_escape($_tmp_3).'"' ;
endif ;
$ctx->noThrow(false) ;
if (null !== ($_tmp_2 = ($ctx->Monk->getPreName() . ' ' . $ctx->Monk->getName() . ' ' . $ctx->Monk->getPagoda()))):  ;
$_tmp_2 = ' data-original-title="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img class="monk-tooltip" data-toggle="tooltip" data-placement="bottom"<?php echo $_tmp_3 ?>
<?php echo $_tmp_2 ?>
/>
						</div>
					</a>
				</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

			</ul>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_TopVideoBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->Panel = new PHPTAL_RepeatController($ctx->PanelCategoryVideoAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->Panel as $ctx->Panel): ;
?>
<div class="box radius">
		<?php /* tag "div" from line 237 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 238 */; ?>
<div class="b-t-icon-content"><?php echo phptal_escape($ctx->path($ctx->Panel, 'getName')); ?>
</div>
		</div>
		<?php /* tag "div" from line 240 */; ?>
<div class="b-content">
			<?php /* tag "ul" from line 241 */; ?>
<ul class="grid-item-2 thumbnails reset-margin">
				<?php 
/* tag "li" from line 242 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Category = new PHPTAL_RepeatController($ctx->path($ctx->Panel, 'getDetailAll'))
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Category as $ctx->Category): ;
?>
<li class="span2">
					<?php 
/* tag "a" from line 243 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Category, 'getCategoryVideo/getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
						<?php /* tag "div" from line 244 */; ?>
<div class="thumbnail">
							<?php 
/* tag "img" from line 245 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Category, 'getCategoryVideo/getPicture')))):  ;
$_tmp_4 = ' src="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<img<?php echo $_tmp_4 ?>
/>
							<?php /* tag "p" from line 246 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->Category, 'getCategoryVideo/getName')); ?>
</p>
						</div>
					</a>
				</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

			</ul>
		</div>
	</div><?php 
endforeach ;
$ctx = $tpl->popContext() ;

}

?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_TopNewsBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 212 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 213 */; ?>
<div class="b-t-icon-content">Tin tức nổi bật</div>
		</div>
		<?php /* tag "div" from line 215 */; ?>
<div class="b-content">			
			<?php /* tag "div" from line 216 */; ?>
<div id="BoxNewsCarousel" class="carousel slide sidebar-slide reset-margin">
				<?php /* tag "div" from line 217 */; ?>
<div class="carousel-inner">
					<?php /* tag "div" from line 218 */; ?>
<div class="active item">
						<?php 
/* tag "a" from line 219 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->PanelNewsAll, 'current/getNews/getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
							<?php 
/* tag "img" from line 220 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->PanelNewsAll, 'current/getNews/getImage')))):  ;
$_tmp_3 = ' src="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<img<?php echo $_tmp_3 ?>
/>
							<?php /* tag "div" from line 221 */; ?>
<div class="carousel-caption">
								<?php /* tag "p" from line 222 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->PanelNewsAll, 'current/getNews/getTitle')); ?>
</p>
							</div>
						</a>
					</div>					
				</div>
				<?php /* tag "a" from line 227 */; ?>
<a class="carousel-control left" href="#BoxNewsCarousel" data-slide="prev">&lsaquo;</a>
				<?php /* tag "a" from line 228 */; ?>
<a class="carousel-control right" href="#BoxNewsCarousel" data-slide="next">&rsaquo;</a>
			</div>			
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_PictureBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 198 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 199 */; ?>
<div class="b-t-icon-content">Ảnh Hoạt Động</div>
		</div>
		<?php /* tag "div" from line 201 */; ?>
<div class="b-content">
			<?php /* tag "a" from line 202 */; ?>
<a href="/thu-vien-anh">
				<?php /* tag "img" from line 203 */; ?>
<img width="100%" src="/data/images/logo/top_img.jpg"/>
			</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_BuddhaBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 167 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 168 */; ?>
<div class="b-t-icon-content">Phật Âm</div>
		</div>
		<?php /* tag "div" from line 170 */; ?>
<div class="b-content">
			<?php /* tag "div" from line 171 */; ?>
<div id="BuddhaCarousel" class="carousel slide carousel-fade sidebar-slide reset-margin">
				<?php /* tag "ol" from line 172 */; ?>
<ol class="carousel-indicators">
					<?php /* tag "li" from line 173 */; ?>
<li data-target="#BuddhaCarousel" data-slide-to="0" class="active"></li>
					<?php /* tag "li" from line 174 */; ?>
<li data-target="#BuddhaCarousel" data-slide-to="1"></li>
					<?php /* tag "li" from line 175 */; ?>
<li data-target="#BuddhaCarousel" data-slide-to="2"></li>
				</ol>
				<?php /* tag "div" from line 177 */; ?>
<div class="carousel-inner">
					<?php /* tag "div" from line 178 */; ?>
<div class="active item">
						<?php /* tag "a" from line 179 */; ?>
<a href="/phat-am/bac-tong"><?php /* tag "img" from line 179 */; ?>
<img src="/data/images/logo/bac_tong.jpg"/></a>
					</div>
					<?php /* tag "div" from line 181 */; ?>
<div class="item">
						<?php /* tag "a" from line 182 */; ?>
<a href="/phat-am/nam-tong"><?php /* tag "img" from line 182 */; ?>
<img src="/data/images/logo/nam_tong.jpg"/></a>
					</div>
					<?php /* tag "div" from line 184 */; ?>
<div class="item">
						<?php /* tag "a" from line 185 */; ?>
<a href="/phat-am/tong-hop"><?php /* tag "img" from line 185 */; ?>
<img src="/data/images/logo/tong_hop.jpg"/></a>
					</div>
				</div>
				<?php /* tag "a" from line 188 */; ?>
<a class="carousel-control left" href="#BuddhaCarousel" data-slide="prev">&lsaquo;</a>
				<?php /* tag "a" from line 189 */; ?>
<a class="carousel-control right" href="#BuddhaCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_TaskBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 136 */; ?>
<div class="b-title"><?php /* tag "div" from line 136 */; ?>
<div class="b-t-icon-content">Các hoạt động</div></div>
		<?php /* tag "div" from line 137 */; ?>
<div class="b-content">
			<?php /* tag "div" from line 138 */; ?>
<div class="g4"><?php /* tag "div" from line 138 */; ?>
<div id="eventCalendarLocale"></div></div>
			<?php /* tag "script" from line 139 */; ?>
<script type="text/javascript">
				/*<![CDATA[*/
				$(document).ready(function() {
					$("#eventCalendarLocale").eventCalendar({
						eventsjson: '/mvc/templates/script/events.json.php',
						eventsjson: '/task',
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
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_Header(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="row reset-margin">
		<?php /* tag "div" from line 55 */; ?>
<div class="header">
			<?php /* tag "a" from line 56 */; ?>
<a href="/gate">
				<?php /* tag "object" from line 61 */; ?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" title="Chùa Phước Hưng" height="282" width="940">
					<?php /* tag "param" from line 62 */; ?>
<param name="movie" value="/data/images/flash/banner.swf"/>
					<?php /* tag "param" from line 63 */; ?>
<param name="quality" value="high"/>
					<?php /* tag "embed" from line 69 */; ?>
<embed src="/data/images/flash/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" height="282" width="940"></embed>
				</object>
			</a>
		</div>
		<?php /* tag "div" from line 73 */; ?>
<div class="top-menu">
			<?php /* tag "ul" from line 74 */; ?>
<ul class="nav nav-pills">
				<?php 
/* tag "li" from line 75 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='Home'?'active':'?'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
><?php /* tag "a" from line 75 */; ?>
<a href="/trang-chu">Trang chủ</a></li>
				<?php 
/* tag "li" from line 76 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='Introduction'?'active':'?'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
><?php /* tag "a" from line 76 */; ?>
<a href="/gioi-thieu">Giới thiệu</a></li>
				<?php 
/* tag "li" from line 77 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='ReadCategory'?'active dropdown':'dropdown'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
					<?php /* tag "a" from line 78 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">Tin tức <?php /* tag "b" from line 78 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 79 */; ?>
<ul class="dropdown-menu">
						<?php 
/* tag "li" from line 80 */ ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->Category = new PHPTAL_RepeatController($ctx->CategoryNewsAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->Category as $ctx->Category): ;
?>
<li>
							<?php 
/* tag "a" from line 81 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Category, 'getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
><?php echo phptal_escape($ctx->path($ctx->Category, 'getName')); ?>
</a>
						</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

					</ul>
				</li>
				<?php 
/* tag "li" from line 85 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='Course'?'active':'?'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
><?php /* tag "a" from line 85 */; ?>
<a href="/dao-tao">Đào tạo</a></li>
				<?php 
/* tag "li" from line 86 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='Event'?'active':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
><?php /* tag "a" from line 86 */; ?>
<a href="/su-kien">Sự kiện</a></li>
				<?php 
/* tag "li" from line 87 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='LibraryVideo'?'active dropdown':'dropdown'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
					<?php /* tag "a" from line 88 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">PHẬT ÂM <?php /* tag "b" from line 88 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 89 */; ?>
<ul class="dropdown-menu">
						<?php 
/* tag "li" from line 90 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Category = new PHPTAL_RepeatController($ctx->CategoryBTypeAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Category as $ctx->Category): ;
?>
<li>
							<?php 
/* tag "a" from line 91 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Category, 'getURLView')))):  ;
$_tmp_2 = ' href="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<a<?php echo $_tmp_2 ?>
><?php echo phptal_escape($ctx->Category->getName() . '(' . $ctx->Category->getVideoAllCountPrint() . ')'); ?>
</a>
						</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

					</ul>
				</li>
				<?php 
/* tag "li" from line 95 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='Ask'?'active dropdown':'dropdown'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "a" from line 96 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">Hỏi đáp <?php /* tag "b" from line 96 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 97 */; ?>
<ul class="dropdown-menu">
						<?php /* tag "li" from line 98 */; ?>
<li>
							<?php 
/* tag "a" from line 99 */ ;
if (null !== ($_tmp_3 = ('/hoi-dap/dat-cau-hoi'))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>Đặt câu hỏi</a>
						</li>
						<?php 
/* tag "li" from line 101 */ ;
$_tmp_1 = $ctx->repeat ;
$_tmp_1->Category = new PHPTAL_RepeatController($ctx->CategoryAskAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_1->Category as $ctx->Category): ;
?>
<li>
							<?php 
/* tag "a" from line 102 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Category, 'getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
><?php echo phptal_escape($ctx->path($ctx->Category, 'getName')); ?>
</a>
						</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

					</ul>
				</li>	
				<?php 
/* tag "li" from line 106 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='LibraryAlbum'?'active':'?'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
><?php /* tag "a" from line 106 */; ?>
<a href="/thu-vien-anh">Ảnh hoạt động</a></li>
				<?php 
/* tag "li" from line 107 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='Pagoda'?'active dropdown':'dropdown'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
					<?php /* tag "a" from line 108 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">Danh bạ Chùa <?php /* tag "b" from line 108 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 109 */; ?>
<ul class="dropdown-menu">
						<?php 
/* tag "li" from line 110 */ ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->Pagoda = new PHPTAL_RepeatController($ctx->PagodaAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->Pagoda as $ctx->Pagoda): ;
?>
<li>
							<?php 
/* tag "a" from line 111 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Pagoda, 'getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
><?php echo phptal_escape($ctx->path($ctx->Pagoda, 'getName')); ?>
</a>
						</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

					</ul>
				</li>
				<?php 
/* tag "li" from line 115 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='Sponsor'?'active dropdown':'dropdown'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
>
					
					<?php /* tag "a" from line 117 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">Từ thiện <?php /* tag "b" from line 117 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 118 */; ?>
<ul class="dropdown-menu">
						<?php /* tag "li" from line 119 */; ?>
<li><?php /* tag "a" from line 119 */; ?>
<a href="/so-vang">Sổ vàng</a></li>
						<!--
						<li tal:repeat="Sponsor SponsorAll">
							<a tal:attributes="href Sponsor/getURLView" tal:content="Sponsor/getName"></a>
						</li>
						!-->
					</ul>
				</li>
				<?php 
/* tag "li" from line 127 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='Contact'?'active':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
><?php /* tag "a" from line 127 */; ?>
<a href="/lien-he">Liên hệ</a></li>				
			</ul>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_IncludeJS(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<!--
		<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery-1.7.1.min.js"/>
		!-->
		<?php /* tag "script" from line 41 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery-1.7.1.min.js"></script>
		<?php /* tag "script" from line 42 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery.countdown.js"></script>
		<?php /* tag "script" from line 43 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/amlich-hnd.js"></script>
		<?php /* tag "script" from line 44 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery.eventCalendar.js"></script>
		<?php /* tag "script" from line 45 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery.timeago.js"></script>		
		<?php /* tag "script" from line 46 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery.session.js"></script>
		<?php /* tag "script" from line 47 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/theme/bootstrap/js/bootstrap.js"></script>
		<?php /* tag "script" from line 48 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/user/base.js"></script>
	</span><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_IncludeCSS(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "link" from line 27 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/jquery.countdown.css"/> 
		<?php /* tag "link" from line 28 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/eventCalendar.css"/>
		<?php /* tag "link" from line 29 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/eventCalendar_theme.css"/>	
		<?php /* tag "link" from line 30 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/bootstrap/css/bootstrap.css" media="screen"/>
		<?php /* tag "link" from line 31 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/bootstrap/css/base.css"/>
	</span><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg_IncludeMETA(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "title" from line 7 */; ?>
<title><?php echo 'Website Chùa Phước Hưng - Tam Bình - Vĩnh Long'; ?>
</title>
		<?php /* tag "base" from line 8 */; ?>
<base href="http://chuaphuochung.com"/>
		<?php /* tag "meta" from line 9 */; ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<!--
		<meta http-equiv="Pragma" content="no-cache"/>
		<meta http-equiv="Expires" content="-1"/>
		<meta http-equiv="Cache-Control" content="no-cache"/>
		!-->
		<?php /* tag "meta" from line 15 */; ?>
<meta name="keywords" content="Chùa Phước Hưng"/>
		<?php /* tag "meta" from line 16 */; ?>
<meta name="description" content="Website Chùa Phước Hưng giới thiệu về một ngôi chùa ở ấp Thạnh Hiệp, xã Hòa Thành, huyện Tam Bình, T.Vĩnh Long, Việt Nam"/>
		<?php /* tag "meta" from line 17 */; ?>
<meta name="page-topic" content="Chùa Phước Hưng"/>
		<?php /* tag "meta" from line 18 */; ?>
<meta name="Abstract" content="Website Chùa Phước Hưng giới thiệu về một ngôi chùa ở ấp Thạnh Hiệp, xã Hòa Thành, huyện Tam Bình, T.Vĩnh Long, Việt Nam"/>
		<?php /* tag "meta" from line 19 */; ?>
<meta name="classification" content="Chùa Phước Hưng, thiết kế Web, SPN, Nguyên Phong, quay phim, chụp hình"/>
		<?php /* tag "link" from line 20 */; ?>
<link rel="shortcut icon" href="/data/images/logo/favicon.ico" type="image/x-icon"/>
	</span><?php 
}

 ?>
<?php 
function tpl_52294253_base__8qXSi0A4GAFM7XAR0273eg(PHPTAL $tpl, PHPTAL_Context $ctx) {
$_thistpl = $tpl ;
$_translator = $tpl->getTranslator() ;
/* tag "documentElement" from line 1 */ ;
/* tag "html" from line 1 */ ;
?>
<html lang="en" xml:lang="en">
<?php /* tag "body" from line 2 */; ?>
<body>
	<!-- ======================================================================== -->
	<!-- META TAG INCLUDE														  -->
	<!-- ======================================================================== -->
	<?php /* tag "span" from line 6 */; ?>

	
	<!-- ======================================================================== -->
	<!-- CASCADING STYLE SHEETS INCLUDE											  -->
	<!-- ======================================================================== -->
	<?php /* tag "span" from line 26 */; ?>

	
	<!-- ======================================================================== -->
	<!-- JAVASCRIPT INCLUDE														  -->
	<!-- ======================================================================== -->
	<?php /* tag "span" from line 37 */; ?>

	
	<!-- ======================================================================== -->
	<!-- HEADER																	  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 54 */; ?>

	
	<!-- ======================================================================== -->
	<!-- LỊCH CÔNG TÁC															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 135 */; ?>

	
	<!-- ======================================================================== -->
	<!-- PHẬT ÂM 																  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 166 */; ?>

	
	<!-- ======================================================================== -->
	<!-- ẢNH HOẠT ĐỘNG															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 197 */; ?>

	
	<!-- ======================================================================== -->
	<!-- TIN TỨC MỚI CẬP NHẬT													  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 211 */; ?>

	
	<!-- ======================================================================== -->
	<!-- VIDEO MỚI CẬP NHẬT														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 236 */; ?>

	
	<!-- ======================================================================== -->
	<!-- GIẢNG SƯ NỔI BẬT														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 257 */; ?>

	
	<!-- ======================================================================== -->
	<!-- HỎI - ĐÁP PHẬT HỌC														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 277 */; ?>

	
	<!-- ======================================================================== -->
	<!-- FIXED FUNCTION															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 291 */; ?>

	
	<!-- ======================================================================== -->
	<!-- TRỢ DUYÊN - ỦNG HỘ														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 305 */; ?>

	
	<!-- ======================================================================== -->
	<!-- LIÊN HỆ																  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 319 */; ?>

	
	<!-- ======================================================================== -->
	<!-- LỊCH																	  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 326 */; ?>

	
	<!-- ======================================================================== -->
	<!-- THANH TIÊU ĐỀ LỊCH DƯƠNG - ÂM											  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 363 */; ?>

	
	<!-- ======================================================================== -->
	<!-- SỰ KIỆN																  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 377 */; ?>

	
	<!-- ======================================================================== -->
	<!-- KHÓA HỌC SẮP KHAI GIẢNG												  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 408 */; ?>

	
	<!-- ======================================================================== -->
	<!-- POPUP QUẢNG CÁO														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 433 */; ?>

	
	<!-- ======================================================================== -->
	<!-- FOOTER																	  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 495 */; ?>

	
	<!-- ======================================================================== -->
	<!-- BACK ON TOP															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 533 */; ?>

	
</body>
</html><?php 
/* end */ ;

}

?>
<?php /* 
*** DO NOT EDIT THIS FILE ***

Generated by PHPTAL from D:\Projects\WEBAPP\Pagoda\chuaphuochung.com\mvc\templates\base.xhtml (edit that file instead) */; ?>