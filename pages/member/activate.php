<?php

session_start();
include("../connectDB.php");

if($_SESSION['member_id'] != 1){
  $code = $_GET["code"];
  if(!isset($code) || !ereg("^[a-z0-9]{32}$",$code)){
    echo '<script>alert("你哪位！？走開！"); history.back();</script>';
  }else{
    $sql = "UPDATE `member` SET `activated` = '1' WHERE `activate_code` = '$code'";
    if($conn->query($sql))
      $success = true;
    else
      $success = false;
  }
}else{
  $success = true;
}

?>


<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../../css/style.css" />
  <style>
    *{margin: 0; padding: 0; color: white;}
    html,body,img{
      width: 100%;
      background-color: black;
      font-size: 1.15em;
    }
    .center{
      text-align: center;
    }
    p{
      font-size: 2em;
      color: #d4d4d4;
    }
    span{
      font-size: 1.3rem;
    }
    li{
      margin-bottom: 10px;
    }
    .hide{
      display: none;
    }
  </style>
</head>
<body>
  <img src="../../img/01.jpg" alt="">
  <div>
    <div class="center <?php if(!$success) echo 'hide'; ?>">
      <p>帳號啟用成功<br><span>接下來你可以：</span></p><br>
      <ul>
        <li><a href="">管理會員資料</a></li>
        <li><a href="../activities/activities.php">瀏覽所有活動</a></li>
        <li><a href="../activities/launch.php">發起活動</a></li>
        <li><a href="">瀏覽活動成果分享</a></li>
        <li><a href="../issue/issue.html">瀏覽相關議題報導</a></li>
      </ul>
    </div>
    <div class="center <?php if($success) echo 'hide'; ?>">
      <p>啟用失敗</p>
    </div>
  </div>
</body>
</html>
