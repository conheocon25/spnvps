<?php 							
require 'ketnoi.php';
$sql="select*from gioithieu";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $noidung=$row["noidung"];
                                                 
												  
												  echo "$noidung";
												  
											}}?>