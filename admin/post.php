<?php
  // DB設定

define('DSN','mysql:host=YOURS;dbname=YOURDATABASE;charset=utf8');
define('DB_USER','YOUR_USER_NAME');
define('DB_PASSWORD','YOUR_PASSWORD');

  $error = $title = $content = '';
  if (@$_POST['submit']) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $tag = $_POST['tag'];
    $description = $_POST['description'];
    if (!$title) $error .= 'タイトルがありません。<br>';
    if (mb_strlen($title) > 80) $error .= 'タイトルが長すぎます。<br>';
    if (!$content) $error .= '本文がありません。<br>';
    if (!$tag) $error .= 'タグがありません。<br>';
    if (!$description) $error .= '説明がありません。<br>';
    if (!$error) {
      // PDO接続
      try{
        $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
      } catch(PDOException $e){
        exit('データベースに接続できませんでした。'.$e->getMessage());
      }
      $stmt = $pdo->prepare("INSERT INTO post(title,content,tags,description) VALUES(?,?,?,?)");
      $stmt->execute(array($title,$content,$tag,$description));
      header('Location:main.php');
      exit();
    }
  }
  require 'call_post.php';
?>
