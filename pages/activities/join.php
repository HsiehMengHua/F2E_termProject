<?php

session_start();
include("../connectDB.php");

$activity_id = $_GET["id"];
$sql_select = "SELECT email FROM member WHERE id=".$_SESSION["member_id"];
$row_select = $conn->query($sql_select)->fetch_assoc();

$member_id = (isset($_SESSION["member_id"]))?$_SESSION["member_id"]:'';
$email = (isset($row_select['email']))?$row_select['email']:'';
$num_of_people = 1;

$sql = "INSERT INTO `participants` (`activity_id`, `member_id`, `email`, `num_of_people`) 
        VALUES ('$activity_id', '$member_id', '$email', '$num_of_people')";

if($conn->query($sql)){
  echo "已+";
}else{
  echo "娃沒加到";
}

?>