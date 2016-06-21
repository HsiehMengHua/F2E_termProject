<?php

session_start();
include("../connectDB.php");

if(isset($_SESSION["member_id"])){
  $location = $_POST["location"];
  $date = $_POST["date"];
  $time = $_POST["time"];
  $desc = $_POST["description"];
  $id = $_SESSION["member_id"];

  $sql_insert = "INSERT INTO `activity` (`id`, `initiator_id`, `date`, `time`, `location`, `description`) VALUES (NULL, '$id', '$date', '$time', '$location', '$desc')";

  if($conn->query($sql_insert)){

      echo "data inserted";
      // Redirect
      $host  = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = "activities.php";
      header("Location: http://$host$uri/$extra");
      exit();
  }else{
      echo "Error: ".$conn->error;
  }

}else{
  echo "登入先唷";
}

?>