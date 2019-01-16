<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>記事編集</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<form method="post" action="edit.php">
  <div class="post">
    <h2>記事編集</h2>
    <h3>題名</h3>20文字以内で入力
    <?php foreach ($posts as $post) {?>
    <p><input type="text" name="new_title" value="<?php echo $post['title'];?>" placeholder="ここにタイトルを入力してね"></p>
    <h3>タグ</h3>Atcoder, Python, PHPのどれか1つを記入
    <p><input type="text" name="tag" value="<?php echo $post['tags'];?>" placeholder="ここにタグを入力してね"></p>
    <h3>記事の説明</h3>100文字以内で入力
    <p><textarea name="description"  placeholder="ここに説明内容を入力してね" class="description"><?php echo $post['description'];?></textarea></p>
    <h3>本文</h3>
    <p><textarea name="content" placeholder="ここに本文を入力してね"><?php echo $post['content'];}?></textarea></p>
    <p><input name="submit" type="submit" value="投稿"></p>
    <p><?php echo $error ?></p>
  </div>
</form>
<button type="button" onclick="history.back()">戻る</button>
</body>
</html>
