<?php
  session_start();
  // DB設定
  //  記事の番号を取得
  define('DSN','mysql:host=YOURS;dbname=YOURDATABASE;charset=utf8');
  define('DB_USER','YOUR_USER_NAME');
  define('DB_PASSWORD','YOUR_PASSWORD');
  $_SESSION['id'] = $_POST['id'];
  $post_no =  $_SESSION['id'];
  // PDO接続
  try{
    $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
  } catch(PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  // 番号に該当する記事を取得
  $st = $pdo->query("SELECT * FROM post WHERE no = $post_no");
  // 全てのレコードを配列として返す
  $posts = $st->fetchAll();

  $st2 = $pdo->query("SELECT * FROM post LIMIT 5");
  $new_posts = $st2->fetchAll();
  // 記事とコメント一覧を表示するプログラムは分離する
  require 'call_view.php';
  ?>
