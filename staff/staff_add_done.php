<?php

require_once('../common/common.php');

try {

  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];
  // メモ：$_POSTは「check.php」から送られてきた

  $dbh = connectDB();

  $sql = 'insert into staff (name, password) values (?, ?)';
  // メモ：insertは新しくデータを追加する意味
  $stmt = $dbh->prepare($sql);
  $data[] = $staff_name;
  $data[] = $staff_pass;
  $stmt->execute($data);

  $dbh = null;
} catch (Exception $e) {
  echo '何かしらのエラーが発生しています';
  echo $e->getMessage();
  exit();
}

echo $staff_name . ' の登録が完了しました<br>';
echo '<a href="staff_login.php">ログインする</a>';