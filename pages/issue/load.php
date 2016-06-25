<?php

include("../connectDB.php");

$sql = "SELECT * FROM issue ORDER BY release_datetime DESC LIMIT 7 OFFSET ".$_GET['o']*7;
$result = $conn->query($sql);

if($result->num_rows){
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
}else{
  echo '<i class="end">end</i>';
}

?>