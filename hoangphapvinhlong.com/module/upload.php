<?php 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"]; 

?>
<div class="span8 fix-width">
					<div class="box radius">
						<div class="page-header pg-header pg-header-login reset-margin">
							<h4 class="reset-margin">Đăng Nhập</h4>
						</div>
						<div class="b-content padding-content news-content"  align="center">
						<?php if(isset($user) && $quyen!='2'){ ?> <form action="index.php?frame=xl_upfile" method="post" enctype="multipart/form-data">
Tựa đề file:
<input type="text" name="name" value="" /><br />
Filename:
<input type="file" name="file_up" />
<br />
<input type="submit" name="submit" value="Submit" />
</form> 
<?php }else {?>
							<?php include'login2.php';  } ?>
							</div></div></div>
				
