<?php

session_start();
include("../connectDB.php");

$sql = "SELECT * FROM `achievement` WHERE `id` = ".$_GET['id'];
$row = $conn->query($sql)->fetch_assoc();
$author_id = $row["author_id"];
$sql_author = "SELECT name FROM member WHERE id = $author_id";
$row_member = $conn->query($sql_author)->fetch_assoc();
$author_name = $row_member['name'];

$location = $row['location'];
$act_date = $row['act_date'];
$release = $row['release_datetime'];
$content = $row['content'];

// 找出內文中的第一個圖片
preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $content, $matches);
$first_image = (isset($matches[1]))?$matches[1]:"../../img/transparent.png";

// 選60天內瀏覽次數最高的前7個報導，sidebar用
$sql_popular = "SELECT `id`,`location`,`act_date` FROM `achievement` ORDER BY `release_datetime` DESC LIMIT 7";
$result_popular = $conn->query($sql_popular);
//$popularIdList = [];
//$popularLocationList = [];
//$popularDateList = [];
$popularIdList = array();
$popularLocationList = array();
$popularDateList = array();
// 把多項結果存成陣列
while($row_popular = $result_popular->fetch_assoc()){
  array_push($popularIdList,$row_popular['id']);
  array_push($popularLocationList,$row_popular['location']);
  array_push($popularDateList,$row_popular['act_date']);
}

// 取得上一篇
$sql_prev = 'SELECT id,location,act_date,content FROM `achievement` WHERE `id` <'.$_GET['id'].' ORDER BY `id` DESC LIMIT 1';
$result_prev = $conn->query($sql_prev);
if($result_prev->num_rows){
  $row_prev = $result_prev->fetch_assoc();
  $prev_id = $row_prev['id'];
  $prev_location = $row_prev['location'];
  $prev_act_date = $row_prev['act_date'];
  $prev_content = $row_prev['content'];
  preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $prev_content, $prev_matches);
  $prev_image = (isset($prev_matches[1]))?$prev_matches[1]:"";
}

// 取得下一篇
$sql_next = 'SELECT id,location,act_date,content FROM `achievement` WHERE `id` >'.$_GET['id'].' ORDER BY `id` ASC LIMIT 1';
$result_next = $conn->query($sql_next);
if($result_next->num_rows){
  $row_next = $result_next->fetch_assoc();
  $next_id = $row_next['id'];
  $next_location = $row_next['location'];
  $next_act_date = $row_next['act_date'];
  $next_content = $row_next['content'];
  preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $next_content, $next_matches);
  $next_image = (isset($next_matches[1]))?$next_matches[1]:"";
}

?>


<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title><?php echo $location."，".$act_date; ?></title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/article.css" />
  <style>
    .date{
      float: right;
    }
  </style>
</head>

<body>

  <nav class="clear">
    <div><i class="material-icons">menu</i></div>
    <div class="pull-right">
      <?php echo (isset($_SESSION["member_id"]))?'<a href="">我的帳號</a>':'<a href="../member/register.php">註冊</a>' ?>
       /
      <?php echo (isset($_SESSION["member_id"]))?'<a href="../member/logout.php">登出</a>':'<a href="../member/login.php">登入</a>' ?>
    </div>
  </nav>

  <div class="menu">
    <div class="close"><i class="material-icons">close</i></div>
    <ul>
      <li><a href="../activities/activities.php">瀏覽所有活動</a></li>
      <li><a href="../activities/launch.php">我要發起活動</a></li>
      <li><a href="achievement.php">成就達成</a></li>
      <li><a href="post.php">我要分享成果</a></li>
      <li><a href="../issue/issue.php">相關議題報導</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="../member/myAccount.php">會員中心</a></li>
      <li class="<?php echo (isset($_SESSION[member_id]))?'':'hide'; ?>"><a href="../member/logout.php">登出</a></li>
    </ul>
  </div>

  <main>
    <div class="container">
      <div class="clear">
        <div class="main-content">
          <div class="heading">
            <h1><?php echo $location."，".$act_date; ?></h1>
            <div class="article-info clear">
              <p><i class="material-icons">schedule</i>  <?php echo $release; ?>，<?php echo $author_name; ?></p>
              <p class="pull-right">這裡放分享連結</p>
            </div>
          </div>
          <img src="<?php echo $first_image; ?>" alt="<?php echo $location."，".$act_date; ?>">
          <article>
            <?php echo $content; ?>
          </article>
          <div class="other">
            <div class="container clear">
              <div class="prev-news <?php echo ($result_prev->num_rows)?"":"hide"; ?>">
                <a href="<?php echo "article.php?id=$prev_id"; ?>"><p>上一篇文章</p></a>
                <a href="<?php echo "article.php?id=$prev_id"; ?>">
                  <div class="image" style="background-image: url(<?php echo $prev_image; ?>)"></div>
                </a>
                <a href="<?php echo "article.php?id=$prev_id"; ?>" class="clear">
                  <h4><?php echo $prev_location; ?></h4>
                  <h4 class="date"><?php echo $prev_act_date; ?></h4>
                </a>
              </div>
              <div class="next-news pull-right <?php echo ($result_next->num_rows)?"":"hide"; ?>">
                <a href="<?php echo "article.php?id=$next_id"; ?>"><p>下一篇文章</p></a>
                <a href="<?php echo "article.php?id=$next_id"; ?>">
                  <div class="image" style="background-image: url(<?php echo $next_image; ?>)"></div>
                </a>
                <a href="<?php echo "article.php?id=$next_id"; ?>" class="clear">
                  <h4><?php echo $next_location; ?></h4>
                  <h4 class="date"><?php echo $next_act_date; ?></h4>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="sidebar pull-right">
          <h4>最新的成果分享</h4>
          <ul>
            <?php
            for($i=0; $i<sizeof($popularIdList); $i++){
              echo '<li>
              <a href="article.php?id='.$popularIdList[$i].'">'.$popularLocationList[$i].'，'.$popularDateList[$i].'</a>
              </li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <ul>
      <li><a href="../activities/activities.php">瀏覽活動</a></li>
      <li><a href="../activities/launch.php">發起活動</a></li>
      <li><a href="achievement.php">成就達成</a></li>
      <li><a href="../issue/issue.php">相關議題報導</a></li>
    </ul>
    <p>Copyright &copy; 2016</p>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="../../js/menu.js"></script>
  <script>
    $(function(){
      var animaion = setInterval(update, 5);
      function update(){
        var y = $(this).scrollTop();
        if(y>120)
          $(".sidebar").css('top', y-120);
      }
    });
  </script>
</body>
</html>
