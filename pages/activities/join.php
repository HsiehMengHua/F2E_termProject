<?php

session_start();
include("../connectDB.php");

$activity_id = $_GET["id"];
$sql_select = "SELECT email FROM member WHERE id=".$_SESSION["member_id"];
$row_select = $conn->query($sql_select)->fetch_assoc();

$member_id = (isset($_SESSION["member_id"]))?$_SESSION["member_id"]:'';
$email = (isset($row_select['email']))?$row_select['email']:'';
$num_of_people = 1;

$sql_checkDup = "SELECT * FROM participants WHERE email = '$email' AND activity_id = $activity_id";
$result_checkDup = $conn->query($sql_checkDup);
if(!$result_checkDup->num_rows){
  $sql_insert = "INSERT INTO `participants` (`activity_id`, `member_id`, `email`, `num_of_people`) 
                 VALUES ('$activity_id', '$member_id', '$email', '$num_of_people')";

  if($conn->query($sql_insert)){
    $sql_getNum = "SELECT num_participant FROM activity WHERE id = $activity_id";
    $row_getNum = $conn->query($sql_getNum)->fetch_assoc();
    $count = $row_getNum['num_participant']+$num_of_people;
    $sql_update = "UPDATE activity SET num_participant =  '$count' WHERE id = $activity_id";
    $conn->query($sql_update);
    echo "已+";
  }else{
    echo "娃沒加到";
  }
}else{
  echo "你已經參加了啊";
}

?>