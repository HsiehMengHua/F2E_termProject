<?php

include("../connectDB.php");

$sql = "SELECT * FROM `issue` WHERE `id` = ".$_GET['id'];
$row = $conn->query($sql)->fetch_assoc();

$issue_id = $row['id'];
$title = $row['title'];
$datetime = $row['release_datetime'];
$source = $row['source'];
$image_path = $row['image_path'];
$html_path = $row['html_path'];
$views = $row['views'];

$sql_currentViews = "SELECT `views` FROM `issue` WHERE `id` = $issue_id";
$row_views = $conn->query($sql_currentViews)->fetch_assoc();
$count = $row_views["views"]+1;
$sql_countViews = "UPDATE `issue` SET `views` = '$count' WHERE `id` = $issue_id";
$conn->query($sql_countViews);

// 選60天內瀏覽次數最高的前7個報導，sidebar用
$sql_popular = "SELECT `id`,`title` FROM `issue` WHERE `release_datetime` BETWEEN DATE_SUB(release_datetime,INTERVAL 60 DAY) AND NOW() ORDER BY `views` DESC LIMIT 7";
$result_popular = $conn->query($sql_popular);
$popularIdList = [];
$popularTitleList = [];
// 把多項結果存成陣列
while($row_popular = $result_popular->fetch_assoc()){
  array_push($popularIdList,$row_popular['id']);
  array_push($popularTitleList,$row_popular['title']);
}

?>


<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?></title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/issue_article.css" />
  <script src="http://www.w3schools.com/lib/w3data.js"></script>
</head>

<body>
 
  <nav class="clear">
    <div><a href=""><i class="material-icons">menu</i></a></div>
    <div class="pull-right"><a href="">註冊</a> / <a href="">登入</a></div>
  </nav>
  
  <main>
    <div class="container">
      <div class="clear">
        <div class="main-content">
          <div class="heading">
            <h1><?php echo $title; ?></h1>
            <div class="article-info clear">
              <p><i class="material-icons">schedule</i>  <?php echo $datetime; ?>，<?php echo $source; ?></p>
              <p class="pull-right"><i class="material-icons">visibility</i>  <?php echo $views; ?></p>
            </div>
          </div>
          <img src="<?php echo $image_path; ?>" alt="<?php echo $title; ?>">
          <article>
            <div w3-include-html="<?php echo $html_path; ?>"></div>
          </article>
          <div class="other_news">
            <div class="container clear">
              <div class="prev-news">
                <p>上一篇報導</p>
                <div class="image"></div>
                <h4>微塑膠成為幼魚「新食物」</h4>
              </div>
              <div class="next-news pull-right">
                <p>下一篇報導</p>
                <div class="image"></div>
                <h4>幼魚肚裡滿滿柔珠研究證實影響成長</h4>
              </div>
              <div class="next-news"></div>
            </div>
          </div>
        </div>
        <div class="sidebar pull-right">
          <h4>大家在關注的報導</h4>
          <ul>
            <?php
            for($i=0; $i<sizeof($popularIdList); $i++){
              echo '<li><a href="issue_article.php?id='.$popularIdList[$i].'">'.$popularTitleList[$i].'</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
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
  <script>w3IncludeHTML();</script>
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