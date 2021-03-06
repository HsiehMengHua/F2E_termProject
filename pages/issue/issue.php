<?php

session_start();
include("../connectDB.php");

$sql = "SELECT * FROM issue ORDER BY release_datetime DESC LIMIT 7";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>環保議題，由你發起</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/gotoTop.css" />
  <link rel="stylesheet" href="../../css/issue.css">
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
      <li class="current"><a href="">相關議題報導</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="../member/myAccount.php">會員中心</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="../member/logout.php">登出</a></li>
    </ul>
  </div>

  <div class="container">

    <h1 id="issue-title">相關議題報導</h1>
    <div id="green-bar"></div>
    <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
    <div class="issues">
      <ul>
        <?php

        while($row = $result->fetch_assoc()){
          preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $row['content'], $matches);
          $image = (isset($matches[1]))?$matches[1]:'';
          echo '
          <a href="article.php?id='.$row['id'].'">
            <li>
              <div class="issue-image col-xs-12 col-sm-4 col-md-4" style="background-image: url('.$image.')"></div>
              <div class="issue-content col-xs-12 col-sm-8 col-md-8">
                <h2>'.$row['title'].'</h2>
                <p class="small">'.$row['release_datetime'].'，'.$row['source'].'</p>
                <p class="context">'.mb_substr($row['content'],0,50,"utf-8").'</p>
              </div>
            </li>
          </a>';
        }

        ?>
        <!--
        <a href="">
          <li>
            <div class="issue-image col-xs-12 col-sm-4 col-md-4"></div>
            <div class="issue-content col-xs-12 col-sm-8 col-md-8">
              <h2>標題標題標題標題標題標題標題標題標題</h2>
              <p class="small">發布時間，來源</p>
              <p class="context">看守台灣協會調查，市售近5百種沐浴乳、洗面乳等清潔用品有4成含塑膠微粒，但消費者若優先挑選標榜有深層清潔......</p>
            </div>
          </li>
        </a>
        -->
      </ul>

      <img src="../../img/icon/icon_loading.png" alt="" class="loading hide">
    </div>
  </div>

  <footer>
    <ul>
      <li><a href="../activities/activities.php">瀏覽活動</a></li>
      <li><a href="../activities/launch.php">發起活動</a></li>
      <li><a href="../achievement/achievement.php">成就達成</a></li>
      <li><a href="../achievement/post.php">相關議題報導</a></li>
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
