<?php
session_start();
if(!empty($_POST['title'])){
  $_SESSION['title'] = $_POST['title'];
}
// 前の記事のタイトルを保管
$old_title = $_SESSION['title'][0];
// 記事が複数選択されている場合
if(count($_POST['title'])>1){
  $_SESSION['message'] = '編集するときは記事を一つだけ選択してください';
  header('Location:./main.php');
}
// 記事が選択されていない場合
if(empty($_SESSION['title'])){
  $_SESSION['message'] = '記事を選択してください';
  header('Location:./main.php');
}
  // DB設定

define('DSN','mysql:host=YOURS;dbname=YOURDATABASE;charset=utf8');
define('DB_USER','YOUR_USER_NAME');
define('DB_PASSWORD','YOUR_PASSWORD');


  // PDO接続
  try{
    $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
  // 指定されたpostのtitleからpostのidを取得
  $st = $pdo->query("SELECT * FROM post WHERE title = '$old_title'");
  $posts = $st->fetchAll();
}catch(PDOException $e){
    var_dump($e);
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }

  $error = $title = $content = '';
  if (@$_POST['submit']) {
    $new_title = $_POST['new_title'];
    $content = $_POST['content'];
    $tag = $_POST['tag'];
    $description = $_POST['description'];
    if (!$new_title) $error .= 'タイトルがありません。<br>';
    if (mb_strlen($new_title) > 80) $error .= 'タイトルが長すぎます。<br>';
    if (!$content) $error .= '本文がありません。<br>';
    if (!$tag) $error .= 'タグがありません。<br>';
    if (!$description) $error .= '説明がありません。<br>';
    if (!$error) {
      $stmt = $pdo->prepare("UPDATE post SET title=?,content=?,tags=?,description=? WHERE title=?");
      $stmt->execute(array($new_title,$content,$tag,$description,$old_title));
      // セッション変数を全て解除する
      $_SESSION = array();
      session_destroy();
      header('Location:main.php');
      exit();
    }
  }
  require 'call_edit.php';
?>
