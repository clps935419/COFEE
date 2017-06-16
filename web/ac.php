<?php
mysql_connect("localhost","clps935419","ajcf5762");//連結伺服器
mysql_select_db("order");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
if (!$Link) {
　die(' 連線失敗，輸出錯誤訊息 : ' . mysql_error());
}
echo ' 連線成功 ';
mysql_close($Link);
?>
?>
