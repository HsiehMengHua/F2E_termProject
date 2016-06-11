<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="registering.php" method="post">
    <ul>
      <li><label>Email</label><br><input type="email" name="email"></li>
      <li><label>密碼</label><br><input type="password" name="password"></li>
      <li><label>確認密碼</label><br><input type="password"></li>
      <li><label>姓名</label><br><input type="text" name="userName"></li>
      <li><label>聯絡電話</label><br><input type="text" name="phone"></li>
      <li><input type="button" value="取消" onclick="history.back()"><input type="submit" value="送出"></li>
    </ul>
  </form>
</body>
</html>