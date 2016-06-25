<?php

$hostname = getenv('OPENSHIFT_MYSQL_DB_HOST');
$username = "";
$password = "";
$DBname = "seaprotect";

mysql_query("SET NAMES ‘UTF8′");
mysql_query("SET CHARACTER SET UTF8");

// Create connection
$conn = new mysqli($hostname, $username, $password, $DBname);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Error: "+$conn->connect_error);
}

?>
