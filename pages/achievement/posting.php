<?php

session_start();
include("../connectDB.php");

$author_id = $_SESSION["member_id"];
$location = $_POST["location"];
$date = $_POST["date"];
date_default_timezone_set("Asia/Taipei");
$release_datetime = date("Y-m-d H:i:s");
$content = $_POST["editor"];

$sql_insert = "INSERT INTO `achievement` VALUES (NULL,'$author_id','$location','$date','$release_datetime','$content')"; 

if($conn->query($sql_insert)){
  // 取得它的id
  $sql_retrieveId = "SELECT `id` FROM `achievement` ORDER BY `id` DESC LIMIT 1";
  $row = $conn->query($sql_retrieveId)->fetch_assoc();
  $ach_id = $row["id"];

  // Redirect
  $host  = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = "article.php?id=$ach_id";
  header("Location: http://$host$uri/$extra");
  exit();
}else{
  echo "資料新增失敗: ".$conn->error;
}

?>