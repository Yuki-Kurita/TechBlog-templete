<?php
  session_start();
  // DB設定
  define('DSN','mysql:host=mysql1.php.xdomain.ne.jp;dbname=otter3_sites;charset=utf8');
  define('DB_USER','otter3_u');
  define('DB_PASSWORD','28kialtoma');
  $tag = $_POST['tag'];
  // PDO接続
  try{
    $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
  } catch(PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  // 新しい順番で記事を取得
  $st = $pdo->query("SELECT * FROM post WHERE tags = '$tag'");
  // 全てのレコードを配列として返す
  $posts = $st->fetchAll();
  $st2 = $pdo->query("SELECT * FROM post LIMIT 5");
  $new_posts = $st2->fetchAll();

  // 記事とコメント一覧を表示するプログラムは分離する
  require 'call_index.php';
  ?>
