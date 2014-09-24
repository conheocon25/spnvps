<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>	
      <?php
		$con=mysql_connect("localhost","spncom_admindb","admin368189")
               or die("không kết nối được");
		$db=mysql_select_db("hoangphapvinhlong", $con)
               or die("không kết nối được CSDL");
        mysql_set_charset('utf8',$con); // dinh dang
        ?>

    </body>
</html>
