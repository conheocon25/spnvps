<?php 
function tpl_521f9032_Home__ylY4Trirb0z276diXpkcQA(PHPTAL $tpl, PHPTAL_Context $ctx) {
$_thistpl = $tpl ;
$_translator = $tpl->getTranslator() ;
/* tag "documentElement" from line 1 */ ;
$ctx->setDocType('<!DOCTYPE html>',false) ;
?>

<?php /* tag "html" from line 2 */; ?>
<html lang="en">
	<?php /* tag "head" from line 3 */; ?>
<head>
		<?php 
/* tag "span" from line 4 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/IncludeMETA', $_thistpl) ;
$ctx->popSlots() ;
?>

		<?php 
/* tag "span" from line 5 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/IncludeCSS', $_thistpl) ;
$ctx->popSlots() ;
?>

		<?php 
/* tag "span" from line 6 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/IncludeJS', $_thistpl) ;
$ctx->popSlots() ;
?>

		<?php /* tag "script" from line 7 */; ?>
<script>
			/*<![CDATA[*/
			$(document).ready(function(){
				$('.news-slide').carousel({interval: 5000});
				$(".hidden-control").click(function(){
					($(this).hasClass("icon-chevron-down")==false) ? $(this).addClass("icon-chevron-down") : $(this).removeClass("icon-chevron-down")
				});
			});
			/*]]>*/
		</script>
	</head>

	<?php /* tag "body" from line 19 */; ?>
<body>
		<?php /* tag "div" from line 20 */; ?>
<div class="container">
			<?php 
/* tag "div" from line 21 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/Header', $_thistpl) ;
$ctx->popSlots() ;
?>

			<?php /* tag "div" from line 22 */; ?>
<div class="row reset-margin main">
				<?php 
/* tag "div" from line 23 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/CallendarBar', $_thistpl) ;
$ctx->popSlots() ;
?>

				<?php /* tag "div" from line 24 */; ?>
<div class="span8 fix-width">
					
					<?php /* tag "div" from line 26 */; ?>
<div class="accordion accordion-fix" id="accordion2">
						<?php /* tag "div" from line 27 */; ?>
<div class="accordion-group box radius">
							<?php /* tag "div" from line 28 */; ?>
<div class="accordion-heading b-title clearfix">
								<?php /* tag "div" from line 29 */; ?>
<div class="b-t-icon-content">Sự kiện gần đây</div>
								<?php /* tag "a" from line 30 */; ?>
<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"></a>
							</div>
							<?php /* tag "div" from line 32 */; ?>
<div id="collapseOne" class="accordion-body collapse in b-content">
								<?php /* tag "div" from line 33 */; ?>
<div id="EventCarousel" class="carousel slide reset-margin course-slide">
									<?php /* tag "div" from line 34 */; ?>
<div class="carousel-inner">
										<?php /* tag "div" from line 35 */; ?>
<div class="active item">
											<?php 
/* tag "a" from line 36 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->EventAll, 'current/getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
												<?php 
/* tag "img" from line 37 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->EventAll, 'current/getImage')))):  ;
$_tmp_2 = ' src="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<img width="100%"<?php echo $_tmp_2 ?>
/>
												<?php /* tag "div" from line 38 */; ?>
<div class="carousel-caption">
													<?php /* tag "p" from line 39 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->EventAll, 'current/getTitle')); ?>
</p>
												</div>
											</a>
										</div>
										<?php 
/* tag "div" from line 43 */ ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->Event = new PHPTAL_RepeatController($ctx->EventAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->Event as $ctx->Event): ;
?>
<div class="item">
											<?php 
/* tag "a" from line 44 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Event, 'getURLRead')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
												<?php 
/* tag "img" from line 45 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Event, 'getImage')))):  ;
$_tmp_3 = ' src="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<img width="100%"<?php echo $_tmp_3 ?>
/>
												<?php /* tag "div" from line 46 */; ?>
<div class="carousel-caption">
													<?php /* tag "p" from line 47 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->Event, 'getTitle')); ?>
</p>
												</div>
											</a>
										</div><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

									</div>
									<?php /* tag "a" from line 52 */; ?>
<a class="carousel-control left" href="#EventCarousel" data-slide="prev">&lsaquo;</a>
									<?php /* tag "a" from line 53 */; ?>
<a class="carousel-control right" href="#EventCarousel" data-slide="next">&rsaquo;</a>
								</div>
							</div>
						</div>
					</div>
					
					<?php 
/* tag "div" from line 59 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Category = new PHPTAL_RepeatController($ctx->CategoryNewsAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Category as $ctx->Category): ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Category, 'getIdPrint')))):  ;
$_tmp_1 = ' id="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<div class="accordion accordion-fix"<?php echo $_tmp_1 ?>
>
						<?php /* tag "div" from line 60 */; ?>
<div class="accordion-group box radius">
							<?php /* tag "div" from line 61 */; ?>
<div class="accordion-heading b-title clearfix">
								<?php /* tag "div" from line 62 */; ?>
<div class="b-t-icon-content"><?php echo phptal_escape($ctx->path($ctx->Category, 'getName')); ?>
</div>
								<?php 
/* tag "a" from line 63 */ ;
if (null !== ($_tmp_2 = ($ctx->path($ctx->Category, 'getIdPrint')))):  ;
$_tmp_2 = ' data-parent="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
if (null !== ($_tmp_4 = ('#collapse' . $ctx->Category->getIdPrint()))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse"<?php echo $_tmp_2 ?>
<?php echo $_tmp_4 ?>
></a>
							</div>
							<?php 
/* tag "div" from line 65 */ ;
if (null !== ($_tmp_2 = ('collapse' . $ctx->Category->getIdPrint()))):  ;
$_tmp_2 = ' id="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<div class="accordion-body collapse in b-content"<?php echo $_tmp_2 ?>
>
								<?php /* tag "div" from line 66 */; ?>
<div class="row reset-margin">
									<?php /* tag "div" from line 67 */; ?>
<div class="span4 reset-margin">
										<?php /* tag "div" from line 68 */; ?>
<div class="carousel slide carousel-fade img-polaroid news-slide">
											<?php /* tag "div" from line 69 */; ?>
<div class="carousel-inner">
												<?php /* tag "div" from line 70 */; ?>
<div class="active item">													
													<?php 
/* tag "a" from line 71 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->Category, 'getNewsLimit1/current/getURLRead')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
>
														<?php 
/* tag "img" from line 72 */ ;
if (null !== ($_tmp_5 = ($ctx->path($ctx->Category, 'getNewsLimit1/current/getImage')))):  ;
$_tmp_5 = ' src="'.phptal_escape($_tmp_5).'"' ;
else:  ;
$_tmp_5 = '' ;
endif ;
?>
<img<?php echo $_tmp_5 ?>
/>
														<?php /* tag "div" from line 73 */; ?>
<div class="carousel-caption">
															<?php /* tag "p" from line 74 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->Category, 'getNewsLimit1/current/getTitleReduce')); ?>
</p>
														</div>
													</a>
												</div>
												<?php 
/* tag "div" from line 78 */ ;
$_tmp_5 = $ctx->repeat ;
$_tmp_5->News = new PHPTAL_RepeatController($ctx->path($ctx->Category, 'getNewsLimit1'))
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_5->News as $ctx->News): ;
?>
<div class="item">
													<?php 
/* tag "a" from line 79 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->News, 'getURLRead')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
>
														<?php 
/* tag "img" from line 80 */ ;
if (null !== ($_tmp_6 = ($ctx->path($ctx->News, 'getImage')))):  ;
$_tmp_6 = ' src="'.phptal_escape($_tmp_6).'"' ;
else:  ;
$_tmp_6 = '' ;
endif ;
?>
<img<?php echo $_tmp_6 ?>
/>
														<?php /* tag "div" from line 81 */; ?>
<div class="carousel-caption">
															<?php /* tag "p" from line 82 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->News, 'getTitleReduce')); ?>
</p>
														</div>
													</a>
												</div><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

											</div>
										</div>
									</div>
									<?php /* tag "div" from line 89 */; ?>
<div class="span4 reset-margin pull-right news-list">
										<?php /* tag "ul" from line 90 */; ?>
<ul class="nav nav-tabs nav-stacked">
											<?php /* tag "li" from line 91 */; ?>
<li class="active news-list-title"><?php /* tag "a" from line 91 */; ?>
<a>MỚI CẬP NHẬT</a></li>
											<?php 
/* tag "li" from line 92 */ ;
$_tmp_6 = $ctx->repeat ;
$_tmp_6->News = new PHPTAL_RepeatController($ctx->path($ctx->Category, 'getNewsLimit1'))
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_6->News as $ctx->News): ;
?>
<li class="news-list-item">
												<?php 
