<?php
// セッション開始
session_start();
require 'password.php';

define('DSN','mysql:host=YOURS;dbname=YOURDATABASE;charset=utf8');
define('DB_USER','YOUR_USER_NAME');
define('DB_PASSWORD','YOUR_PASSWORD');
// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザ名の入力チェック
    if (empty($_POST["username"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザー名が未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        // 入力したユーザ名を格納
        $username = $_POST["username"];
        try {
            // 入力されたusernameと一致する行を取得
            $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
            $stmt = $pdo->prepare("SELECT * FROM administrator WHERE name = ?");
            $stmt->execute(array($username));
            $password = $_POST["password"];
            // 指定した行をリストにして取得
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // パスワードが一致するか確認
                if (password_verify($password, $row['password'])) {
                    session_regenerate_id(true);
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["NAME"] = $row['name'];
                    header("Location: main.php");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗
                    $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
                }
              }
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            //$errorMessage = $sql;
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
        }
    }
}

require "login_form.php";
?>
