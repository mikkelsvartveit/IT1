<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_passordkobling = "localhost";
$database_passordkobling = "login";
$username_passordkobling = "root";
$password_passordkobling = "";
$passordkobling = @mysql_pconnect($hostname_passordkobling, $username_passordkobling, $password_passordkobling) or trigger_error(mysql_error(),E_USER_ERROR); 
?>