/* tag "a" from line 93 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->News, 'getURLRead')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
><?php echo phptal_escape($ctx->path($ctx->News, 'getTitleReduce')); ?>
</a>
											</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

										</ul>
									</div>
								</div>
							</div>
						</div>
					</div><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

					
					<?php /* tag "div" from line 102 */; ?>
<div class="accordion accordion-fix" id="accordion3">
						<?php /* tag "div" from line 103 */; ?>
<div class="accordion-group box radius">
							<?php /* tag "div" from line 104 */; ?>
<div class="accordion-heading b-title clearfix">
								<?php /* tag "div" from line 105 */; ?>
<div class="b-t-icon-content">VIDEO NỘI BỘ</div>
								<?php /* tag "a" from line 106 */; ?>
<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion3" href="#collapse3"></a>
							</div>
							<?php /* tag "div" from line 108 */; ?>
<div id="collapse3" class="accordion-body collapse in b-content">
								<?php /* tag "ul" from line 109 */; ?>
<ul class="thumbnails grid-item reset-margin">
									<?php 
/* tag "li" from line 110 */ ;
$_tmp_5 = $ctx->repeat ;
$_tmp_5->VL = new PHPTAL_RepeatController($ctx->VL8)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_5->VL as $ctx->VL): ;
?>
<li class="span2">
										<?php /* tag "div" from line 111 */; ?>
