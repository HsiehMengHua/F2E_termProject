<?php

session_start();
include("../connectDB.php");

if(isset($_SESSION["member_id"]) && $_SESSION["member_id"] != 1){
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
  $extra = '../../index.php';
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
  <meta name="viewport" content="width=device-width">
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/formPage.css" />
</head>
<body>
  <nav>
    <div class="nav-container">
      <div id="nav-left">
        <div><i class="material-icons">menu</i></div>
      </div>
      <div id="nav-right">
        <?php echo (isset($_SESSION["member_id"]))?'<a href="">我的帳號</a>':'<a href="../member/register.php">註冊</a>'; ?>
         /
        <?php echo (isset($_SESSION["member_id"]))?'<a href="../member/logout.php">登出</a>':'<a href="../member/login.php">登入</a>'; ?>
      </div>
    </div>
  </nav>

  <div class="menu">
    <div class="close"><i class="material-icons">close</i></div>
    <ul>
      <li><a href="../activities/activities.php">瀏覽所有活動</a></li>
      <li><a href="../activities/launch.php">我要發起活動</a></li>
      <li><a href="../achievement/achievement.php">成就達成</a></li>
      <li><a href="../achievement/post.php">我要分享成果</a></li>
      <li><a href="../issue/issue.php">相關議題報導</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="myAccount.php">會員中心</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="logout.php">登出</a></li>
    </ul>
  </div>

  <main class="clear">
    <div class="main-image" style="background-image: url(../../img/form_page_image_<?php echo mt_rand(1,4); ?>.jpg)"></div>
    <div class="form pull-right">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <ul>
          <li><label>Email
            <input type="email" name="email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:""; ?>">
          </label></li>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="../../js/menu.js"></script>
</body>
</html>
