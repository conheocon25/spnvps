<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_Backontop(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="crunchify-top" data-toggle="tooltip" data-placement="left" data-original-title="Chuyển đến đầu trang"></div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_Footer(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="row reset-margin footer">
		<?php /* tag "div" from line 473 */; ?>
<div class="top-menu">
			<?php /* tag "ul" from line 474 */; ?>
<ul class="nav nav-pills">
				<?php /* tag "li" from line 475 */; ?>
<li><?php /* tag "a" from line 475 */; ?>
<a href="/trang-chu">Trang chủ</a></li>								
				<?php /* tag "li" from line 476 */; ?>
<li><?php /* tag "a" from line 476 */; ?>
<a href="/tin-tuc">Tin tức</a></li>
				<?php /* tag "li" from line 477 */; ?>
<li><?php /* tag "a" from line 477 */; ?>
<a href="/dao-tao">Đào tạo</a></li>
				<?php /* tag "li" from line 478 */; ?>
<li><?php /* tag "a" from line 478 */; ?>
<a href="/su-kien">Sự kiện</a></li>				
				<?php /* tag "li" from line 479 */; ?>
<li><?php /* tag "a" from line 479 */; ?>
<a href="/phat-am">PHẬT ÂM</a></li>
				<?php /* tag "li" from line 480 */; ?>
<li><?php /* tag "a" from line 480 */; ?>
<a href="/hoi-dap/dat-cau-hoi">Hỏi đáp</a></li>
				<?php /* tag "li" from line 481 */; ?>
<li><?php /* tag "a" from line 481 */; ?>
<a href="/thu-vien-anh">Ảnh hoạt động</a></li>
				<?php /* tag "li" from line 482 */; ?>
<li><?php /* tag "a" from line 482 */; ?>
<a href="/chua-ban">Danh bạ</a></li>
				<?php /* tag "li" from line 483 */; ?>
<li><?php /* tag "a" from line 483 */; ?>
<a href="/lien-he">Liên hệ</a></li>
				<?php /* tag "li" from line 484 */; ?>
<li id="last"><?php /* tag "a" from line 484 */; ?>
<a href="/signin/load">Quản trị</a></li>
			</ul>
		</div>
		<?php /* tag "div" from line 487 */; ?>
<div class="row reset-margin">
			<?php /* tag "div" from line 488 */; ?>
<div class="span6 reset-margin">
				<?php /* tag "div" from line 489 */; ?>
<div class="f-left">
					<?php /* tag "p" from line 490 */; ?>
<p><?php /* tag "b" from line 490 */; ?>
<b>Địa chỉ:</b> 319B2 - Mỹ Phú - Mỹ Đức Đông - Cái Bè - Tiền Giang - Việt Nam</p>
					<?php /* tag "p" from line 491 */; ?>
<p><?php /* tag "b" from line 491 */; ?>
<b>Điện thoại:</b> (073) 3600 943 - <?php /* tag "b" from line 491 */; ?>
<b>Di Động:</b> 0918 852 102</p>
					<?php /* tag "p" from line 492 */; ?>
<p><?php /* tag "b" from line 492 */; ?>
<b>Email:</b> nhuantamkhaituong@gmail.com (nhuantam@chuakhaituong.com)</p>
					<?php /* tag "p" from line 493 */; ?>
<p><?php /* tag "b" from line 493 */; ?>
<b>Website:</b> <?php /* tag "i" from line 493 */; ?>
<i><?php /* tag "u" from line 493 */; ?>
<u>chuakhaituong.com</u></i>, <?php /* tag "i" from line 493 */; ?>
<i><?php /* tag "u" from line 493 */; ?>
<u>quocankhaituongtu.com</u></i>, <?php /* tag "i" from line 493 */; ?>
<i><?php /* tag "u" from line 493 */; ?>
<u>chuaquocankhaituong.vn</u></i></p>
				</div>
			</div>
			<?php /* tag "div" from line 496 */; ?>
<div class="span6 pull-right reset-margin">
				<?php /* tag "div" from line 497 */; ?>
<div class="f-right">
					<?php /* tag "p" from line 498 */; ?>
<p><?php /* tag "b" from line 498 */; ?>
<b>© 12/2012 Chùa Khải Tường</b></p>
					<?php /* tag "p" from line 499 */; ?>
<p>Biên tập - Đại Đức Thích Nhuận Tâm</p>
					<?php /* tag "p" from line 500 */; ?>
<p>Phát triển - SPN Co, Ltd &amp; Nguyên Phong Studio</p>
					<?php /* tag "p" from line 501 */; ?>
<p>Ghi rõ nguồn <?php /* tag "b" from line 501 */; ?>
<b><?php /* tag "i" from line 501 */; ?>
<i>chuakhaituong.com</i></b> khi phát hành thông tin từ website này</p>
				</div>
			</div>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_Popup(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div>
		<?php /* tag "script" from line 424 */; ?>
<script>
		/*<![CDATA[*/
			$(document).ready(function(){
				$(".hide-popup").hide(function(){
					$("#ads-open").show();
				});
				$("#ads-open").hide();
				$("#ads-open").click( function(){
					$("#ads-open").slideUp('slow', function(){
						$(".ads-popup").slideDown('slow');
					});
				});
				$(".ads-close").click( function(){
					$(".ads-popup").slideUp('slow', function(){
						$("#ads-open").slideDown('slow');
					});
				});
			});
		/*]]>*/
		</script>
		<?php 
/* tag "div" from line 444 */ ;
if ($ctx->path($ctx->Popup, 'getEnable')):  ;
?>
<div class="ads-popup ads-popup-center">
			<?php /* tag "div" from line 445 */; ?>
<div class="ads-close"><?php /* tag "i" from line 445 */; ?>
<i class="icon-chevron-down icon-white"></i></div>
			<?php /* tag "div" from line 446 */; ?>
<div id="PopupCarousel" class="carousel slide carousel-fade popup-slide reset-margin">
				<?php /* tag "ol" from line 447 */; ?>
<ol class="carousel-indicators">
					<?php /* tag "li" from line 448 */; ?>
<li data-target="#PopupCarousel" data-slide-to="0" class="active"></li>
				</ol>
				<?php /* tag "div" from line 450 */; ?>
<div class="carousel-inner">
					
					<?php /* tag "div" from line 452 */; ?>
<div class="active item">
						<?php 
/* tag "a" from line 453 */ ;
if (null !== ($_tmp_1 = ('#'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
							<?php 
/* tag "img" from line 454 */ ;
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
/* tag "div" from line 458 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Sponsor = new PHPTAL_RepeatController($ctx->SponsorAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Sponsor as $ctx->Sponsor): ;
?>
<div class="item">
						<?php 
/* tag "a" from line 459 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Sponsor, 'getURLView')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
>
							<?php 
/* tag "img" from line 460 */ ;
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

		<?php /* tag "div" from line 466 */; ?>
<div id="ads-open" class="ads-open-center"><?php /* tag "i" from line 466 */; ?>
<i class="icon-chevron-up icon-white"></i></div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_CourseBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
if ($ctx->path($ctx->Course, 'getLessionNext')):  ;
?>
<div class="box radius">
		<?php /* tag "div" from line 399 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 400 */; ?>
<div class="b-t-icon-content">Sắp khai giảng</div>
		</div>
		<?php /* tag "div" from line 402 */; ?>
<div class="b-content">
			<?php /* tag "div" from line 403 */; ?>
<div align="center" style="padding-top:10px;">
				<?php 
/* tag "a" from line 404 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Course, 'getLessionNext/getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
					<?php 
/* tag "img" from line 405 */ ;
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
			<?php /* tag "div" from line 408 */; ?>
<div align="center" style="padding:10px;">
				<?php 
/* tag "a" from line 409 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Course, 'getLessionNext/getURLRead')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a style="font-size:12px; color:#980707; line-height:30px;"<?php echo $_tmp_4 ?>
>
					<?php /* tag "h1" from line 410 */; ?>
<h1><?php echo phptal_escape($ctx->path($ctx->Course, 'getLessionNext/getName')); ?>
</h1>
				</a>
			</div>
			<?php /* tag "div" from line 413 */; ?>
<div style="margin-left:10px;">
				<?php /* tag "div" from line 414 */; ?>
<div id="CourseCountdown"></div>
			</div>
			<?php /* tag "script" from line 416 */; ?>
<script type="text/javascript">/*<![CDATA[*/$(function(){var d1 = $("#CourseBox").attr('alt');var parts = d1.match(/(\d+)/g);var d2 = new Date(parts[0], parts[1]-1, parts[2]);var austDay = new Date();austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);$('#CourseCountdown').countdown({until: d2});});/*]]>*/</script>
		</div>
	</div><?php 
endif ;

}

?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_EventBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 368 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 369 */; ?>
<div class="b-t-icon-content">Đào tạo</div>
		</div>
		<?php /* tag "div" from line 371 */; ?>
<div id="LessionCarousel" class="carousel slide carousel-fade lession-slide reset-margin">
			<?php /* tag "div" from line 372 */; ?>
<div class="carousel-inner">
				<?php /* tag "div" from line 373 */; ?>
<div class="active item">
					<?php 
/* tag "a" from line 374 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Course, 'getLessions/current/getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
						<?php 
/* tag "img" from line 375 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Course, 'getLessions/current/getImage')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img<?php echo $_tmp_2 ?>
/>
						<?php /* tag "div" from line 376 */; ?>
<div class="carousel-caption">
							<?php /* tag "p" from line 377 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->Course, 'getLessions/current/getName')); ?>
</p>
						</div>
					</a>
				</div>
				<?php 
/* tag "div" from line 381 */ ;
$_tmp_1 = $ctx->repeat ;
$_tmp_1->Lession = new PHPTAL_RepeatController($ctx->path($ctx->Course, 'getLessions'))
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_1->Lession as $ctx->Lession): ;
?>
<div class="item">
					<?php 
/* tag "a" from line 382 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Lession, 'getURLRead')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
>
						<?php 
/* tag "img" from line 383 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Lession, 'getImage')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img<?php echo $_tmp_2 ?>
/>
						<?php /* tag "div" from line 384 */; ?>
<div class="carousel-caption">
							<?php /* tag "p" from line 385 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->Lession, 'getName')); ?>
</p>
						</div>
					</a>
				</div><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

			</div>
			<?php /* tag "a" from line 390 */; ?>
<a class="carousel-control left" href="#LessionCarousel" data-slide="prev">&lsaquo;</a>
			<?php /* tag "a" from line 391 */; ?>
<a class="carousel-control right" href="#LessionCarousel" data-slide="next">&rsaquo;</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_CallendarBar(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="row reset-margin date-time">
		<?php /* tag "div" from line 354 */; ?>
<div id="date-time" class="span6 fix-width">
			<?php /* tag "script" from line 355 */; ?>
<script type="text/javascript">getLunarDateString(09,11,2012,16,39,13);</script>
		</div>
		<?php /* tag "div" from line 357 */; ?>
<div class="span6 fix-width">
			<?php /* tag "marquee" from line 358 */; ?>
<marquee behavior="scroll" direction="left" scrollamount="1">
				Kính chúc chư tôn đức tăng ni cùng quý phật tử thân tâm thường an lạc ! Nguyện đem công đức này hướng về khắp tất cả đệ tử và chúng sanh đều trọn thành Phật Đạo.
			</marquee>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_CallendarBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 317 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 318 */; ?>
<div class="b-t-icon-content">Lịch Dương <?php /* tag "small" from line 318 */; ?>
<small>Âm</small></div>
		</div>
		<?php /* tag "div" from line 320 */; ?>
<div class="b-content padding-content">
			<?php /* tag "table" from line 321 */; ?>
<table class="calendar-paper" width="100%" border="0" cellpadding="1" cellspacing="1">
				<?php /* tag "tbody" from line 322 */; ?>
<tbody>
					<?php /* tag "tr" from line 323 */; ?>
<tr><?php /* tag "td" from line 323 */; ?>
<td colspan="2" id="thangduong" class="thangduong"></td></tr>
					<?php /* tag "tr" from line 324 */; ?>
<tr><?php /* tag "td" from line 324 */; ?>
<td colspan="2" id="ngayduong" class="ngayduong"></td></tr>
					<?php /* tag "tr" from line 325 */; ?>
<tr><?php /* tag "td" from line 325 */; ?>
<td colspan="2" id="thuduong" class="thuduong"></td></tr>
					<?php /* tag "tr" from line 326 */; ?>
<tr>
						<?php /* tag "td" from line 327 */; ?>
<td> 
							<?php /* tag "div" from line 328 */; ?>
<div id="thangam" class="thangam"></div>
							<?php /* tag "div" from line 329 */; ?>
<div id="ngayam" class="ngayam"></div>
							<?php /* tag "div" from line 330 */; ?>
<div id="namam" class="namam"></div>
						</td>
						<?php /* tag "td" from line 332 */; ?>
<td class="canchi">
							<?php /* tag "div" from line 333 */; ?>
<div id="canchithang" class="gioam"></div>
							<?php /* tag "div" from line 334 */; ?>
<div id="canchingay" class="gioam"></div>
						</td>
					</tr>
					<?php /* tag "tr" from line 337 */; ?>
<tr><?php /* tag "td" from line 337 */; ?>
<td colspan="2" id="hoangdao" class="hoangdao"></td></tr>
				</tbody>
			</table>
			<?php /* tag "script" from line 340 */; ?>
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
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_ContactBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box">
		<?php /* tag "div" from line 310 */; ?>
<div class="b-content"><?php /* tag "a" from line 310 */; ?>
<a href="/lien-he"><?php /* tag "img" from line 310 */; ?>
<img width="100%" src="/data/images/logo/contact.jpg"/></a></div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_SponsorBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 296 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 297 */; ?>
<div class="b-t-icon-content">Trợ Duyên</div>
		</div>
		<?php /* tag "div" from line 299 */; ?>
<div class="b-content">
			<?php /* tag "a" from line 300 */; ?>
<a href="/so-vang">
				<?php /* tag "img" from line 301 */; ?>
<img width="100%" src="/data/images/logo/sponsor.jpg"/>
			</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_FixedFunction(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="fixed-function">
		<?php /* tag "div" from line 282 */; ?>
<div class="fb-like fb_edge_widget_with_comment fb_iframe_widget" data-href="https://www.facebook.com/ChuaKhaiTuong" data-send="false" data-layout="box_count" data-width="450" data-show-faces="false" data-font="tahoma" fb-xfbml-state="rendered"></div>
		<?php /* tag "div" from line 283 */; ?>
<div class="bubble"><?php echo phptal_escape(\MVC\Library\Statistic::getCountPrint()); ?>
</div>
		<?php /* tag "p" from line 284 */; ?>
<p class="bubble-item">Truy cập</p>
		<?php /* tag "div" from line 285 */; ?>
<div class="bubble">
			<?php /* tag "img" from line 286 */; ?>
<img src="/data/images/logo/count_logo.gif"/>
			<?php /* tag "span" from line 287 */; ?>
<span><?php echo phptal_escape(\MVC\Library\Statistic::getOnlinePrint()); ?>
</span>
		</div>
		<?php /* tag "p" from line 289 */; ?>
<p class="bubble-item">Trực tuyến</p>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_AskBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 268 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 269 */; ?>
<div class="b-t-icon-content">Hỏi &amp; Đáp PHẬT HỌC</div>
		</div>
		<?php /* tag "div" from line 271 */; ?>
<div class="b-content">
			<?php /* tag "a" from line 272 */; ?>
<a href="/hoi-dap/dat-cau-hoi">
				<?php /* tag "img" from line 273 */; ?>
<img width="100%" src="/data/images/logo/question.jpg"/>
			</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_TopMonkBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 248 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 249 */; ?>
<div class="b-t-icon-content">GIẢNG SƯ NỔI BẬT</div>
		</div>
		<?php /* tag "div" from line 251 */; ?>
<div class="b-content">
			<?php /* tag "ul" from line 252 */; ?>
<ul class="grid-item-3 thumbnails reset-margin">
				<?php 
/* tag "li" from line 253 */ ;
$_tmp_4 = $ctx->repeat ;
$_tmp_4->Monk = new PHPTAL_RepeatController($ctx->MonkAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_4->Monk as $ctx->Monk): ;
?>
<li class="span2">
					<?php 
/* tag "a" from line 254 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Monk, 'getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
						<?php /* tag "div" from line 255 */; ?>
<div class="thumbnail">
							<?php 
/* tag "img" from line 256 */ ;
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
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_TopVideoBox(PHPTAL $_thistpl, PHPTAL $tpl) {
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
		<?php /* tag "div" from line 227 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 228 */; ?>
<div class="b-t-icon-content"><?php echo phptal_escape($ctx->path($ctx->Panel, 'getName')); ?>
</div>
		</div>
		<?php /* tag "div" from line 230 */; ?>
<div class="b-content">
			<?php /* tag "ul" from line 231 */; ?>
<ul class="grid-item-2 thumbnails reset-margin">
				<?php 
/* tag "li" from line 232 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Category = new PHPTAL_RepeatController($ctx->path($ctx->Panel, 'getDetailAll'))
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Category as $ctx->Category): ;
?>
<li class="span2">
					<?php 
/* tag "a" from line 233 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Category, 'getCategoryVideo/getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
						<?php /* tag "div" from line 234 */; ?>
<div class="thumbnail">
							<?php 
/* tag "img" from line 235 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Category, 'getCategoryVideo/getPicture')))):  ;
$_tmp_4 = ' src="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<img<?php echo $_tmp_4 ?>
/>
							<?php /* tag "p" from line 236 */; ?>
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
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_TopNewsBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 202 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 203 */; ?>
<div class="b-t-icon-content">Tin tức nổi bật</div>
		</div>
		<?php /* tag "div" from line 205 */; ?>
<div class="b-content">			
			<?php /* tag "div" from line 206 */; ?>
<div id="BoxNewsCarousel" class="carousel slide sidebar-slide reset-margin">
				<?php /* tag "div" from line 207 */; ?>
<div class="carousel-inner">
					<?php /* tag "div" from line 208 */; ?>
<div class="active item">
						<?php 
/* tag "a" from line 209 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->PanelNewsAll, 'current/getNews/getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
							<?php 
/* tag "img" from line 210 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->PanelNewsAll, 'current/getNews/getImage')))):  ;
$_tmp_3 = ' src="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<img<?php echo $_tmp_3 ?>
/>
							<?php /* tag "div" from line 211 */; ?>
<div class="carousel-caption">
								<?php /* tag "p" from line 212 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->PanelNewsAll, 'current/getNews/getTitle')); ?>
</p>
							</div>
						</a>
					</div>					
				</div>
				<?php /* tag "a" from line 217 */; ?>
<a class="carousel-control left" href="#BoxNewsCarousel" data-slide="prev">&lsaquo;</a>
				<?php /* tag "a" from line 218 */; ?>
<a class="carousel-control right" href="#BoxNewsCarousel" data-slide="next">&rsaquo;</a>
			</div>			
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_PictureBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 188 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 189 */; ?>
<div class="b-t-icon-content">Ảnh Hoạt Động</div>
		</div>
		<?php /* tag "div" from line 191 */; ?>
<div class="b-content">
			<?php /* tag "a" from line 192 */; ?>
<a href="/thu-vien-anh">
				<?php /* tag "img" from line 193 */; ?>
<img width="100%" src="/data/images/logo/top_img.jpg"/>
			</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_BuddhaBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 161 */; ?>
<div class="b-title">
			<?php /* tag "div" from line 162 */; ?>
<div class="b-t-icon-content">Phật Âm</div>
		</div>
		<?php /* tag "div" from line 164 */; ?>
<div class="b-content">
			<?php /* tag "div" from line 165 */; ?>
<div id="BuddhaCarousel" class="carousel slide carousel-fade sidebar-slide reset-margin">
				<?php /* tag "ol" from line 166 */; ?>
<ol class="carousel-indicators">
					<?php /* tag "li" from line 167 */; ?>
<li data-target="#BuddhaCarousel" data-slide-to="0" class="active"></li>
					<?php /* tag "li" from line 168 */; ?>
<li data-target="#BuddhaCarousel" data-slide-to="1"></li>
				</ol>
				<?php /* tag "div" from line 170 */; ?>
<div class="carousel-inner">
					<?php /* tag "div" from line 171 */; ?>
<div class="active item">
						<?php /* tag "a" from line 172 */; ?>
<a href="/phat-am/bac-tong"><?php /* tag "img" from line 172 */; ?>
<img src="/data/images/logo/bac_tong.jpg"/></a>
					</div>
					<?php /* tag "div" from line 174 */; ?>
<div class="item">
						<?php /* tag "a" from line 175 */; ?>
<a href="/phat-am/nam-tong"><?php /* tag "img" from line 175 */; ?>
<img src="/data/images/logo/nam_tong.jpg"/></a>
					</div>
				</div>
				<?php /* tag "a" from line 178 */; ?>
<a class="carousel-control left" href="#BuddhaCarousel" data-slide="prev">&lsaquo;</a>
				<?php /* tag "a" from line 179 */; ?>
<a class="carousel-control right" href="#BuddhaCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_TaskBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="box radius">
		<?php /* tag "div" from line 130 */; ?>
<div class="b-title"><?php /* tag "div" from line 130 */; ?>
<div class="b-t-icon-content">Các hoạt động</div></div>
		<?php /* tag "div" from line 131 */; ?>
<div class="b-content">
			<?php /* tag "div" from line 132 */; ?>
<div class="g4"><?php /* tag "div" from line 132 */; ?>
<div id="eventCalendarLocale"></div></div>
			<?php /* tag "script" from line 133 */; ?>
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
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_Header(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="row reset-margin">
		<?php /* tag "div" from line 49 */; ?>
<div class="header">
			<?php /* tag "a" from line 50 */; ?>
<a href="/gate">
				<?php /* tag "object" from line 55 */; ?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" title="Chùa Khải Tường" height="282" width="940">
					<?php /* tag "param" from line 56 */; ?>
<param name="movie" value="/data/images/flash/banner.swf"/>
					<?php /* tag "param" from line 57 */; ?>
<param name="quality" value="high"/>
					<?php /* tag "embed" from line 63 */; ?>
<embed src="/data/images/flash/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" height="282" width="940"></embed>
				</object>
			</a>
		</div>
		<?php /* tag "div" from line 67 */; ?>
<div class="top-menu">
			<?php /* tag "ul" from line 68 */; ?>
<ul class="nav nav-pills">
				<?php 
/* tag "li" from line 69 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='Home'?'active':'?'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
><?php /* tag "a" from line 69 */; ?>
<a href="/trang-chu">Trang chủ</a></li>
				<?php 
/* tag "li" from line 70 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='Introduction'?'active':'?'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
><?php /* tag "a" from line 70 */; ?>
<a href="/gioi-thieu">Giới thiệu</a></li>
				<?php 
/* tag "li" from line 71 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='ReadCategory'?'active dropdown':'dropdown'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
					<?php /* tag "a" from line 72 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">Tin tức <?php /* tag "b" from line 72 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 73 */; ?>
<ul class="dropdown-menu">
						<?php 
/* tag "li" from line 74 */ ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->Category = new PHPTAL_RepeatController($ctx->CategoryNewsAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->Category as $ctx->Category): ;
?>
<li>
							<?php 
/* tag "a" from line 75 */ ;
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
/* tag "li" from line 79 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='Course'?'active':'?'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
><?php /* tag "a" from line 79 */; ?>
<a href="/dao-tao">Đào tạo</a></li>
				<?php 
/* tag "li" from line 80 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='Event'?'active':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
><?php /* tag "a" from line 80 */; ?>
<a href="/su-kien">Sự kiện</a></li>
				<?php 
/* tag "li" from line 81 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='LibraryVideo'?'active dropdown':'dropdown'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
					<?php /* tag "a" from line 82 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">PHẬT ÂM <?php /* tag "b" from line 82 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 83 */; ?>
<ul class="dropdown-menu">
						<?php 
/* tag "li" from line 84 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Category = new PHPTAL_RepeatController($ctx->CategoryBTypeAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Category as $ctx->Category): ;
?>
<li>
							<?php 
/* tag "a" from line 85 */ ;
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
/* tag "li" from line 89 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='Ask'?'active dropdown':'dropdown'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "a" from line 90 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">Hỏi đáp <?php /* tag "b" from line 90 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 91 */; ?>
<ul class="dropdown-menu">
						<?php /* tag "li" from line 92 */; ?>
<li>
							<?php 
/* tag "a" from line 93 */ ;
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
/* tag "li" from line 95 */ ;
$_tmp_1 = $ctx->repeat ;
$_tmp_1->Category = new PHPTAL_RepeatController($ctx->CategoryAskAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_1->Category as $ctx->Category): ;
?>
<li>
							<?php 
/* tag "a" from line 96 */ ;
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
/* tag "li" from line 100 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='LibraryAlbum'?'active':'?'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
><?php /* tag "a" from line 100 */; ?>
<a href="/thu-vien-anh">Ảnh hoạt động</a></li>
				<?php 
/* tag "li" from line 101 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='Pagoda'?'active dropdown':'dropdown'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
					<?php /* tag "a" from line 102 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">Danh bạ Chùa <?php /* tag "b" from line 102 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 103 */; ?>
<ul class="dropdown-menu">
						<?php 
/* tag "li" from line 104 */ ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->Pagoda = new PHPTAL_RepeatController($ctx->PagodaAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->Pagoda as $ctx->Pagoda): ;
?>
<li>
							<?php 
/* tag "a" from line 105 */ ;
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
/* tag "li" from line 109 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='Sponsor'?'active dropdown':'dropdown'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
>
					
					<?php /* tag "a" from line 111 */; ?>
<a class="dropdown-toggle" data-toggle="dropdown">Từ thiện <?php /* tag "b" from line 111 */; ?>
<b class="caret"></b></a>
					<?php /* tag "ul" from line 112 */; ?>
<ul class="dropdown-menu">
						<?php /* tag "li" from line 113 */; ?>
<li><?php /* tag "a" from line 113 */; ?>
<a href="/so-vang">Sổ vàng</a></li>
						<!--
						<li tal:repeat="Sponsor SponsorAll">
							<a tal:attributes="href Sponsor/getURLView" tal:content="Sponsor/getName"></a>
						</li>
						!-->
					</ul>
				</li>
				<?php 
/* tag "li" from line 121 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='Contact'?'active':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
><?php /* tag "a" from line 121 */; ?>
<a href="/lien-he">Liên hệ</a></li>				
			</ul>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_IncludeJS(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "script" from line 36 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery-1.7.1.min.js"></script>
		<?php /* tag "script" from line 37 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery.countdown.js"></script>
		<?php /* tag "script" from line 38 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/amlich-hnd.js"></script>
		<?php /* tag "script" from line 39 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery.eventCalendar.js"></script>
		<?php /* tag "script" from line 40 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery.timeago.js"></script>
		<?php /* tag "script" from line 41 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/theme/bootstrap/js/bootstrap.js"></script>
		<?php /* tag "script" from line 42 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/user/base.js"></script>
	</span><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_IncludeCSS(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "link" from line 25 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/jquery.countdown.css"/> 
		<?php /* tag "link" from line 26 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/eventCalendar.css"/>
		<?php /* tag "link" from line 27 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/eventCalendar_theme.css"/>	
		<?php /* tag "link" from line 28 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/bootstrap/css/bootstrap.css" media="screen"/>
		<?php /* tag "link" from line 29 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/bootstrap/css/base.css"/>
	</span><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ_IncludeMETA(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "title" from line 7 */; ?>
<title><?php echo 'Website Chùa Khải Tường Cái Bè Tiền Giang'; ?>
</title>
		<?php /* tag "base" from line 8 */; ?>
<base href="http://chuakhaituong.com"/>
		<?php /* tag "meta" from line 9 */; ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<?php /* tag "meta" from line 10 */; ?>
<meta http-equiv="Pragma" content="no-cache"/>
		<?php /* tag "meta" from line 11 */; ?>
<meta http-equiv="Expires" content="-1"/>
		<?php /* tag "meta" from line 12 */; ?>
<meta http-equiv="Cache-Control" content="no-cache"/>
		<?php /* tag "meta" from line 13 */; ?>
<meta name="keywords" content="Chùa Khải Tường"/>
		<?php /* tag "meta" from line 14 */; ?>
<meta name="description" content="Website Chùa Khải Tường giới thiệu về một ngôi chùa ở Số 319B2, ấp Mỹ Phú, xã Mỹ Đức Đông, Cái Bè, Tiền Giang, Việt Nam"/>
		<?php /* tag "meta" from line 15 */; ?>
<meta name="page-topic" content="Chùa Khải Tường"/>
		<?php /* tag "meta" from line 16 */; ?>
<meta name="Abstract" content="Website Chùa Khải Tường giới thiệu về một ngôi chùa ở Số 319B2, ấp Mỹ Phú, xã Mỹ Đức Đông, Cái Bè, Tiền Giang, Việt Nam"/>
		<?php /* tag "meta" from line 17 */; ?>
<meta name="classification" content="Chùa Khải Tường, thiết kế Web, SPN, Nguyên Phong, quay phim, chụp hình"/>
		<?php /* tag "link" from line 18 */; ?>
<link rel="shortcut icon" href="/data/images/logo/favicon.ico" type="image/x-icon"/>
	</span><?php 
}

 ?>
<?php 
function tpl_521f91bf_base__2uA9Cd5DgOMA_7Lh7INTZQ(PHPTAL $tpl, PHPTAL_Context $ctx) {
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
	<?php /* tag "span" from line 24 */; ?>

	
	<!-- ======================================================================== -->
	<!-- JAVASCRIPT INCLUDE														  -->
	<!-- ======================================================================== -->
	<?php /* tag "span" from line 35 */; ?>

	
	<!-- ======================================================================== -->
	<!-- HEADER																	  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 48 */; ?>

	
	<!-- ======================================================================== -->
	<!-- LỊCH CÔNG TÁC															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 129 */; ?>

	
	<!-- ======================================================================== -->
	<!-- PHẬT ÂM 																  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 160 */; ?>

	
	<!-- ======================================================================== -->
	<!-- ẢNH HOẠT ĐỘNG															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 187 */; ?>

	
	<!-- ======================================================================== -->
	<!-- TIN TỨC MỚI CẬP NHẬT													  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 201 */; ?>

	
	<!-- ======================================================================== -->
	<!-- VIDEO MỚI CẬP NHẬT														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 226 */; ?>

	
	<!-- ======================================================================== -->
	<!-- GIẢNG SƯ NỔI BẬT														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 247 */; ?>

	
	<!-- ======================================================================== -->
	<!-- HỎI - ĐÁP PHẬT HỌC														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 267 */; ?>

	
	<!-- ======================================================================== -->
	<!-- FIXED FUNCTION															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 281 */; ?>

	
	<!-- ======================================================================== -->
	<!-- TRỢ DUYÊN - ỦNG HỘ														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 295 */; ?>

	
	<!-- ======================================================================== -->
	<!-- LIÊN HỆ																  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 309 */; ?>

	
	<!-- ======================================================================== -->
	<!-- LỊCH																	  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 316 */; ?>

	
	<!-- ======================================================================== -->
	<!-- THANH TIÊU ĐỀ LỊCH DƯƠNG - ÂM											  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 353 */; ?>

	
	<!-- ======================================================================== -->
	<!-- SỰ KIỆN																  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 367 */; ?>

	
	<!-- ======================================================================== -->
	<!-- KHÓA HỌC SẮP KHAI GIẢNG												  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 398 */; ?>

	
	<!-- ======================================================================== -->
	<!-- POPUP QUẢNG CÁO														  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 423 */; ?>

	
	<!-- ======================================================================== -->
	<!-- FOOTER																	  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 472 */; ?>

	
	<!-- ======================================================================== -->
	<!-- BACK ON TOP															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 510 */; ?>

	
</body>
</html><?php 
/* end */ ;

}

?>
<?php /* 
*** DO NOT EDIT THIS FILE ***

Generated by PHPTAL from D:\Projects\WEBAPP\Pagoda\chuakhaituong.com\mvc\templates\base.xhtml (edit that file instead) */; ?>