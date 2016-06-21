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
  <title>Document</title>
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
  
  <main>
    <div class="jumbotron"><h1>「用行動改變世界，為海洋保護盡一份心。」</h1></div>
    <h1>下一場活動，<br>我來號召！</h1>
    <section>
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
          <?php
          /*
          while($row = $result->fetch_assoc()){
            $nx = 'n'.$x;
            $side = ($x%2 == 0)?'left':'right';
            
            echo '<div class="node '.$nx.' '.$side.' clear" style="margin-top:'.$margin=100+200*($x-1).'px">';
            echo '<div class="dot-wrapper"><div class="dot"></div></div>
                  <div class="dialog-box" style="background-image: url(../../img/dialogBox_'.mt_rand(1,5).'.png)">
                    <div class="content">';
            echo '<h3>'.$row['location'].'</h3>';
            echo '<p>日期：'.$row['date'].'</p>';
            echo '<p>時間：'.$row['time'].'</p>';
            echo '</div></div></div>';
            
            $x++;
          }*/
          
          ?>
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
      <li><a href="">發起活動</a></li>
      <li><a href="">問題海灘回報</a></li>
      <li><a href="">相關議題報導</a></li>
      <li><a href="">成就達成</a></li>
    </ul>
    <p>Copyright &copy; 2016</p>
  </footer>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script>
    var n = 0;
    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() > $(document).height() - 350) {
        loadPage();
      }
    });
    
    function loadPage(){
      //var sec_height = 1270+1070*n;
      //$("section").height(sec_height);
      //var xhttp_numRow = new XMLHttpRequest();
      //xhttp_numRow.onreadystatechange = function() {
      //  if(xhttp_numRow.readyState == 4 && xhttp_numRow.status == 200) {
      //    if(n < Math.ceil(xhttp_numRow.responseText/4)){
      //      n++;
      //    }
      //  }
      //};
      //xhttp_numRow.open("GET","numOfRow.php",true);
      //xhttp_numRow.send();
      
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
  </script>
</body>
</html>