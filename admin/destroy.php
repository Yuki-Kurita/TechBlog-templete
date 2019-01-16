<?php
session_start();
$titles = $_POST['title'];
if(empty($titles)){
  $_SESSION['message'] = '記事を選択してください';
  header('Location:./main.php');
}
// DB設定
define('DSN','mysql:host=mysql1.php.xdomain.ne.jp;dbname=otter3_sites;charset=utf8');
define('DB_USER','otter3_u');
define('DB_PASSWORD','28kialtoma');
// PDO接続
try{
  $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
} catch(PDOException $e){
  exit('データベースに接続できませんでした。'.$e->getMessage());
}
// 指定されたpostのtitleからpostのidを取得
$stmt = $pdo->prepare("SELECT * FROM post WHERE title = ?");
for($i=0; $i<count($titles); $i++){
  $stmt -> execute(array($titles[$i]));
  // 全てのレコードを配列として返す
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $postid = $row['no'];
    // postidと一致するコメントを削除
    $sql = "DELETE FROM comment WHERE post_no = :post_no";
    $stmt2 = $pdo->prepare($sql);
    $params = array(':post_no'=>$postid);
    $stmt2->execute($params);
    // postidと一致するポストを削除
    $sql2 = "DELETE FROM post WHERE no = :no";
    $stmt3 = $pdo->prepare($sql2);
    $params2 = array(':no'=>$postid);
    $stmt3->execute($params2);
  }
}
header('Location:./main.php')

?>