<div class="thumbnail">
											<?php 
/* tag "a" from line 112 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->VL, 'getURLView')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
>
												<?php 
/* tag "img" from line 113 */ ;
if (null !== ($_tmp_6 = ($ctx->path($ctx->VL, 'getVideo/getURLImage')))):  ;
$_tmp_6 = ' src="'.phptal_escape($_tmp_6).'"' ;
else:  ;
$_tmp_6 = '' ;
endif ;
?>
<img<?php echo $_tmp_6 ?>
/>
												<?php /* tag "p" from line 114 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->VL, 'getVideo/getName')); ?>
</p>
											</a>
										</div>
									</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

								</ul>
							</div>
						</div>
					</div>
					
					<?php /* tag "div" from line 123 */; ?>
<div class="accordion accordion-fix" id="accordion4">
						<?php /* tag "div" from line 124 */; ?>
<div class="accordion-group box radius">
							<?php /* tag "div" from line 125 */; ?>
<div class="accordion-heading b-title clearfix">
								<?php /* tag "div" from line 126 */; ?>
<div class="b-t-icon-content">Bài giảng mới nhất</div>
								<?php /* tag "a" from line 127 */; ?>
<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion4" href="#collapse4"></a>
							</div>
							<?php /* tag "div" from line 129 */; ?>
<div id="collapse4" class="accordion-body collapse in b-content">
								<?php /* tag "ul" from line 130 */; ?>
<ul class="thumbnails grid-item reset-margin">
									<?php 
/* tag "li" from line 131 */ ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->VM = new PHPTAL_RepeatController($ctx->VM24)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->VM as $ctx->VM): ;
?>
<li class="span2">
										<?php /* tag "div" from line 132 */; ?>
<div class="thumbnail">
											<?php 
