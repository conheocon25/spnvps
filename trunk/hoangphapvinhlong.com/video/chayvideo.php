<?php
    //Connect mysql
	$id=$_GET["idvideochay"];
      $conn = mysql_connect('localhost','nguyenphong','Admin123456') or die('Not connect!');
    mysql_select_db('hoangphapvinhlong',$conn);
    mysql_set_charset('utf8',$conn); 
    //Query
    $query = mysql_query("
                    SELECT * 
                    FROM  video_video vi,video_categories ca 
                    WHERE  ca.id=vi.category and vi.id = '$id' 
            ");
    //Array $listSong
?>
<?php header("Content-Type: application/xml; charset=utf-8");?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
<trackList>
    <?php $row=mysql_fetch_array($query);?>
        <track>
            <annotation><?php echo $row["title"]; ?></annotation>
            <location><?php echo $row["video"];?></location>
			
            </track>
   
</trackList>
</playlist>