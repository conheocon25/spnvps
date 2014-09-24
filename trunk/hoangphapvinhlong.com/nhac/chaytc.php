<?php
    //Connect mysql
        $conn = mysql_connect('localhost','nguyenphong','Admin123456') or die('Not connect!');
    mysql_select_db('hoangphapvinhlong',$conn);
    mysql_set_charset('utf8',$conn); 
    //Query
    $query = mysql_query("
                    SELECT * 
                    FROM  baihat where noibac='1' order by id desc
            ");
    //Array $listSong
?>
<?php header("Content-Type: application/xml; charset=utf-8");?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
<trackList>
    <?php $i=0; while($row=mysql_fetch_array($query)){ $i=$i+1;?>
       <track>
            <title><?php echo $i;echo "."; echo $row["tieude"];?></title>
			<creator>Hoằng Pháp Vĩnh Long</creator>
            <location><?php echo $row["duongdan"];?></location>
			
            </track>
    <?php }?>
</trackList>
</playlist>