/* tag "a" from line 133 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->VM, 'getURLView')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>
												<?php 
/* tag "img" from line 134 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->VM, 'getVideo/getURLImage')))):  ;
$_tmp_3 = ' src="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<img<?php echo $_tmp_3 ?>
/>
												<?php /* tag "p" from line 135 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->VM, 'getVideo/getName')); ?>
</p>
											</a>
										</div>
									</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

								</ul>
							</div>
						</div>
					</div>
					
					<?php /* tag "div" from line 144 */; ?>
<div class="accordion accordion-fix" id="accordion5">
						<?php /* tag "div" from line 145 */; ?>
<div class="accordion-group box radius">
							<?php /* tag "div" from line 146 */; ?>
<div class="accordion-heading b-title clearfix">
								<?php /* tag "div" from line 147 */; ?>
<div class="b-t-icon-content">Chuyên đề mới nhất</div>
								<?php /* tag "a" from line 148 */; ?>
<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion5" href="#collapse5"></a>
							</div>
							<?php /* tag "div" from line 150 */; ?>
<div id="collapse5" class="accordion-body collapse in b-content">
								<?php /* tag "ul" from line 151 */; ?>
<ul class="thumbnails grid-item reset-margin">
									<?php 
/* tag "li" from line 152 */ ;
$_tmp_6 = $ctx->repeat ;
$_tmp_6->VL = new PHPTAL_RepeatController($ctx->VL24)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_6->VL as $ctx->VL): ;
?>
<li class="span2">
										<?php /* tag "div" from line 153 */; ?>
<div class="thumbnail">
											<?php 
/* tag "a" from line 154 */ ;
if (null !== ($_tmp_4 = ($ctx->path($ctx->VL, 'getURLView')))):  ;
$_tmp_4 = ' href="'.phptal_escape($_tmp_4).'"' ;
else:  ;
$_tmp_4 = '' ;
endif ;
?>
<a<?php echo $_tmp_4 ?>
>
												<?php 
/* tag "img" from line 155 */ ;
if ($ctx->path($ctx->VL, 'getVideo/getURL')):  ;
if (null !== ($_tmp_5 = ($ctx->path($ctx->VL, 'getVideo/getURLImage')))):  ;
$_tmp_5 = ' src="'.phptal_escape($_tmp_5).'"' ;
else:  ;
$_tmp_5 = '' ;
endif ;
?>
<img<?php echo $_tmp_5 ?>
/><?php endif; ?>

												<?php /* tag "p" from line 156 */; ?>
<p><?php echo phptal_escape($ctx->path($ctx->VL, 'getVideo/getName')); ?>
</p>
											</a>
										</div>
									</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php /* tag "div" from line 165 */; ?>
<div class="span4 fix-width">					
					<?php 
/* tag "div" from line 166 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/TaskBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 167 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/EventBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 168 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/CourseBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 169 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/BuddhaBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 170 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/PictureBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 171 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/TopNewsBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 172 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/TopVideoBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 173 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/TopMonkBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 174 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/AskBox', $_thistpl) ;
$ctx->popSlots() ;
?>
					
					<?php 
/* tag "div" from line 175 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/ContactBox', $_thistpl) ;
$ctx->popSlots() ;
?>

					<?php 
/* tag "div" from line 176 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/CallendarBox', $_thistpl) ;
$ctx->popSlots() ;
?>

				</div>
			</div>
			<?php 
/* tag "div" from line 179 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/Footer', $_thistpl) ;
$ctx->popSlots() ;
?>

			<?php 
/* tag "div" from line 180 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/Popup', $_thistpl) ;
$ctx->popSlots() ;
?>

			<?php 
/* tag "div" from line 181 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/FixedFunction', $_thistpl) ;
$ctx->popSlots() ;
?>

			<?php 
/* tag "div" from line 182 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('base.xhtml/Backontop', $_thistpl) ;
$ctx->popSlots() ;
?>

			<?php /* tag "div" from line 183 */; ?>
<div id="fb-root"></div>
		</div>
	</body>
</html><?php 
/* end */ ;

}

?>
<?php /* 
*** DO NOT EDIT THIS FILE ***

Generated by PHPTAL from D:\Projects\WEBAPP\Pagoda\chuaphuochung.com\mvc\templates\Home.html (edit that file instead) */; ?>