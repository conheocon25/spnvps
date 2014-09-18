<?php
    //Connect mysql
	$id=$_GET["id"];
    $conn = mysql_connect('localhost','root','') or die('Not connect!');
    mysql_select_db('phatphaptonghop',$conn);
    mysql_set_charset('utf8',$conn); 
    //Query
    $query = mysql_query("
                    SELECT * 
                    FROM  videonoibac 
                    WHERE hienthi = '1' order by id desc
            ");
    //Array $listSong
?>
<?php header("Content-Type: application/xml; charset=utf-8");?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
<trackList>
    <?php $i=0; while($row=mysql_fetch_array($query)){ $i=$i+1;?>
        <track>
            <annotation><?php echo $i;echo "."; echo $row["tieude"];?></annotation>
            <location><?php echo $row["link"];?></location>
            </track>
    <?php }?>
</trackList>
</playlist>