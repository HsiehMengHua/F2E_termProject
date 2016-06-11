<?php

session_start();
include("../connectDB.php");

$email = rtrim($_POST["email"]); // 刪空白
$password = $_POST["password"];

$sql = "SELECT id,email,password FROM `member` WHERE `email` = '$email' AND `password` = '$password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row["id"];

// 帳密match
// num_rows return the number of rows in result set
if($result->num_rows){
  $_SESSION["id"] = $id;
  echo "Log in successfully"."<br>";
}else{ // 登入失敗
  echo "Email or password is wrong"."<br>";
}

?>