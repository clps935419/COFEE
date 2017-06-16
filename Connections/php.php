<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_php = "localhost";
$database_php = "order";
$username_php = "clps935419";
$password_php = "ajcf5762";
$php = mysql_pconnect($hostname_php, $username_php, $password_php) or trigger_error(mysql_error(),E_USER_ERROR); 
?>