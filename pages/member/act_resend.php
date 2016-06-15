<?php

session_start();
include("../connectDB.php");

$id = $_SESSION["member_id"];
$sql = "SELECT email,activate_code FROM member WHERE id = $id";
$row = $conn->query($sql)->fetch_assoc();
$email = $row["email"];
$act_code = $row["activate_code"];

$header = "Content-type:text/html;charset=UTF-8";
$header .= "\nFrom: mailnotice3@gmail.com";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "activate.php?code=$act_code";
$act_link = "http://$host$uri/$extra";
$text = '
<p>你已註冊成為會員，請點擊以下連結驗證你的電子信箱：</p>
<a href="'.$act_link.'">'.$act_link.'</a>';

mail($email,"會員帳號啟用信",$text,$header);
?>