<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn = "remote-mysql4.servage.net";
$database_conn = "wc574_main";
$username_conn = "wc574_main";
$password_conn = "passwords123";
$conn = mysql_connect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_conn, $conn);
//adodb try
$path = '/home135/sub004/sc29722-KLXJ/wc5.org';
include($path.'/includes/adodb5/adodb.inc.php');
$ADODB_CACHE_DIR = $path.'/tmp/adodbcache';
$connAdodb = ADONewConnection('mysql');
$connAdodb->Connect($hostname_conn, $username_conn, $password_conn, $database_conn);
//$connAdodb->LogSQL();
?>