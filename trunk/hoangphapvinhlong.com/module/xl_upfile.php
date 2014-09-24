<?php
include('./ketnoi.php');
?>
<?php

  if ($_FILES["file_up"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file_up"]["error"] . "<br />";
    }
  else
    {
    if (file_exists("upload/news/" . $_FILES["file_up"]["name"]))
      {
      echo $_FILES["file_up"]["name"] . " da ton tai file tren server. ";
      }
    else
      {  
      move_uploaded_file($_FILES["file_up"]["tmp_name"],
      "download/" . $_FILES["file_up"]["name"]);	
	  
	  $link = $_FILES["file_up"]["name"];
	  $name = $_POST['name'];
	  $str = "INSERT INTO download VALUES('','$name','','$link')";
	  mysql_query($str);
      }
    }
	 echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Quý phật tử đã upfile thành công. A di đà phật!')";
                    echo"</script>";
	  echo "<script>window.location='index.php?frame=upload'</script>";        
?> 

