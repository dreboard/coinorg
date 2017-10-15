<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
require_once("config.inc.php");

$hostname_conn = $host_name;
$database_conn = $database_name;
$username_conn = $database_user;
$password_conn = $database_pass;
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>