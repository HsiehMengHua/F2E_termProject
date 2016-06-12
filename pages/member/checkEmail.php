<?php

include("../connectDB.php");

$email = $_GET["email"];
$sql = "SELECT * FROM `member` WHERE `email` = '$email'";
$result = $conn->query($sql);

if($result->num_rows){
  echo "true";
}else{
  echo "false";
}

?>