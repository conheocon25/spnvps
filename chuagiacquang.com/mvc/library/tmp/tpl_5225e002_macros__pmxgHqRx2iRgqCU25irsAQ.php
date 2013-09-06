<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_ContactBoxMini(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="sidebar-box-mini">
		<?php /* tag "div" from line 665 */; ?>
<div class="sidebar-box-content" style="text-align:center; padding:5px 5px 1px 5px;">
			<?php /* tag "a" from line 666 */; ?>
<a href="/contact">
				<?php /* tag "img" from line 667 */; ?>
<img width="100%" src="/data/images/contact.jpg"/>
			</a>
		</div>		
		<?php /* tag "div" from line 670 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_ContactBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="sidebar-box">
		<?php /* tag "div" from line 657 */; ?>
<div style="text-align:center; padding:5px 5px 1px 5px;">
			<?php /* tag "a" from line 658 */; ?>
<a href="/contact">
				<?php /* tag "img" from line 659 */; ?>
<img width="100%" src="/data/images/contact.jpg"/>
			</a>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_NorthBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="sidebar-box">
		<?php /* tag "div" from line 641 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 642 */; ?>
<img src="/data/images/icon.png" width="30"/>
			<?php /* tag "span" from line 643 */; ?>
<span>Phật Giáo Bắc Tông</span>
		</div>
		<?php /* tag "div" from line 645 */; ?>
<div style="text-align:center; padding:5px 5px 1px 5px;">
			<?php /* tag "a" from line 646 */; ?>
<a href="/library/video/1">
				<?php /* tag "img" from line 647 */; ?>
<img width="100%" height="250" src="/data/images/bac_tong.jpg"/>
			</a>
		</div>
		<?php /* tag "div" from line 650 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_SouthBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="sidebar-box">
		<?php /* tag "div" from line 625 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 626 */; ?>
<img src="/data/images/icon.png" width="30"/>
			<?php /* tag "span" from line 627 */; ?>
<span>Phật Giáo Nam Tông</span>
		</div>
		<?php /* tag "div" from line 629 */; ?>
<div style="text-align:center; padding:5px 5px 1px 5px;">
			<?php /* tag "a" from line 630 */; ?>
<a href="/library/video/2">
				<?php /* tag "img" from line 631 */; ?>
<img width="100%" height="250" src="/data/images/nam_tong.jpg"/>
			</a>
		</div>
		<?php /* tag "div" from line 634 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_BoxRight(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div>
		<?php /* tag "table" from line 601 */; ?>
<table border="0" cellpadding="0" cellspacing="0" width="335px"><?php /* tag "tr" from line 601 */; ?>
<tr>
			<?php /* tag "td" from line 602 */; ?>
<td width="50%" align="left">
				<?php /* tag "div" from line 603 */; ?>
<div class="box-right">
					<?php 
/* tag "a" from line 604 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->News1, 'getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
						<?php 
/* tag "img" from line 605 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->News1, 'getImage')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img width="100%" height="124"<?php echo $_tmp_2 ?>
/>
						<?php /* tag "div" from line 606 */; ?>
<div class="box-right-title"><?php echo phptal_escape($ctx->path($ctx->News1, 'getTitle')); ?>
</div>
					</a>
				</div>
			</td>
			<?php /* tag "td" from line 610 */; ?>
<td width="50%" align="right">
				<?php /* tag "div" from line 611 */; ?>
<div class="box-right">
					<?php 
/* tag "a" from line 612 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->News2, 'getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
						<?php 
/* tag "img" from line 613 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->News2, 'getImage')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img width="100%" height="124"<?php echo $_tmp_2 ?>
/>
						<?php /* tag "div" from line 614 */; ?>
<div class="box-right-title"><?php echo phptal_escape($ctx->path($ctx->News2, 'getTitle')); ?>
</div>
					</a>
				</div>
			</td>
		</tr></table>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_AdminMenu(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="manager-menu">
		<?php /* tag "ul" from line 535 */; ?>
<ul>
			
			<?php 
/* tag "a" from line 537 */ ;
if (null !== ($_tmp_3 = ('/app/course'))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "li" from line 538 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Course'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 539 */; ?>
<div class="left">ĐÀO TẠO</div>
					<?php /* tag "div" from line 540 */; ?>
<div class="right"><?php echo phptal_escape($ctx->path($ctx->Courses, 'count')); ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 543 */ ;
if (null !== ($_tmp_1 = ('/app/category/news'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
				<?php 
/* tag "li" from line 544 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='News'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 545 */; ?>
<div class="left">CHUYÊN MỤC TIN TỨC</div>
					<?php /* tag "div" from line 546 */; ?>
<div class="right"><?php echo phptal_escape($ctx->path($ctx->CategoriesNews, 'count')); ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 549 */ ;
if (null !== ($_tmp_3 = ('/app/category/video'))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "li" from line 550 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Video'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 551 */; ?>
<div class="left">CHUYÊN MỤC VIDEO</div>
					<?php /* tag "div" from line 552 */; ?>
<div class="right"><?php echo phptal_escape($ctx->path($ctx->CategoriesVideo, 'count')); ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 555 */ ;
if (null !== ($_tmp_1 = ('/app/category/ask'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
				<?php 
/* tag "li" from line 556 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Ask'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 557 */; ?>
<div class="left">CHUYÊN MỤC HỎI ĐÁP</div>
					<?php /* tag "div" from line 558 */; ?>
<div class="right"><?php echo phptal_escape($ctx->path($ctx->CategoriesAsk, 'count')); ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 561 */ ;
if (null !== ($_tmp_3 = ('/app/monk'))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "li" from line 562 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Monk'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 563 */; ?>
<div class="left">DANH SÁCH GIẢNG SƯ</div>
					<?php /* tag "div" from line 564 */; ?>
<div class="right"><?php echo phptal_escape($ctx->path($ctx->Monks, 'count')); ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 567 */ ;
if (null !== ($_tmp_1 = ('/app/event'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
				<?php 
/* tag "li" from line 568 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Event'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 569 */; ?>
<div class="left">DANH SÁCH SỰ KIỆN</div>
					<?php /* tag "div" from line 570 */; ?>
<div class="right"><?php echo phptal_escape($ctx->path($ctx->Events, 'count')); ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 573 */ ;
if (null !== ($_tmp_3 = ('/app/pagoda'))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "li" from line 574 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Pagoda'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 575 */; ?>
<div class="left">DANH SÁCH CHÙA</div>
					<?php /* tag "div" from line 576 */; ?>
<div class="right"><?php echo phptal_escape($ctx->path($ctx->Pagodas, 'count')); ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 579 */ ;
if (null !== ($_tmp_1 = ('/app/album'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
				<?php 
/* tag "li" from line 580 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Album'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 581 */; ?>
<div class="left">DANH SÁCH ALBUM</div>
					<?php /* tag "div" from line 582 */; ?>
<div class="right"><?php echo phptal_escape($ctx->path($ctx->Albums, 'count')); ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 585 */ ;
if (null !== ($_tmp_3 = ('/app/linked'))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "li" from line 586 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Linked'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "div" from line 587 */; ?>
<div class="left">TRANG BẠN</div>
					<?php /* tag "div" from line 588 */; ?>
<div class="right"><?php echo '0'; ?>
</div>
				</li>
			</a>
			<?php 
/* tag "a" from line 591 */ ;
if (null !== ($_tmp_1 = ('/app/config'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
				<?php 
/* tag "li" from line 592 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Statistic'?'menu-select':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					CẤU HÌNH
				</li>
			</a>
		</ul>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_Footer(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="footer">
		<?php /* tag "div" from line 505 */; ?>
<div id="bottom-menu">
			<?php /* tag "ul" from line 506 */; ?>
<ul class="top-nav">
				<?php /* tag "li" from line 507 */; ?>
<li><?php /* tag "a" from line 507 */; ?>
<a href="/home">Trang chủ</a></li>								
				<?php /* tag "li" from line 508 */; ?>
<li><?php /* tag "a" from line 508 */; ?>
<a href="/news">Tin tức</a></li>
				<?php /* tag "li" from line 509 */; ?>
<li><?php /* tag "a" from line 509 */; ?>
<a href="/event">Sự kiện</a></li>
				<?php /* tag "li" from line 510 */; ?>
<li><?php /* tag "a" from line 510 */; ?>
<a href="/course">Đào tạo</a></li>
				<?php /* tag "li" from line 511 */; ?>
<li><?php /* tag "a" from line 511 */; ?>
<a href="/library/video">PHẬT ÂM</a></li>
				<?php /* tag "li" from line 512 */; ?>
<li><?php /* tag "a" from line 512 */; ?>
<a href="/ask/2/ins/load">Hỏi đáp</a></li>				
				<?php /* tag "li" from line 513 */; ?>
<li><?php /* tag "a" from line 513 */; ?>
<a href="/pagoda">Danh bạ chùa</a></li>
				<?php /* tag "li" from line 514 */; ?>
<li><?php /* tag "a" from line 514 */; ?>
<a href="/linked">Trang bạn</a></li>
				<?php /* tag "li" from line 515 */; ?>
<li><?php /* tag "a" from line 515 */; ?>
<a href="/contact">Liên hệ</a></li>
				<?php /* tag "li" from line 516 */; ?>
<li id="last"><?php /* tag "a" from line 516 */; ?>
<a href="/signin/load">Quản trị</a></li>
			</ul>
		</div>
		<?php /* tag "div" from line 519 */; ?>
<div id="copy-right">
			<?php /* tag "div" from line 520 */; ?>
<div>© 12/2012 Chùa Giác Quang</div>
			<?php /* tag "div" from line 521 */; ?>
<div>Biên tập - Thích Nữ Huệ Thanh</div>
			<?php /* tag "div" from line 522 */; ?>
<div>Phát triển - <?php /* tag "a" from line 522 */; ?>
<a href="/live">SPN Co, Ltd &amp; Nguyên Phong ICT</a></div>
			<?php /* tag "div" from line 523 */; ?>
<div>Ghi rõ nguồn <?php /* tag "b" from line 523 */; ?>
<b><?php /* tag "i" from line 523 */; ?>
<i>chuagiacquang.com</i></b> khi phát hành thông tin từ website này</div>
		</div>
		<?php /* tag "div" from line 525 */; ?>
<div id="add-contact">
			<?php /* tag "div" from line 526 */; ?>
<div><?php /* tag "b" from line 526 */; ?>
<b>Chùa Giác Quang</b>, 954, Phú Hòa B, Phú Thuận A, Hồng Ngự, Đồng Tháp, Việt Nam</div>
			<?php /* tag "div" from line 527 */; ?>
<div><?php /* tag "b" from line 527 */; ?>
<b>Điện thoại:</b> (0673) 582 185 - <?php /* tag "b" from line 527 */; ?>
<b>Di động:</b> 0121 597 555 9</div>
			<?php /* tag "div" from line 528 */; ?>
<div><?php /* tag "b" from line 528 */; ?>
<b>Email:</b>thichnuhuethanh@yahoo.com.vn</div>
			<?php /* tag "div" from line 529 */; ?>
<div><?php /* tag "b" from line 529 */; ?>
<b>Website:</b> <?php /* tag "a" from line 529 */; ?>
<a href="chuagiacquang.com">http://chuagiacquang.com</a></div>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_OnlineBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="online" class="sidebar-box">
		<?php /* tag "div" from line 488 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 489 */; ?>
<img src="/data/images/online.png" width="30"/>
			<?php /* tag "span" from line 490 */; ?>
<span>Online</span>
		</div>
		<?php /* tag "div" from line 492 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 493 */; ?>
<div align="center" style="padding:10px;">
				<?php /* tag "a" from line 494 */; ?>
<a href="online" style="color: #980707;">
					<?php /* tag "img" from line 495 */; ?>
<img src="/data/images/online_logo.png" width="128px"/>
					<?php /* tag "div" from line 496 */; ?>
<div>Giao lưu trực tuyến</div>
				</a>
			</div>
		</div>
		<?php /* tag "div" from line 500 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_OnlineBoxMini(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="online" class="sidebar-box-mini">
		<?php /* tag "div" from line 472 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 473 */; ?>
<img src="/data/images/online.png" width="30"/>
			<?php /* tag "span" from line 474 */; ?>
<span>Online</span>
		</div>
		<?php /* tag "div" from line 476 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 477 */; ?>
<div align="center" style="padding:10px;">
				<?php /* tag "a" from line 478 */; ?>
<a href="online" style="color: #980707;">
					<?php /* tag "img" from line 479 */; ?>
<img src="/data/images/online_logo.png" width="128px"/>
					<?php /* tag "div" from line 480 */; ?>
<div>Giao lưu trực tuyến</div>
				</a>
			</div>
		</div>
		<?php /* tag "div" from line 484 */; ?>
<div class="clear"></div>
		</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_CountBoxMini(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="count" class="sidebar-box-mini">
			<?php /* tag "div" from line 442 */; ?>
<div class="box-title">
				<?php /* tag "img" from line 443 */; ?>
<img src="/data/images/count.png" width="30"/>
				<?php /* tag "span" from line 444 */; ?>
<span>Thống kê</span>
			</div>
			<?php /* tag "div" from line 446 */; ?>
<div class="sidebar-box-content">
				<?php /* tag "div" from line 447 */; ?>
<div style="padding:10px; line-height:25px; font-size:12px">
					<?php /* tag "table" from line 448 */; ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%"><?php /* tag "tr" from line 448 */; ?>
<tr>
						<?php /* tag "td" from line 449 */; ?>
<td width="60%" align="left">
							<?php /* tag "div" from line 450 */; ?>
<div style="color:#980707; font-size:13px;">
								<?php /* tag "span" from line 451 */; ?>
<span><?php /* tag "b" from line 451 */; ?>
<b>Online: </b></span>
								<?php /* tag "span" from line 452 */; ?>
<span><?php echo phptal_escape(\MVC\Library\Statistic::getOnlinePrint()); ?>
</span>
								<?php /* tag "br" from line 453 */; ?>
<br/>
								<?php /* tag "span" from line 454 */; ?>
<span><?php /* tag "b" from line 454 */; ?>
<b>Truy cập: </b></span>
								<?php /* tag "span" from line 455 */; ?>
<span><?php echo phptal_escape(\MVC\Library\Statistic::getCountPrint()); ?>
</span>
								<?php /* tag "span" from line 456 */; ?>
<span> lượt</span>
							</div>
						</td>
						<?php /* tag "td" from line 459 */; ?>
<td width="40%" align="left">
							<?php /* tag "a" from line 460 */; ?>
<a href="online" style="color: #980707;">
								<?php /* tag "img" from line 461 */; ?>
<img src="/data/images/online_logo.png" width="80px"/>
								<?php /* tag "div" from line 462 */; ?>
<div>G.lưu trực tuyến</div>
							</a>
						</td>
					</tr></table>
				</div>
			</div>
			<?php /* tag "div" from line 468 */; ?>
<div class="clear"></div>
		</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_CountBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="count" class="sidebar-box">
		<?php /* tag "div" from line 409 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 410 */; ?>
<img src="/data/images/count.png" width="30"/>
			<?php /* tag "span" from line 411 */; ?>
<span>Trực tuyến</span>
		</div>
		<?php /* tag "div" from line 413 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 414 */; ?>
<div style="padding:10px; line-height:25px; font-size:12px">
				<?php /* tag "table" from line 415 */; ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%"><?php /* tag "tr" from line 415 */; ?>
<tr>
					<?php /* tag "td" from line 416 */; ?>
<td width="40%" align="center">
						<?php /* tag "a" from line 417 */; ?>
<a href="online" style="color: #980707;">
							<?php /* tag "img" from line 418 */; ?>
<img src="/data/images/online_logo.png" width="80px"/>
							<?php /* tag "h4" from line 419 */; ?>
<h4>Giao lưu trực tuyến</h4>
						</a>
					</td>
					<?php /* tag "td" from line 422 */; ?>
<td width="60%" align="left">
						<?php /* tag "div" from line 423 */; ?>
<div style="color:#980707; font-size:12px; margin-left:20px;">
							<?php /* tag "div" from line 424 */; ?>
<div style="text-align:center; font-size:12px;">Website được thành lập vào <?php /* tag "b" from line 424 */; ?>
<b>12/2012</b></div>
							<?php /* tag "hr" from line 425 */; ?>
<hr style="border-color:#980707; margin:5px;"/>
							<?php /* tag "span" from line 426 */; ?>
<span><?php /* tag "img" from line 426 */; ?>
<img src="/data/images/user_online_logo.png"/> <?php /* tag "b" from line 426 */; ?>
<b>Online: </b></span>
							<?php /* tag "span" from line 427 */; ?>
<span><?php echo phptal_escape(\MVC\Library\Statistic::getOnlinePrint()); ?>
</span>
							<?php /* tag "br" from line 428 */; ?>
<br/>
							<?php /* tag "span" from line 429 */; ?>
<span><?php /* tag "img" from line 429 */; ?>
<img src="/data/images/count_logo.gif"/> <?php /* tag "b" from line 429 */; ?>
<b>Truy cập: </b></span>
							<?php /* tag "span" from line 430 */; ?>
<span><?php echo phptal_escape(\MVC\Library\Statistic::getCountPrint()); ?>
</span>
							<?php /* tag "span" from line 431 */; ?>
<span> lượt</span>
						</div>
					</td>
				</tr></table>
			</div>
		</div>
		<?php /* tag "div" from line 437 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_SponsorBoxMini(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="count" class="sidebar-box-mini">
			<?php /* tag "div" from line 392 */; ?>
<div class="box-title">
				<?php /* tag "img" from line 393 */; ?>
<img src="/data/images/sponsor.png" width="30"/>
				<?php /* tag "span" from line 394 */; ?>
<span>Trợ duyên</span>
			</div>
			<?php /* tag "div" from line 396 */; ?>
<div class="sidebar-box-content">
				<?php /* tag "div" from line 397 */; ?>
<div align="center" style="padding:10px;">
					<?php /* tag "a" from line 398 */; ?>
<a href="/news/4" style="color: #980707;">
						<?php /* tag "img" from line 399 */; ?>
<img src="/data/images/sponsor_logo.gif" width="100px"/>
						<?php /* tag "div" from line 400 */; ?>
<div>Ủng Hộ Website</div>
					</a>
				</div>
			</div>
			<?php /* tag "div" from line 404 */; ?>
<div class="clear"></div>
		</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_SponsorBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="emty2" class="sidebar-box">
		<?php /* tag "div" from line 367 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 368 */; ?>
<img src="/data/images/sponsor.png" width="30"/>
			<?php /* tag "span" from line 369 */; ?>
<span>Trợ duyên</span>
		</div>
		<?php /* tag "div" from line 371 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 372 */; ?>
<div align="center" style="padding:10px;">
				<?php /* tag "table" from line 373 */; ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%"><?php /* tag "tr" from line 373 */; ?>
<tr>
					<?php /* tag "td" from line 374 */; ?>
<td width="50%" align="center">
						<?php /* tag "a" from line 375 */; ?>
<a href="#" style="color: #980707;">
							<?php /* tag "img" from line 376 */; ?>
<img src="/data/images/sponsor_logo.gif" width="150px"/>
						</a>
					</td>
					<?php /* tag "td" from line 379 */; ?>
<td width="50%" align="center">
						<?php /* tag "a" from line 380 */; ?>
<a href="#" style="color:#980707; line-height:40px;">
							<?php /* tag "h1" from line 381 */; ?>
<h1>Ủng Hộ Website</h1>
						</a>
					</td>
				</tr></table>
			</div>
		</div>
		<?php /* tag "div" from line 387 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_DateTimeBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="date-time">
		<?php /* tag "script" from line 360 */; ?>
<script type="text/javascript">				
			getLunarDateString(09,11,2012,16,39,13);									
		</script>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_CallendarBoxMini(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="calendar" class="sidebar-box-mini">
		<?php /* tag "div" from line 337 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 338 */; ?>
<img width="30" src="/data/images/calendar.png"/>
			<?php /* tag "span" from line 339 */; ?>
<span>Lịch Âm Dương</span>
		</div>
		<?php /* tag "div" from line 341 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 342 */; ?>
<div align="center">
				<?php /* tag "script" from line 343 */; ?>
<script type="text/javascript">				
					function viewSelectedMonth() {
						setOutputSize("");
						var s = printSelectedMonth();
						document.open();
						document.writeln(s);
						document.close();
					}
					viewSelectedMonth();				
				</script>
			</div>
		</div>
		<?php /* tag "div" from line 355 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_CallendarBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="calendar" class="sidebar-box">
		<?php /* tag "div" from line 315 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 316 */; ?>
<img width="30" src="/data/images/calendar.png"/>
			<?php /* tag "span" from line 317 */; ?>
<span>Lịch Dương <?php /* tag "small" from line 317 */; ?>
<small>Âm</small></span>
		</div>
		<?php /* tag "div" from line 319 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 320 */; ?>
<div align="center">
				<?php /* tag "script" from line 321 */; ?>
<script type="text/javascript">				
					function viewSelectedMonth() {
						setOutputSize("small");
						var s = printSelectedMonth();
						document.open();
						document.writeln(s);
						document.close();
					}
					viewSelectedMonth();				
				</script>
			</div>
		</div>
		<?php /* tag "div" from line 333 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_AdsBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="ads" class="ads-box">
		<?php /* tag "div" from line 282 */; ?>
<div align="center">
			<?php /* tag "table" from line 283 */; ?>
<table border="0" cellspacing="5" cellpadding="0" width="100%">
				<?php /* tag "tbody" from line 284 */; ?>
<tbody>
					<?php /* tag "tr" from line 285 */; ?>
<tr>
						<?php /* tag "td" from line 286 */; ?>
<td align="center" colspan="2">
							<?php /* tag "a" from line 287 */; ?>
<a href="/ads">
								<?php /* tag "img" from line 288 */; ?>
<img width="305" src="/data/images/ads/NguyenPhongCard.jpg"/>
							</a>
						</td>
					</tr>
					<?php /* tag "tr" from line 292 */; ?>
<tr>
						<?php /* tag "td" from line 293 */; ?>
<td align="center">
							<?php /* tag "img" from line 294 */; ?>
<img src="/data/images/quangcao.jpg" width="146"/>
						</td>
						<?php /* tag "td" from line 296 */; ?>
<td align="center">
							<?php /* tag "img" from line 297 */; ?>
<img src="/data/images/quangcao.jpg" width="146"/>
						</td>
					</tr>
					<?php /* tag "tr" from line 300 */; ?>
<tr>
						<?php /* tag "td" from line 301 */; ?>
<td align="center">
							<?php /* tag "img" from line 302 */; ?>
<img src="/data/images/quangcao.jpg" width="146"/>
						</td>
						<?php /* tag "td" from line 304 */; ?>
<td align="center">
							<?php /* tag "img" from line 305 */; ?>
<img src="/data/images/quangcao.jpg" width="146"/>
						</td>
					</tr>						
				</tbody>
			</table>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_AskBoxMini(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="question" class="sidebar-box-mini">
		<?php /* tag "div" from line 265 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 266 */; ?>
<img src="/data/images/question.png" height="30"/>
			<?php /* tag "span" from line 267 */; ?>
<span>Hỏi đáp PHẬT HỌC</span>
		</div>
		<?php /* tag "div" from line 269 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 270 */; ?>
<div align="center" style="padding:10px;">
				<?php /* tag "a" from line 271 */; ?>
<a href="/ask" style="color: #980707;">
					<?php /* tag "img" from line 272 */; ?>
<img src="/data/images/question_big.png"/>
					<?php /* tag "div" from line 273 */; ?>
<div>Hỏi đáp PHẬT HỌC</div>
				</a>
			</div>
		</div>
		<?php /* tag "div" from line 277 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_AskBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="question" class="sidebar-box">
		<?php /* tag "div" from line 241 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 242 */; ?>
<img src="/data/images/question.png" height="30"/>
			<?php /* tag "span" from line 243 */; ?>
<span>Hỏi đáp PHẬT HỌC</span>
		</div>
		<?php /* tag "div" from line 245 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 246 */; ?>
<div align="center" style="padding:10px;">
				<?php /* tag "table" from line 247 */; ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%"><?php /* tag "tr" from line 247 */; ?>
<tr>
					<?php /* tag "td" from line 248 */; ?>
<td width="50%" align="center">
						<?php /* tag "a" from line 249 */; ?>
<a href="/ask/7" style="color: #980707;">
							<?php /* tag "img" from line 250 */; ?>
<img src="/data/images/question_logo.jpg" width="120px"/>
						</a>
					</td>
					<?php /* tag "td" from line 253 */; ?>
<td width="50%" align="center">
						<?php /* tag "a" from line 254 */; ?>
<a href="/ask/7" style="color: #980707;">
							<?php /* tag "h1" from line 255 */; ?>
<h1>PHẬT HỌC</h1>
						</a>
					</td>
				</tr></table>
			</div>
		</div>
		<?php /* tag "div" from line 261 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_VideoBoxMini(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="phatam" class="sidebar-box-mini">
		<?php /* tag "div" from line 224 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 225 */; ?>
<img src="/data/images/phatam.png" height="30"/>
			<?php /* tag "span" from line 226 */; ?>
<span>PHẬT ÂM</span>
		</div>
		<?php /* tag "div" from line 228 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 229 */; ?>
<div align="center" style="padding:10px;">
				<?php /* tag "a" from line 230 */; ?>
<a href="/library/video" style="color:#980707;">
					<?php /* tag "img" from line 231 */; ?>
<img src="/data/images/phatam_logo.gif" width="150px"/>
					<?php /* tag "div" from line 232 */; ?>
<div>Trang chia sẻ PHẬT ÂM lớn &amp; phổ biến nhất</div>
				</a>
			</div>
		</div>
		<?php /* tag "div" from line 236 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_VideoBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="phatam" class="sidebar-box">
		<?php /* tag "div" from line 200 */; ?>
<div class="box-title">
			<?php /* tag "img" from line 201 */; ?>
<img src="/data/images/phatam.png" height="30"/>
			<?php /* tag "span" from line 202 */; ?>
<span>PHẬT ÂM</span>
		</div>
		<?php /* tag "div" from line 204 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 205 */; ?>
<div align="center" style="padding:10px;">
				<?php /* tag "table" from line 206 */; ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%"><?php /* tag "tr" from line 206 */; ?>
<tr>
					<?php /* tag "td" from line 207 */; ?>
<td width="50%" align="center">
						<?php /* tag "a" from line 208 */; ?>
<a href="/library/video" style="color:#980707;">
							<?php /* tag "img" from line 209 */; ?>
<img src="/data/images/phatam_logo.gif" width="120px"/>
						</a>
					</td>
					<?php /* tag "td" from line 212 */; ?>
<td width="50%" align="center">
						<?php /* tag "a" from line 213 */; ?>
<a href="/library/video" style="color:#980707; line-height:25px;">
							<?php /* tag "h2" from line 214 */; ?>
<h2>Giới thiệu trang chia sẻ PHẬT ÂM lớn &amp; phổ biến nhất</h2>
						</a>
					</td>
				</tr></table>
			</div>
		</div>
		<?php /* tag "div" from line 220 */; ?>
<div class="clear"></div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_EventBoxMini(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="emty" class="sidebar-box-mini">
			<?php 
/* tag "div" from line 164 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Event, 'getDate')))):  ;
$_tmp_2 = ' alt="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<div id="Event" class="box-title"<?php echo $_tmp_2 ?>
>
				<?php /* tag "img" from line 165 */; ?>
<img src="/data/images/event.png" width="30"/>
				<?php /* tag "span" from line 166 */; ?>
<span>Sự kiện</span>
			</div>
			<?php /* tag "div" from line 168 */; ?>
<div class="sidebar-box-content">
				<?php /* tag "div" from line 169 */; ?>
<div align="center">
					<?php /* tag "img" from line 170 */; ?>
<img src="/data/images/bg_event.gif" width="50px"/>
				</div>
				<?php /* tag "div" from line 172 */; ?>
<div align="center" style="height:30px; padding-top:10px; margin-bottom:10px;">
					<?php 
/* tag "a" from line 173 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Event, 'getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a style="font-size:15px; color:#980707"<?php echo $_tmp_1 ?>
>
						<?php /* tag "span" from line 174 */; ?>
<span><?php echo phptal_escape($ctx->path($ctx->Event, 'getTitle')); ?>
</span>
					</a>
				</div>
				<?php /* tag "div" from line 177 */; ?>
<div style="margin-left:-3px;">
					<?php /* tag "div" from line 178 */; ?>
<div id="defaultCountdown"></div>
				</div>
				<?php /* tag "script" from line 180 */; ?>
<script type="text/javascript">
					/*<![CDATA[*/
					$(function() {
						var d1 = $("#Event").attr('alt');
						var parts = d1.match(/(\d+)/g);
						// new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
						var d2 = new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
						var austDay = new Date();
						austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
						$('#defaultCountdown').countdown({until: d2});
						$('#defaultCountdown1').countdown({until: d2});
					});
					/*]]>*/
				</script>
				<?php /* tag "div" from line 194 */; ?>
<div class="clear"></div>
			</div>
		</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_CourseBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
if ($ctx->Course):  ;
?>
<div id="emty" class="sidebar-box">
		<?php 
/* tag "div" from line 125 */ ;
if ($ctx->path($ctx->Course, 'getClassNext')):  ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Course, 'getClassNext/getDateStart')))):  ;
$_tmp_3 = ' alt="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<div id="Course" class="box-title"<?php echo $_tmp_3 ?>
>
			<?php /* tag "img" from line 126 */; ?>
<img src="/data/images/event.png" width="30"/>
			<?php /* tag "span" from line 127 */; ?>
<span>Đào tạo</span>
		</div><?php endif; ?>
		
		<?php 
/* tag "div" from line 129 */ ;
if ($ctx->path($ctx->Course, 'getClassNext')):  ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Course, 'getClassNext/getDateStart')))):  ;
$_tmp_2 = ' alt="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<div id="Course" class="box-title"<?php echo $_tmp_2 ?>
>
			<?php /* tag "img" from line 130 */; ?>
<img src="/data/images/event.png" width="30"/>
			<?php /* tag "span" from line 131 */; ?>
<span>Đào tạo</span>
		</div><?php endif; ?>

		<?php 
/* tag "div" from line 133 */ ;
if ($ctx->path($ctx->Course, 'getClassNext')):  ;
?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 134 */; ?>
<div align="center" style="padding-top:10px;">
				<?php 
/* tag "img" from line 135 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Course, 'getClassNext/getImage')))):  ;
$_tmp_1 = ' src="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<img width="300"<?php echo $_tmp_1 ?>
/>
			</div>
			<?php /* tag "div" from line 137 */; ?>
<div align="center" style="padding:10px;">
				<?php 
/* tag "a" from line 138 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Course, 'getClassNext/getURLRead')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a style="font-size:12px; color:#980707; line-height:30px;"<?php echo $_tmp_3 ?>
>
					<?php /* tag "h1" from line 139 */; ?>
<h1><?php echo phptal_escape($ctx->path($ctx->Course, 'getClassNext/getName')); ?>
</h1>
				</a>
			</div>
			<?php /* tag "div" from line 142 */; ?>
<div style="margin-left:10px;">
				<?php /* tag "div" from line 143 */; ?>
<div id="defaultCountdown2"></div>
			</div>
			<?php /* tag "script" from line 145 */; ?>
<script type="text/javascript">
				/*<![CDATA[*/
				$(function() {
					var d1 = $("#Course").attr('alt');
					var parts = d1.match(/(\d+)/g);
					// new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
					var d2 = new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
					var austDay = new Date();
					austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
					$('#defaultCountdown2').countdown({until: d2});
				});
				/*]]>*/
			</script>
			<?php /* tag "div" from line 158 */; ?>
<div class="clear"></div>
		</div><?php endif; ?>

	</div><?php 
endif ;

}

?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_EventBox(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="emty" class="sidebar-box">
		<?php 
/* tag "div" from line 88 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Event, 'getDate')))):  ;
$_tmp_1 = ' alt="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<div id="Event" class="box-title"<?php echo $_tmp_1 ?>
>
			<?php /* tag "img" from line 89 */; ?>
<img src="/data/images/event.png" width="30"/>
			<?php /* tag "span" from line 90 */; ?>
<span>Sự kiện</span>
		</div>
		<?php /* tag "div" from line 92 */; ?>
<div class="sidebar-box-content">
			<?php /* tag "div" from line 93 */; ?>
<div align="center" style="padding-top:10px;">
				<?php 
/* tag "a" from line 94 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Event, 'getURLRead')))):  ;
$_tmp_2 = ' href="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<a<?php echo $_tmp_2 ?>
>
					<?php 
/* tag "img" from line 95 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Event, 'getImage')))):  ;
$_tmp_3 = ' src="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<img width="150"<?php echo $_tmp_3 ?>
/>
				</a>
			</div>
			<?php /* tag "div" from line 98 */; ?>
<div align="center" style="padding:10px;">
				<?php 
/* tag "a" from line 99 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Event, 'getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a style="font-size:12px; color:#980707; line-height:30px;"<?php echo $_tmp_1 ?>
>
					<?php /* tag "h1" from line 100 */; ?>
<h1><?php echo phptal_escape($ctx->path($ctx->Event, 'getTitle')); ?>
</h1>
				</a>
			</div>
			<?php /* tag "div" from line 103 */; ?>
<div style="margin-left:10px;">
				<?php /* tag "div" from line 104 */; ?>
<div id="defaultCountdown"></div>
			</div>
			<?php /* tag "script" from line 106 */; ?>
<script type="text/javascript">
				/*<![CDATA[*/
				$(function() {
					var d1 = $("#Event").attr('alt');
					var parts = d1.match(/(\d+)/g);
					// new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
					var d2 = new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
					var austDay = new Date();
					austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
					$('#defaultCountdown').countdown({until: d2});
				});
				/*]]>*/
			</script>
			<?php /* tag "div" from line 119 */; ?>
<div class="clear"></div>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_Header(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div id="header">
		<?php /* tag "div" from line 32 */; ?>
<div id="logo">
			<?php /* tag "a" from line 33 */; ?>
<a href="/">
				<?php /* tag "img" from line 34 */; ?>
<img src="/data/images/logo_2a.png" height="165px" width="500px"/>
			</a>
		</div>
		
		<?php /* tag "div" from line 38 */; ?>
<div id="banner">
			<?php /* tag "img" from line 39 */; ?>
<img src="/data/images/logo_right_a3.jpg" height="165px" width="500px"/>
		</div>

		<?php /* tag "div" from line 42 */; ?>
<div id="menu-top">
			<?php /* tag "ul" from line 43 */; ?>
<ul class="top-nav">
				<?php 
/* tag "li" from line 44 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='Home'?'current':'?'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
><?php /* tag "a" from line 44 */; ?>
<a href="/home">Trang chủ</a></li>
				<?php 
/* tag "li" from line 45 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='ReadCategory'?'current':'?'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
					<?php /* tag "a" from line 46 */; ?>
<a style="cursor:pointer;">Tin tức</a>
					<?php /* tag "ul" from line 47 */; ?>
<ul class="sub-menu">
						<?php 
/* tag "li" from line 48 */ ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->Category = new PHPTAL_RepeatController($ctx->CategoriesNews)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->Category as $ctx->Category): ;
?>
<li>
							<?php 
/* tag "a" from line 49 */ ;
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
/* tag "li" from line 53 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='Event'?'current':'?'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
><?php /* tag "a" from line 53 */; ?>
<a href="/event">Tin tức &amp; Sự kiện mới</a></li>
				<?php 
/* tag "li" from line 54 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='Course'?'current':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
><?php /* tag "a" from line 54 */; ?>
<a href="/course">Đào tạo</a></li>
				<?php 
/* tag "li" from line 55 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='LibraryVideo'?'current':'?'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
><?php /* tag "a" from line 55 */; ?>
<a href="/library/video">PHẬT ÂM</a></li>
				<?php 
/* tag "li" from line 56 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='Ask'?'current':'?'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
>
					<?php /* tag "a" from line 57 */; ?>
<a style="cursor:pointer;">Hỏi đáp</a>
					<?php /* tag "ul" from line 58 */; ?>
<ul class="sub-menu">
						<?php /* tag "li" from line 59 */; ?>
<li>
							<?php 
/* tag "a" from line 60 */ ;
if (null !== ($_tmp_2 = ('/ask/7/ins/load'))):  ;
$_tmp_2 = ' href="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<a<?php echo $_tmp_2 ?>
>Đặt câu hỏi</a>
						</li>
						<?php 
/* tag "li" from line 62 */ ;
$_tmp_1 = $ctx->repeat ;
$_tmp_1->Category = new PHPTAL_RepeatController($ctx->CategoriesAsk)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_1->Category as $ctx->Category): ;
?>
<li>
							<?php 
/* tag "a" from line 63 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Category, 'getURLRead')))):  ;
$_tmp_2 = ' href="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<a<?php echo $_tmp_2 ?>
><?php echo phptal_escape($ctx->path($ctx->Category, 'getName')); ?>
</a>
						</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

					</ul>
				</li>	
				<?php 
/* tag "li" from line 67 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='LibraryAlbum'?'current':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
><?php /* tag "a" from line 67 */; ?>
<a href="/library/album">Ảnh hoạt động</a></li>
				<?php 
/* tag "li" from line 68 */ ;
if (null !== ($_tmp_1 = ($ctx->ActiveItem=='Pagoda'?'current':'?'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
					<?php /* tag "a" from line 69 */; ?>
<a style="cursor:pointer;">Danh bạ chùa</a>
					<?php /* tag "ul" from line 70 */; ?>
<ul class="sub-menu">
						<?php 
/* tag "li" from line 71 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Pagoda = new PHPTAL_RepeatController($ctx->Pagodas)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Pagoda as $ctx->Pagoda): ;
?>
<li>
							<?php 
/* tag "a" from line 72 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Pagoda, 'getURLRead')))):  ;
$_tmp_2 = ' href="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<a<?php echo $_tmp_2 ?>
><?php echo phptal_escape($ctx->path($ctx->Pagoda, 'getName')); ?>
</a>
						</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

					</ul>
				</li>
				<?php 
/* tag "li" from line 76 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveItem=='Linked'?'current':'?'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
					<?php /* tag "a" from line 77 */; ?>
<a href="/linked">Trang bạn</a>
				</li>
				<?php 
/* tag "li" from line 79 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveItem=='Contact'?'current':'?'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li id="last"<?php echo $_tmp_3 ?>
>
					<?php /* tag "a" from line 80 */; ?>
<a href="/contact">Liên hệ</a>
				</li>
			</ul>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_IncludeJS(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "script" from line 24 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery-1.7.1.min.js"></script>
		<?php /* tag "script" from line 25 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery.countdown.js"></script>
		<?php /* tag "script" from line 26 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/amlich-hnd.js"></script>		
		<?php /* tag "script" from line 27 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/user/Home.js"></script>		
	</span><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ_IncludeCSS(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "title" from line 5 */; ?>
<title><?php echo 'Chùa Giác Quang'; ?>
</title>
		<?php /* tag "BASE" from line 6 */; ?>
<BASE href="http://chuagiacquang.com"/>
		<?php /* tag "meta" from line 7 */; ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<?php /* tag "meta" from line 8 */; ?>
<meta http-equiv="X-UA-Compatible" content="IE=9"/>
		<?php /* tag "meta" from line 9 */; ?>
<meta http-equiv="Pragma" content="no-cache"/>
		<?php /* tag "meta" from line 10 */; ?>
<meta http-equiv="Expires" content="-1"/>
		<?php /* tag "meta" from line 11 */; ?>
<meta http-equiv="Cache-Control" content="no-cache"/>
		<?php /* tag "meta" from line 12 */; ?>
<meta name="keywords" content="Chùa Giác Quang"/>
		<?php /* tag "meta" from line 13 */; ?>
<meta name="description" content="Website Chùa Giác Quang giới thiệu về một ngôi chùa ở Hồng Ngự tỉnh Đồng Tháp"/>
		<?php /* tag "meta" from line 14 */; ?>
<meta name="page-topic" content="Chùa Giác Quang"/>
		<?php /* tag "meta" from line 15 */; ?>
<meta name="Abstract" content="Website Chùa Giác Quang giới thiệu về một ngôi chùa ở Hồng Ngự tỉnh Đồng Tháp"/>
		<?php /* tag "meta" from line 16 */; ?>
<meta name="classification" content="Chùa Giác Quang, thiết kế Web, SPN, Nguyên Phong, quay phim, chụp hình"/>
		<?php /* tag "link" from line 17 */; ?>
<link rel="icon" type="image/ico" href="/data/images/app/favicon2.ico"/>
		<?php /* tag "link" from line 18 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/layout.css"/>
		<?php /* tag "link" from line 19 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/signin.css"/>
		<?php /* tag "link" from line 20 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/admin.css"/>
		<?php /* tag "link" from line 21 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/base/jquery.countdown.css"/>
	</span><?php 
}

 ?>
<?php 
function tpl_5225e002_macros__pmxgHqRx2iRgqCU25irsAQ(PHPTAL $tpl, PHPTAL_Context $ctx) {
$_thistpl = $tpl ;
$_translator = $tpl->getTranslator() ;
/* tag "documentElement" from line 1 */ ;
/* tag "html" from line 1 */ ;
?>
<html lang="en" xml:lang="en">
<?php /* tag "body" from line 2 */; ?>
<body>
	<!-- ĐỊNH NGHĨA THƯ VIỆN CSS JAVASCRIPT -->
	<?php /* tag "span" from line 4 */; ?>

	<?php /* tag "span" from line 23 */; ?>

	
	<!-- HEADER -->
	<?php /* tag "div" from line 31 */; ?>

	
	<!-- EVENT BOX -->
	<?php /* tag "div" from line 87 */; ?>

	
	<!-- COURSE BOX -->
	<?php /* tag "div" from line 124 */; ?>

	
		<!-- EVENT BOX MINI -->
		<?php /* tag "div" from line 163 */; ?>


	<!-- PHATAM BOX Ở CỘT 2 -->
	<?php /* tag "div" from line 199 */; ?>

	
	<?php /* tag "div" from line 223 */; ?>

	
	<!-- QUESTION BOX Ở CỘT 2 -->
	<?php /* tag "div" from line 240 */; ?>

	
	<?php /* tag "div" from line 264 */; ?>

		
	<!-- ADS BOX Ở CỘT 2 -->
	<?php /* tag "div" from line 281 */; ?>

		
	<!-- CALENDAR BOX Ở CỘT 2 -->
	<?php /* tag "div" from line 314 */; ?>

	
	<?php /* tag "div" from line 336 */; ?>

	
	<!-- DATE TIME BOX -->
	<?php /* tag "div" from line 359 */; ?>

	
	<!-- SPONSOR BOX -->
	<?php /* tag "div" from line 366 */; ?>

	
		<!-- SPONSOR BOX MINI -->
		<?php /* tag "div" from line 391 */; ?>

	
	<!-- COUNT BOX Ở CỘT 2 -->
	<?php /* tag "div" from line 408 */; ?>

		
		<!-- COUNT MINI BOX Ở CỘT 3 -->
		<?php /* tag "div" from line 441 */; ?>

		
		<?php /* tag "div" from line 471 */; ?>

	<!-- ONLINE BOX Ở CỘT 2 -->
	<?php /* tag "div" from line 487 */; ?>

	
	<!-- FOOTER Ở DƯỚI TRANG -->
	<?php /* tag "div" from line 504 */; ?>

	
	<!-- ADMIN MENU -->
	<?php /* tag "div" from line 534 */; ?>


	<!-- BOX RIGHT -->
	<?php /* tag "div" from line 600 */; ?>

	
	<!-- ================================================================================== -->
	<!-- SOUTH BUDDHA																	-->
	<!-- ================================================================================== -->
	<?php /* tag "div" from line 624 */; ?>

	
	<!-- ================================================================================== -->
	<!-- NORTH BUDDHA																	-->
	<!-- ================================================================================== -->
	<?php /* tag "div" from line 640 */; ?>

	
	<!-- ================================================================================== -->
	<!-- CONTACT																			-->
	<!-- ================================================================================== -->
	<?php /* tag "div" from line 656 */; ?>

	<!-- CONTACT BOX MINI -->
	<?php /* tag "div" from line 664 */; ?>

	
</body>
</html><?php 
/* end */ ;

}

?>
<?php /* 
*** DO NOT EDIT THIS FILE ***

Generated by PHPTAL from D:\Projects\WEBAPP\Pagoda\chuagiacquang.com\mvc\templates\macros.xhtml (edit that file instead) */; ?>