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
$userName = (isset($_POST["userName"]))?input($_POST["userName"]):"";
$phone = (isset($_POST["phone"]))?input($_POST["phone"]):"";
date_default_timezone_set("Asia/Taipei");
$datetime = date("Y-m-d H:i:s");
$act_code = md5($email.$password.$datetime);

if(empty($email) || empty($password) || empty($userName) || empty($phone)){
  $err = (empty($email) && empty($password) && empty($userName) && empty($phone))?"":"輸入資料不完整";
}else{
  $sql = "SELECT * FROM `member` WHERE `email` = '$email'";
  $result = $conn->query($sql);

  if($result->num_rows){
    $err = "Email已被註冊過";
  }else{
    $sql_insert = "INSERT INTO `member` (`id`, `email`, `password`, `name`, `phone`, `register_datetime`, `activated`, `activate_code`) VALUES (NULL, '$email', '$password', '$userName', '$phone', '$datetime', '0', '$act_code')";
    if($conn->query($sql_insert)){

      //id寫入SESSION
      $sql_retrieveId = "SELECT `id` FROM `member` WHERE `email` = '$email'";
      $row = $conn->query($sql_retrieveId)->fetch_assoc();
      $id = $row["id"];
      $_SESSION["member_id"] = $id;

      $header = "Content-type:text/html;charset=UTF-8";
      $header .= "\nFrom: mailnotice3@gmail.com";
      $host  = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = "activate.php?code=$act_code";
      $act_link = "http://$host$uri/$extra";
      $text = '
      <p>你已註冊成為會員，請點擊以下連結驗證你的電子信箱：</p>
      <a href="'.$act_link.'">'.$act_link.'</a>';

      if(mail($email,"會員帳號啟用信",$text,$header)){
        header("Location: act_sent.php");
      }else{
        echo "Somthing wrong. Email was not sent.";
      }
    }else{
      $err = "Error: ".$conn->error;
    }
  }
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
          <li>
            <label>Email<span id="emailErr"></span>
              <input type="email" name="email" id="email" value="<?php echo $email; ?>" onkeyup="checkEmail(this.value)">
            </label>
          </li>
          <li><label>密碼<input type="password" name="password" id="password"></label></li>
          <li>
            <label>確認密碼<span id="passErr"></span>
              <input type="password" id="confirmPassword">
            </label>
          </li>
          <li><label>姓名<input type="text" name="userName" value="<?php echo $userName; ?>"></label></li>
          <li><label>聯絡電話<input type="text" name="phone" value="<?php echo $phone; ?>"></label></li>
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
  <script>
    $(function() {
      $('form input').on("focus",function(){
        $(this).parent().css("color","#55bbb5");
        $(this).css("borderBottomColor","#55bbb5");
      });
      $('form input').on("blur",function(){
        $(this).parent().css("color","#313b4f");
        $(this).css("borderBottomColor","#313b4f");
      });

      $('#confirmPassword').keyup(function(){
        if($(this).val() == $('#password').val()){
          $(this).css("borderBottomColor","#75da7a");
          $(this).parent().css("color","#75da7a");
          $("#passErr").html("");
          $("button.submit").attr("disabled",false);
        }else{
          $(this).css("borderBottomColor","#e53a3a");
          $(this).parent().css("color","#e53a3a");
          $("#passErr").html("　輸入密碼不一致");
          $("button.submit").attr("disabled",true);
        }
      });
    });
  </script>
  <script>
    function checkEmail(str){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
          console.log(xhttp.responseText);

          if(xhttp.responseText == "false"){
            $("#email").css("borderBottomColor","#75da7a");
            $("#email").parent().css("color","#75da7a");
            $("#emailErr").html("");
          }else{
            $("#email").css("borderBottomColor","#e53a3a");
            $("#email").parent().css("color","#e53a3a");
            $("#emailErr").html("　你已註冊過");
          }
        }
      };
      xhttp.open("GET","checkEmail.php?email="+str,true);
      xhttp.send();
    }
  </script>
</body>
</html>
