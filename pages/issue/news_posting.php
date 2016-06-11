<?php

session_start();
include("../connectDB.php");

$title = $_POST["title"];
date_default_timezone_set("Asia/Taipei");
$datetime = date("Y-m-d H:i:s");
$source = $_POST["source"];

$sql_insert = "INSERT INTO `issue` (`id`, `title`,`release_datetime`, `source`) VALUES (NULL, '$title','$datetime', '$source')"; 

if($conn->query($sql_insert)){
  
  // 取得它的id
  $sql_retrieveId = "SELECT `id` FROM `issue` ORDER BY `id` DESC LIMIT 1";
  $row = $conn->query($sql_retrieveId)->fetch_assoc();
  $issue_id = $row["id"];
  
  // 上傳html
  mkdir("../../file_upload/issue/html/$issue_id/");
  $target_html_dir = "../../file_upload/issue/html/$issue_id/";

  $target_html = $target_html_dir.basename($_FILES["htmlUpload"]["name"]);
  $html_uploadOk = 1;
  $fileType = pathinfo($target_html,PATHINFO_EXTENSION);

  // Check if file already exists
  if (file_exists($target_html)) {
    echo "檔案路徑衝突，改個檔名看看？";
    $html_uploadOk = 0;
  }
  // Allow certain file formats
  if($fileType != "html" && $fileType != "htm") {
    echo "請上傳 html, htm";
    $html_uploadOk = 0;
  }
  // 如果 $uploadOk == 1 就可以上傳了
  if($html_uploadOk == 0){
    echo "Sorry, your file was not uploaded.";
  }else{
    if (move_uploaded_file($_FILES["htmlUpload"]["tmp_name"], $target_html)) {
      echo "The file ". basename( $_FILES["htmlUpload"]["name"]). " has been uploaded.";

      // 上傳主圖
      mkdir("../../file_upload/issue/image/$issue_id/");
      $target_image_dir = "../../file_upload/issue/image/$issue_id/";

      $target_image = $target_image_dir.basename($_FILES["imageUpload"]["name"]);
      $image_uploadOk = 1;
      $imageFileType = pathinfo($target_image,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - ".$check["mime"].".";
          $image_uploadOk = 1;
        } else {
          echo "File is not an image.";
          $image_uploadOk = 0;
        }
      }
      if (file_exists($target_image)) {
        echo "檔案路徑衝突，改個檔名看看？";
        $image_uploadOk = 0;
      }
      if ($_FILES["imageUpload"]["size"] > 500000) {
        echo "檔案過大！";
        $image_uploadOk = 0;
      }
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "請上傳 JPG, JPEG, PNG, GIF";
        $image_uploadOk = 0;
      }
      if ($image_uploadOk == 0) {
        echo "Sorry, your image was not uploaded.";
      } else {
        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_image)) {
          echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
          
          // 紀錄file name到DB
          // The path is relative to issue_article.php
          $imagePath = "../../file_upload/issue/image/$issue_id/".basename($_FILES["imageUpload"]["name"]);
          $htmlPath = "../../file_upload/issue/html/$issue_id/".basename($_FILES["htmlUpload"]["name"]);
          $sql_storeFilePath = "UPDATE `issue` SET `image_path` = '$imagePath', `html_path` = '$htmlPath' WHERE `issue`.`id` = $issue_id";
          if($conn->query($sql_storeFilePath)){
              echo "updated";
          }else{
              echo "Error: ".$conn->error;
          }
        } else {
            echo "圖片上傳失敗";
        }
      }
    }else{
        echo "html上傳失敗";
    }
  }
}else{
  echo "資料新增失敗: ".$conn->error;
}

?>