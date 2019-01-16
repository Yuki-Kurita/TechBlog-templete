<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>記事投稿</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<form method="post" action="post.php">
  <div class="post">
    <h2>記事投稿</h2>
    <h3>題名</h3>20文字以内で入力
    <p><input type="text" name="title" value="<?php echo $title ?>" placeholder="ここにタイトルを入力してね"></p>
    <h3>タグ</h3>Atcoder, Python, PHPのどれか1つを記入
    <p><input type="text" name="tag" value="<?php echo $tag ?>" placeholder="ここにタグを入力してね"></p>
    <h3>記事の説明</h3>100文字以内で入力
    <p><input type="text" name="description" value="<?php echo $description ?>" placeholder="ここに説明内容を入力してね"></p>
    <h3>本文</h3>
    <p><textarea name="content" placeholder="ここに本文を入力してね"><?php echo $content ?></textarea></p>
    <p><input name="submit" type="submit" value="投稿"></p>
    <p><?php echo $error ?></p>
  </div>
</form>
<button type="button" onclick="history.back()">戻る</button>
</body>
</html>
