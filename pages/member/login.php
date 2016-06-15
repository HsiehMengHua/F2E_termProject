<?php

session_start();
include("../connectDB.php");

if(isset($_SESSION["member_id"])){
  echo '<script>
  if (window.confirm("你已經登入，要登出再註冊新帳號嗎？")){
    window.location.href="../member/logout.php";
  }else{
    history.back();
  }
  </script>';
}

$err = "";
$email = (isset($_POST["email"]))?input($_POST["email"]):"";
$password = (isset($_POST["password"]))?md5(input($_POST["password"])):"";

$sql = "SELECT id,email,password FROM `member` WHERE `email` = '$email' AND `password` = '$password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row["id"];

// 帳密match
// num_rows return the number of rows in result set
if($result->num_rows){
  $_SESSION["member_id"] = $id;
  echo "Log in successfully"."<br>";
  // Redirect to homepage
  $host  = $_SERVER['HTTP_HOST'];
  $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = '../../index.html';
  header("Location: http://$host$uri/$extra");
  exit();
}else{ // 登入失敗
  $err = (empty($email) && empty($password))?"":"Email或密碼輸入錯誤";
}

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/formPage.css" />
</head>
<body>
  <nav class="clear">
    <div><a href=""><i class="material-icons">menu</i></a></div>
    <div class="pull-right">
      <?php echo (isset($_SESSION["member_id"]))?'<a href="">我的帳號</a>':'<a href="../member/register.php">註冊</a>' ?>
       
      <?php echo (isset($_SESSION["member_id"]))?'<a href="../member/logout.php">登出</a>':'<a href="../member/login.php">登入</a>' ?>
    </div>
  </nav>
  <main class="clear">
    <div class="main-image" style="background-image: url(../../img/form_page_image_<?php echo mt_rand(1,4); ?>.jpg)"></div>
    <div class="form">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <ul>
          <li><label>Email<input type="email" name="email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:""; ?>"></label></li>
          <li><label>密碼<input type="password" name="password"></label></li>
          <li class="clear">
            <button type="submit" class="submit">送出</button>
            <button onclick="history.back();" class="cancel">取消</button>
            <span id="err"><?php echo $err."　"; ?></span>
          </li>
        </ul>
      </form>
    </div>
  </main>
  <!--
  <nav class="clear">
    <div><a href=""><i class="material-icons">menu</i></a></div>
    <div class="pull-right"><a href="">註冊</a> / <a href="">登入</a></div>
  </nav>
  <form action="login.php" method="post">
    <ul>
      <li><label>Email</label><br><input type="email" name="email"></li>
      <li><label>密碼</label><br><input type="password" name="password"></li>
      <li><input type="button" value="取消" onclick="history.back()"><input type="submit" value="送出"></li>
    </ul>
  </form>-->
</body>
</html>
