<?php
$session=$_SERVER['REMOTE_ADDR'];
$time=time();
$time_check=$time-300; //Ấn định thời gian là 10 phút
require'./ketnoi.php';
$sql="SELECT * FROM user_online";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$se=$row3["session"];
// Kết nối tới sever và chọn database
if($se=='$session'){exit();}else{
$sql1="INSERT INTO user_online(session, time)VALUES('$session', '$time')";
$result1=mysql_query($sql1);}

$sql3="SELECT * FROM user_online";
$result3=mysql_query($sql3);
$count_user_online=mysql_num_rows($result3);
// Nếu quá 10 phút, xóa bỏ session
$sql4="DELETE FROM user_online WHERE time < '$time_check'";
$result4=mysql_query($sql4);




$sql2="INSERT INTO tongtruycap(session, time)VALUES('$session', '$time')";
$result2=mysql_query($sql2);
$count= mysql_query("SELECT COUNT(session) FROM tongtruycap");
$rowt=mysql_fetch_row($count);?>