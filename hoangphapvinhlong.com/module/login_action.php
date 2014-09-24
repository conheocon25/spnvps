<?php
session_start();
                     require './ketnoi.php';
                     $user=$_POST["tendangnhap"];
                     $pass=md5($_POST["matkhau"]);
                     $sql = "select*from users where tennguoidung = '$user' and matkhau= '$pass'";
                     $ketqua = mysql_query($sql);
					 $row = mysql_fetch_array($ketqua);
                   if(empty ($user)||empty ($pass))
                   {
                   echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Đăng nhập thất bại')";
                    echo"</script>";
					include('dangky.php');
                    exit;
                   }
                    if (($user)!= $row['tennguoidung'])
                    {
                  echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Đăng nhập thất bại')";
                    echo"</script>";
					include('dangky.php');
                    exit;
                    }
                 if (($pass)!= $row['matkhau'])
                   {
					echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Đăng nhập thất bại')";
                    echo"</script>";
					include('dangky.php');
                    exit;
					}  
                    while($row)
                    {
                             if($row["quyen"]== 2 and $row["tinhtrang"]== 0){
							 echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Chúc mừng phật tử : $user đã đăng nhập thành công. A di đà phật!')";
                    echo"</script>";
                              $_SESSION["user"]=$user;
                              $_SESSION["pass"]=$pass;
							  $_SESSION["quyen"]=$row["quyen"];
                              echo "<script>window.location='index.php?frame=dangky'</script>";                     
                               return;} else{echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Bạn không có quyền này...Hoặt tài khoảng bị khóa vui lòng liên hệ với ban quản trị')";
                    echo"</script>"; require('dangky.php');                      
                               return;} 
                     }                                   
        ?>
		