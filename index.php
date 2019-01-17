<?php
  session_start();
  define('DSN','mysql:host=YOUR_HOST_NAME;dbname=YOUR_DB_NAME;charset=utf8');
  define('DB_USER','USER_NAME');
  define('DB_PASSWORD','YOUR_PASSWORD');
  // PDO接続
  try{
    $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
  } catch(PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  // 新しい順番で記事を取得
  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  // 全てのレコードを配列として返す
  $posts = $st->fetchAll();
  // // 全記事を返し、記事に対するコメントを取得
  // for ($i = 0; $i < count($posts); $i++) {
  //   $st = $pdo->query("SELECT * FROM comment WHERE post_no={$posts[$i]['no']} ORDER BY no DESC");
  //   // posts配列に新しい要素commentsを作って、そこにコメント一覧を配置している
  //   $posts[$i]['comments'] = $st->fetchAll();
  // }
  // 記事とコメント一覧を表示するプログラムは分離する
  require 'call_index.php';
  ?>
