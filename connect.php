<?php
$username = "dbuser";
$password = "";
$hostname = "localhost";
$dbName = "test";

$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");

$selected = mysql_select_db($dbName,$dbhandle) 
  or die("Could not select examples");
?>