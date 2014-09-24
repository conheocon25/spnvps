<?php $a=$_GET["id"]; ?>
<div class="span8 fix-width">		
<div class="accordion accordion-fix" id="accordion33">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-giangsu">Giảng sư hoàng pháp vĩnh long</div>
								<a class="accordion-toggle pull-right hidden-accordion icon-chevron-up icon-white hidden-control" data-toggle="collapse" data-parent="#accordion33" href="http://chualongvien.com/#collapse33"></a>
							</div>
							<div id="collapse33" class="accordion-body collapse in b-content">
								<ul class="thumbnails grid-item reset-margin">
								<?php  require './ketnoi.php'; $sql5="select * from video_phanloai pl,video_categories ca,giangsu gs,tinhthanh tt where gs.magiangsu=ca.giangsu and pl.maloai=ca.phanloai and tt.matinh=ca.tinhthanh and tt.matinh='1' and ca.congbo='1' order by ca.sapxep asc";
												$kq5=mysql_query($sql5);
												if(mysql_num_rows($kq5)!=0)
												{
													while($row5=mysql_fetch_array($kq5))
													{	
																$idgs=$row5[4];	
																$name=$row5["name"];
																$maloai=$row5["maloai"];																
																$img=$row5["img"];
																$tentinh=$row5["tentinh"];																
																$linkca=$row5["linkca"];
																$linkpl=$row5["linkpl"];																	
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="<?php echo $maloai ?>-<?php echo $idgs ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>" onMouseOver="Tip('<?php echo $name ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $img ?>">
												<p><?php echo  $name ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
								</ul>
							</div>
						</div>
					</div>
				</div>