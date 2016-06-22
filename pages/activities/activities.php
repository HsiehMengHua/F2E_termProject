<?php

session_start();
include("../connectDB.php");

$sql = "SELECT `location`, `date`, `time` FROM `activity` ORDER BY `date` DESC LIMIT 4 OFFSET 0";
$result = $conn->query($sql);
$x = 0;

?>

<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" sizes="32x32" href="../../img/icon/favicon.ico">
  <title>用行動改變世界  為海洋保護盡一份心</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="http://s.mlcdn.co/animate.css">
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/activities.css" />
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
      <li class="current"><a href="">瀏覽所有活動</a></li>
      <li><a href="launch.php">我要發起活動</a></li>
      <li><a href="../report/report.php">回報問題海灘</a></li>
      <li><a href="../achievement/achievement.php">成就達成</a></li>
      <li><a href="../achievement/post.php">我要分享成果</a></li>
      <li><a href="../issue/issue.php">相關議題報導</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="../member/myAccount.php">會員中心</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="../member/logout.php">登出</a></li>
    </ul>
  </div>
  
  <main>
    <div class="jumbotron"><h1>「用行動改變世界，為海洋保護盡一份心。」</h1></div>
    <h1>下一場活動，<br>我來號召！</h1>
    <section>
      <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
      
      <div class="timeline">
        <div class="line"></div>
        <div class="middle">
          <div class="launch-btn-wrapper animated infinite pulse">
            <div class="launch-btn-outer">
              <a href="launch.php">
              <div class="launch-btn-inner">
                <i class="material-icons">add</i>
              </div>
              </a>
            </div>
          </div>
          <!--<div class="node n1 right clear">
            <div class="dot-wrapper"><div class="dot"></div></div>
            <div class="dialog-box">
              <div class="content">
                <h3>新北貢寮龍門沙灘</h3>
                <p>日期：7/16</p>
                <p>時間：16:30-17:30</p>
              </div>
            </div>
          </div>
          <div class="node n2 left clear">
            <div class="dot-wrapper"><div class="dot"></div></div>
            <div class="dialog-box">
              <div class="content">
                <h3>新北貢寮龍門沙灘</h3>
                <p>日期：7/16</p>
                <p>時間：16:30-17:30</p>
              </div>
            </div>
          </div>
          <div class="node n3 right clear">
            <div class="dot-wrapper"><div class="dot"></div></div>
            <div class="dialog-box">
              <div class="content">
                <h3>新北貢寮龍門沙灘</h3>
                <p>日期：7/16</p>
                <p>時間：16:30-17:30</p>
              </div>
            </div>
          </div>
          <div class="node n4 left clear">
            <div class="dot-wrapper"><div class="dot"></div></div>
            <div class="dialog-box">
              <div class="content">
                <h3>新北貢寮龍門沙灘</h3>
                <p>日期：7/16</p>
                <p>時間：16:30-17:30</p>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </section>
  </main>
  
  <footer>
    <ul>
      <li><a href="">瀏覽活動</a></li>
      <li><a href="launch.php">發起活動</a></li>
      <li><a href="../report/report.php">問題海灘回報</a></li>
      <li><a href="../achievement/achievement.php">成就達成</a></li>
      <li><a href="../issue/issue.php">相關議題報導</a></li>
    </ul>
    <p>Copyright &copy; 2016</p>
  </footer>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="../../js/menu.js"></script>
  <script>
    var n = 0;
    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() > $(document).height() - 350) {
        loadPage();
      }
    });
    
    function loadPage(){      
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
          $(".middle").append(xhttp.responseText);
        }
      };
      console.log(n);
      xhttp.open("GET","load.php?o="+n,true);
      xhttp.send();
      n++;
    }
    
    function join(id){
      //alert(id);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
          alert(xhttp.responseText);
        }
      };
      xhttp.open("GET","join.php?id="+id,true);
      xhttp.send();
    }
  </script>
  <script src="../../js/gotoTop.js"></script>
</body>
</html>