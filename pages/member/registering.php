<?php

session_start();
include("../connectDB.php");

$email = rtrim($_POST["email"]); // 刪空白
$password = $_POST["password"];
$userName = $_POST["userName"];
$phone = $_POST["phone"];

$sql_insert = "INSERT INTO `member` VALUES (NULL, '$email', '$password', '$userName', '$phone')";
if($conn->query($sql_insert)){
	
	//id寫入SESSION
	$sql_retrieveId = "SELECT `id` FROM `member` WHERE `email` = '$email'";
	$row = $conn->query($sql_retrieveId)->fetch_assoc();
	$id = $row["id"];
    $_SESSION["member_id"] = $id;
	
	// Redirect to homepage
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = '../../index.html';
	header("Location: http://$host$uri/$extra");
	exit();
}else{
	echo "Error: ".$conn->error;
}

?>