<?php include("../connectDB.php");
  session_start();
?>

<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/achievement.css">
  <script src="js/jquery-2.2.1.min.js"></script>
  <script src="js/masonry.pkgd.min.js"></script>
  <script src="js/script.js"></script>
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
      <li><a href="../achievement/achievement.php">成就達成</a></li>
      <li><a href="../achievement/post.php">我要分享成果</a></li>
      <li><a href="../issue/issue.php">相關議題報導</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="../member/myAccount.php">會員中心</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="../member/logout.php">登出</a></li>
    </ul>
  </div>

  <div class="container">
    <h1 id="issue-title">成就達成</h1>
    <div id="green-bar"></div>
  </div>

  <?php
  
  $year = date('Y');
  $month = date('n');

  while(1){
    $sql = "SELECT * FROM achievement 
            WHERE MONTH(release_datetime) = $month 
            AND YEAR(release_datetime) = $year ORDER BY release_datetime DESC LIMIT 7";
    $result = $conn->query($sql);

    echo '
    <div class="container">
      <div id="dateNew">'.$year.'年'.$month.'月</div>
    </div>';

    echo '<div class="grid">';

    while($row = $result->fetch_assoc()){
      preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $row['content'], $matches);
      $image = (isset($matches[1]))?$matches[1]:'';
      echo '
      <div class="content_box grid-item" style="background-image: url('.$image.')">
        <div class="content_boxWhite">
          <div class="text">'.$row['location'].'
            <div class="text2">'.$row['release_datetime'].'</div>
          </div>
        </div>
      </div>';
    }
    echo '</div>';
    if($month>1){
      $month--;
    }else{
      $month = 12;
      $year--;
    }
    
  }
  
  ?>

  <div class="container">
    <div id="dateNew">2016年4月</div>
  </div>
  <!--
  <div class="grid">
    <div class="content_box grid-item">
        <div class="content_boxWhite">
          <div class="text">貢寮龍門沙灘
            <div class="text2">108人參加</div>
          </div>
        </div>
      </div>
      <div class="content_box grid-item">
        <div class="content_boxWhite">
          <div class="text">貢寮龍門沙灘
            <div class="text2">108人參加</div>
          </div>
        </div>
      </div>
      <div class="content_box grid-item">
        <div class="content_boxWhite">
          <div class="text">貢寮龍門沙灘
            <div class="text2">108人參加</div>
          </div>
        </div>
      </div>
      <div class="content_box grid-item">
        <div class="content_boxWhite">
          <div class="text">貢寮龍門沙灘
            <div class="text2">108人參加</div>
          </div>
        </div>
      </div>
  </div>-->
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
  <script src="../../js/menu.js"></script>
  <script>
    var n = 1;
    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        loadPage();
      }
    });

    function loadPage(){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
          if(xhttp.responseText == '<i class="end">end</i>')
            $(".end").html(xhttp.responseText);
          else
            $(".issues>ul").append(xhttp.responseText);
          $(".loading").css("display","none");
        }else{
          $(".loading").css("display","block");
        }
      };
      console.log(n);
      xhttp.open("GET","load.php?o="+n,true);
      xhttp.send();
      n++;
    }
  </script>
  <script src="../../js/gotoTop.js"></script>
</body>
</html>
