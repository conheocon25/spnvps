<?php
session_start();
         unset($_SESSION['user']);
		 unset($_SESSION['pass']);
		 unset($_SESSION['quyen']);
		  echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Quý phật tử đăng xuất thành công. A di đà phật!')";
                    echo"</script>";
        echo "<script>window.location='index.php?frame=dangky'</script>";  
        ?>
