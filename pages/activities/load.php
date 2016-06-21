<?php

include("../connectDB.php");
  
$sql = "SELECT `location`, `date`, `time` FROM `activity` ORDER BY `date` DESC LIMIT 1 OFFSET ".$_GET['o'];
$result = $conn->query($sql);

$x = $_GET['o']+1;
//while($row = $result->fetch_assoc()){
if($row = $result->fetch_assoc()){
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
  $h = 590+200*($x-2);
  echo '<script>
  $("section").height('.$h.');
  $(".'.$nx.'").hide().fadeIn(800).animate({top: "30px"},{ queue: false},800);
  </script>';
}

?>