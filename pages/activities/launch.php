<?php

session_start();
if(!isset($_SESSION["member_id"]) || $_SESSION["member_id"] != 1)
  echo '<script>alert("登入先唷");window.location.href="../member/login.php";</script>';

?>

<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>launch</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../../css/bootstrap-material-datetimepicker.css">
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/formPage.css" />
</head>
<body>
  <nav class="clear">
    <div><a href=""><i class="material-icons">menu</i></a></div>
    <div class="pull-right">
      <?php echo (isset($_SESSION["member_id"]))?'<a href="">我的帳號</a>':'<a href="../member/register.php">註冊</a>' ?>
       /
      <?php echo (isset($_SESSION["member_id"]))?'<a href="../member/logout.php">登出</a>':'<a href="../member/login.php">登入</a>' ?>
    </div>
  </nav>
  <main class="clear">
    <div class="main-image" style="background-image: url(../../img/form_page_image_<?php echo mt_rand(1,4); ?>.jpg)"></div>
    <div class="form">
      <form action="launching.php" method="post">
        <ul>
          <li><label>哪個海灘？</label><br><input type="text" name="location"></li>
          <li><label>日期</label><br><input type="text" name="date" id="date"></li>
          <li><label>時間 </label><br><input type="text" name="time" id="time"></li>
          <li><label>要提醒大家什麼？ </label><br><textarea name="description" cols="30" rows="10"></textarea></li>
          <li class="clear">
            <button type="submit" class="submit">送出</button>
            <button onclick="history.back();" class="cancel">取消</button>
          </li>
        </ul>
      </form>
    </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://momentjs.com/downloads/moment-with-locales.min.js"></script> <!-- 有 .min.js 在local資料夾 -->
  <script src="../../js/bootstrap-material-datetimepicker.js"></script>
  <script>
	  $(function() {
        $('#date').bootstrapMaterialDatePicker({ weekStart: 0, time: false, minDate: new Date() });
        $('#time').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm', switchOnClick: true });
	  });
  </script>
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
</body>
</html>
