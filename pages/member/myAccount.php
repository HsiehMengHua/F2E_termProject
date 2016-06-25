<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>我的檔案</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/myAccount.css">
</head>

<body>
  <nav>
    <div class="nav-container">
      <div id="nav-left">
        <div><i class="material-icons">menu</i></div>
      </div>
      <div id="nav-right">
        <?php echo (isset($_SESSION["member_id"]))?'<a href="">我的帳號</a>':'<a href="../member/register.php">註冊</a>' ?> /
        <?php echo (isset($_SESSION["member_id"]))?'<a href="../member/logout.php">登出</a>':'<a href="../member/login.php">登入</a>' ?>
      </div>
    </div>
  </nav>

  <div class="menu">
    <div class="close"><i class="material-icons">close</i></div>
    <ul>
      <li><a href="../activities/activities.php">瀏覽所有活動</a></li>
      <li><a href="../activities/launch.php">我要發起活動</a></li>
      <li><a href="../achievement.php">成就達成</a></li>
      <li><a href="../achievement/post.php">我要分享成果</a></li>
      <li><a href="../issue/issue.php">相關議題報導</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="pages/member/myAccount.php">會員中心</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="pages/member/logout.php">登出</a></li>
    </ul>
  </div>

  <div class="big-pic"></div>

  <div class="container">
    <ul class="block-container">
      <li class="myAccountBlock">
        <div class="block-icon">
          <i class="material-icons">face</i>
          <div class="block-data">
            <label>請輸入舊密碼：
              <input type="text" name="location">
            </label>
            <label>輸入新密碼：
              <input type="text" name="location">
            </label>
            <label>輸入新密碼(第二次)：
              <input type="text" name="location">
            </label>
          </div>
        </div>
        <div class="block-title">
          <button class="send-data" type="button" name="button">確認</button>
          <p>修改會員資料</p>
        </div>
      </li>
      <li class="myAccountBlock">
        <div class="block-icon">
          <i class="material-icons">event</i>
          <div class="block-data">Loading...</div>
        </div>
        <div class="block-title">
          <p>我的活動</p>
        </div>
      </li>
      <li class="myAccountBlock">
        <div class="block-icon">
          <i class="material-icons">book</i>
          <div class="block-data">Loading...</div>
        </div>
        <div class="block-title">
          <p>我的文章</p>
        </div>
      </li>
      <li class="myAccountBlock">
        <div class="block-icon">
          <i class="material-icons">list</i>
          <div class="block-data">Loading...</div>
        </div>
        <div class="block-title">
          <p>口袋清單</p>
        </div>
      </li>
      <li class="myAccountBlock">
        <div class="block-icon">
          <i class="material-icons">email</i>
          <div class="block-data">Loading...</div>
        </div>
        <div class="block-title">
          <p>重發驗證信</p>
        </div>
      </li>
      <li class="myAccountBlock">
        <div class="block-icon">
          <i class="material-icons">star</i>
          <div class="block-data">Loading...</div>
        </div>
        <div class="block-title">
          <p>我的積分</p>
        </div>
      </li>
    </ul>
  </div>

  <footer>
    <ul>
      <li><a href="">瀏覽活動</a></li>
      <li><a href="">發起活動</a></li>
      <li><a href="">相關議題報導</a></li>
      <li><a href="">成就達成</a></li>
    </ul>
    <p>Copyright &copy; 2016</p>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="../../js/jquery-3.0.0.min.js"></script>
  <script src="../../js/myAccount.js"></script>
  <script src="../../js/menu.js"></script>
</body>

</html>
