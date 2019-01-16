<?php
  // DB設定
  define('DSN','mysql:host=YOUR_HOST_NAME;dbname=YOUR_DB_NAME;charset=utf8');
  define('DB_USER','YOUR_USER_NAME');
  define('DB_PASSWORD','YOUR_PASSWORD_NAME');
  $post_no = $error = $name = $content = '';
  if (@$_POST['submit']) {
    $post_no = strip_tags($_POST['post_no']);
    $name = strip_tags($_POST['name']);
    $content = strip_tags($_POST['content']);
    if (!$name) $error .= '名前がありません。<br>';
    if (!$content) $error .= 'コメントがありません。<br>';
    if (!$error) {
      // PDO接続
      try{
        $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
      } catch(PDOException $e){
        exit('データベースに接続できませんでした。'.$e->getMessage());
      }
      $st = $pdo->prepare("INSERT INTO comment(post_no,name,content) VALUES(?,?,?)");
      $st->execute(array($post_no, $name, $content));
      header('Location: index.php');
      exit();
    }
  } else {
    $post_no = strip_tags($_GET['no']);
  }
  require 'call_comment.php';
?>
