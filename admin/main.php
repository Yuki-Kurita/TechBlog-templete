<?php
session_start();
// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: logout.php");
    exit;
}
// 項目が選択されなかった時の処理
if ($_SESSION["message"]!=null){
  echo $_SESSION["message"];
  $_SESSION["message"] = "";
}

// DB設定
define('DSN','mysql:host=YOURS;dbname=YOURDATABASE;charset=utf8');
define('DB_USER','YOUR_USER_NAME');
define('DB_PASSWORD','YOUR_PASSWORD');
try{
  $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
} catch(PDOException $e){
  exit('データベースに接続できませんでした。'.$e->getMessage());
}
// 新しい順番で記事を取得
$st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
// 全てのレコードを配列として返す
$posts = $st->fetchAll();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/admin.css">
        <script type="text/javascript">
        function goedit(){
            document.getElementById('form').action="./edit.php";
        }
        </script>
        <title>メイン</title>
    </head>
    <body>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p>
        <a href="post.php">記事を投稿する</a>
        <a href="admin_user_create.php">管理ユーザーを追加する</a>
        <a href="logout.php">ログアウト</a>
        <h3>記事一覧</h3>
        <form id="form" name="form" method="post" action="destroy.php">
        <!-- 記事の一覧をチェックボックスで表示して、編集・削除できるようにする -->
        <?php foreach($posts as $post){
          $title = $post['title'];
          print <<<__HTML__
          <p><input type="checkbox" name="title[]" value="$title">$title
__HTML__;
        }?>
      <br>
      <input type="submit" value="編集する" onClick="goedit();">
      <br>
      <input type="submit" value="削除する" onClick="location.href='destroy.php'">
      </form>
    </body>
</html>
