<html>
<head>
<meta charset="utf-8">
<title>Blog</title>
<link rel="stylesheet" type="text/css" href="/css/blog.css">
</head>
<body>
<form id="loginForm" name="loginForm" action="" method="POST">
<fieldset>
    <legend>ログインフォーム</legend>
    <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
    <label for="username">ユーザー名</label>
    <input type="text" id="username" name="username" placeholder="ユーザー名を入力">
    <br>
    <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
    <br>
    <input type="submit" id="login" name="login" value="ログイン">
</fieldset>
</form>
</html>
