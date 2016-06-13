<?php

session_start();
include("../connectDB.php");

$err = "";
$email = (isset($_POST["email"]))?input($_POST["email"]):"";
$password = (isset($_POST["password"]))?input($_POST["password"]):"";
$userName = (isset($_POST["userName"]))?input($_POST["userName"]):"";
$phone = (isset($_POST["phone"]))?input($_POST["phone"]):"";
date_default_timezone_set("Asia/Taipei");
$datetime = date("Y-m-d H:i:s");

if(empty($email) || empty($password) || empty($userName) || empty($phone)){
  $err = (empty($email) && empty($password) && empty($userName) && empty($phone))?"":"輸入資料不完整";
}else{
  $sql = "SELECT * FROM `member` WHERE `email` = '$email'";
  $result = $conn->query($sql);
  
  if($result->num_rows){
    $err = "Email已被註冊過";
  }else{
    $sql_insert = "INSERT INTO `member` VALUES (NULL, '$email', '$password', '$userName', '$phone', '$datetime')";
    if($conn->query($sql_insert)){

      //id寫入SESSION
      $sql_retrieveId = "SELECT `id` FROM `member` WHERE `email` = '$email'";
      $row = $conn->query($sql_retrieveId)->fetch_assoc();
      $id = $row["id"];
      $_SESSION["member_id"] = $id;

      // Redirect to homepage
      $host  = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = '../../index.html';
      header("Location: http://$host$uri/$extra");
      exit();
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
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/formPage.css" />
</head>
<body>
  <nav class="clear">
    <div><a href=""><i class="material-icons">menu</i></a></div>
    <div class="pull-right"><a href="">註冊</a> / <a href="">登入</a></div>
  </nav>
  <main class="clear">
    <div class="main-image" style="background-image: url(../../img/form_page_image_<?php echo mt_rand(1,4); ?>.jpg)"></div>
    <div class="form">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <ul>
          <li>
            <label>Email<span id="emailErr" style="font-size:0.75em;"></span>
              <input type="email" name="email" id="email" placeholder="email@email.com" onkeyup="checkEmail(this.value)">
            </label>
          </li>
          <li><label>密碼<input type="password" name="password" id="password"></label></li>
          <li>
            <label>確認密碼<span id="passErr" style="font-size:0.75em;"></span>
              <input type="password" id="confirmPassword">
            </label>
          </li>
          <li><label>姓名<input type="text" name="userName"></label></li>
          <li><label>聯絡電話<input type="text" name="phone"></label></li>
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