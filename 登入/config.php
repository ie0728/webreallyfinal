<?php
$link = mysqli_connect('140.117.79.65','mis_team_20', 'mis_team_20', '2s2hm1424');
mysqli_query($link, 'SET NAMES utf8');

if($link === false){
    die("錯誤 : 無法連結資料庫" . mysqli_connect_error());
}
else{
    return $link;
}
?>
