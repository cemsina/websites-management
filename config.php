<?php
header("Content-Type: text/html; charset=utf-8");  
$host = "localhost";
$dbname = "site_yonetim";
$dbusername="root";
$dbpassword = "";

$connection = @mysql_connect($host,$dbusername,$dbpassword) or die ("Database settings failed.");
mysql_select_db($dbname,$connection) or die ("Could not select database.");
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET character_set_connection = 'UTF8'");
mysql_query("SET character_set_client = 'UTF8'");
mysql_query("SET character_set_results = 'UTF8'");
?>