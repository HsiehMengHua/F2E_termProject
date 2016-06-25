<?php session_start(); ?>

<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../../css/style.css" />
  <style>
    nav{
      color: white;
      background-color: #313131;
      padding: 17px 50px;
    }

    h1{
      font-weight: 400;
      text-align: center;
      line-height: 4em;
    }

    h1 .material-icons{
      font-size: 1.2em;
      margin-right: 20px;
      position: relative;
      top: 7px;
    }

    .wrap{
      max-width: 400px;
      margin: auto;
      background-color: #f7f7f7;
      border-radius: 3px;
      border: 1px solid #e2e2e2;
      border-bottom: 3px solid #e0e0e0;
      padding: 70px 50px;
    }

    p{
      margin-bottom: 20px;
    }

    button{
      width: 100%;
      background-color: lightgrey;
      border: 0;
      border-bottom: 2px solid transparent;
      border-radius: 3px;
      padding: 5px;
      font-size: 1em;
      color: #626262;
      margin-top: 20px;
    }

    .menu{
      background-color: #97c3be;
      width: 355px;
      height: 100%;
      //padding-left: 100px;
      //padding-right: 30px;
      font-size: 1.17em;
      line-height: 3em;
      position: fixed;
      top: 0;
      left: -355px;
      z-index: 99;

      .close{
        height: 65px;
        text-align: right;
        margin-bottom: 30px;
        margin-right: 30px;

        i{
          font-size: 2em;
          line-height: 65px;
          cursor: pointer;
        }
      }

      li{
        width: 100%;
        padding-left: 28%;

        &.current{
          background-color: #7db7b1;
        }

        &:hover{
          background-color: #7db7b1;
        }

        a{
          -webkit-transition: color .5s;
          transition: color .5s;

          &:hover{
            color: #33717c;
          }
        }
      }
    }
  </style>
</head>
<body>
  <nav class="clear">
    <div><i class="material-icons">menu</i></div>
    <div class="pull-right">
      <?php echo (isset($_SESSION["member_id"]))?'<a href="">我的帳號</a>':'<a href="../member/register.php">註冊</a>'; ?>
       /
      <?php echo (isset($_SESSION["member_id"]))?'<a href="../member/logout.php">登出</a>':'<a href="../member/login.php">登入</a>'; ?>
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

  <h1><i class="material-icons">mail_outline</i>Email驗證</h1>
  <div class="wrap">
    <p>驗證信已送出，請至email點擊驗證連結。</p>
    <p>如果沒收到驗證信，請檢查垃圾信件匣，或<span id="timer"></span>秒後重發驗證信。</p>
    <button id="resend" onclick="resend();" disabled></button>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="../../js/menu.js"></script>
  <script>
    var timer = 60;
    var int = setInterval(function(){
      timer --;
      document.getElementById("resend").innerHTML = "請於 "+timer.toString()+" 秒後再點選重發";
      document.getElementById("timer").innerHTML = timer.toString();
      if(timer == 0){
        clearInterval(int);
        $("button").css("backgroundColor","#8fd5c3").css("borderBottomColor","#58b59d").css("cursor","pointer");
        document.getElementById("resend").innerHTML = "重發驗證信";
        $("button").removeAttr('disabled');
      }
    }, 1000);

    function resend(){
      var xhttp = new XMLHttpRequest();
      xhttp.open("GET","act_resend.php",true);
      xhttp.send();
    }
  </script>
</body>
</html>
