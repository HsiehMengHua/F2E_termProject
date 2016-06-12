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
    <div class="main-image"></div>
    <div class="form">
      <form action="registering.php" method="post">
        <ul>
          <li>
            <label>Email<span id="emailErr" style="font-size:0.75em;"></span>
              <input type="email" name="email" id="email" placeholder="email@email.com" onkeyup="checkEmail(this.value)">
            </label>
          </li>
          <li><label>密碼<input type="password" name="password" id="password"></label></li>
          <li><label>確認密碼<input type="password" id="confirmPassword"></label></li>
          <li><label>姓名<input type="text" name="userName"></label></li>
          <li><label>聯絡電話<input type="text" name="phone"></label></li>
          <li><button type="submit" class="submit">送出</button><button onclick="history.back()" class="cancel">取消</button></li>
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
        }else{
          $(this).css("borderBottomColor","#e53a3a");
          $(this).parent().css("color","#e53a3a");
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