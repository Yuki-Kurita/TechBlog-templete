<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RUNRUN-BLOG</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/blog.css">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/home.js"></script>
</head>
<body>
<!-- header -->
<div class="headcontainer">
  <div class="heading">
    <div class="head-left"><a href="index.php">RUNRUN-blog</a>
    <i class="fas fa-blog"></i></div>
    <div class="head-right">
    <i class="fab fa-github"></i>
    <i class="fab fa-twitter-square"></i>
  </div>
  </div>
</div>
<!-- ナビゲーションバー -->

<nav class="circle">
  <div class="container">
    <div class="item">
      <a href="/">New Post</a>
    </div>
    <div class="item">
      <form method="post" name="formtop1" action="tag.php">
      <input type="hidden" name="tag" value="Atcoder">
      <a href="javascript:formtop1.submit()">Atcoder</a>
      </form>
    </div>
    <div class="item">
      <form method="post" name="formtop2" action="tag.php">
      <input type="hidden" name="tag" value="Python">
      <a href="javascript:formtop2.submit()">Python</a>
    </form>
  </div>
  <div class="item">
      <form method="post" name="formtop3" action="tag.php">
      <input type="hidden" name="tag" value="PHP">
      <a href="javascript:formtop3.submit()">PHP</a>
    </form>
  </div>
  </div>
</nav>

<!-- 記事一覧 -->

<div class="post">
<div class="container-fluid">
  <div class="row">
    <!-- 記事のボックスを作る -->
    <div class="col-md-9">
      <?php foreach($posts as $post){ ?>
      <div class="box">
        <span class="box-title"><?php echo $post['tags'];?></span>

        <form method="post" name="formtitle<?php echo $post['no'];?>" action="view.php">
        <input type="hidden" name="id" value="<?php echo $post['no'];?>">
        <p class="post-title"><a href="javascript:formtitle<?php echo $new_post['no']?>.submit()"><?php echo $post['title'];?></a></p>
      </form>
        <p class="post-time"><?php echo $post['time'];?></p>
        <p class="post-content"><?php echo $post['description'];?></p>
        <form action = "./view.php" method = "post" name="formbtn<?php echo $post['no'];?>">
        <input type = "hidden" name ="id" value="<?php echo $post['no'];?>">
        <a href="javascript:formbtn<?php echo $new_post['no']?>.submit()" class="square_btn">Read more</a>
      </form>
      </div>
    <?php }?>
    </div>

<!-- 右側 -->
<div class="col-md-3">
  <div class="new-post"><ul>
    <?php foreach($new_posts as $new_post){ ?>
    <form method="post" name="form<?php echo $new_post['no'];?>" action="view.php">
    <input type="hidden" name="id" value="<?php echo $new_post['no'];?>">
    <li><a href="javascript:form<?php echo $new_post['no']?>.submit()"><?php echo $new_post['title'];?></a></li>
    </form>
  <?php }?>
    </ul></div>

    <div class="category"><ul>
      <form method="post" name="formright1" action="tag.php">
      <input type="hidden" name="tag" value="Atcoder">
      <li ><a href="javascript:formright1.submit()">Atcoder</a></li>
      </form>
      <form method="post" name="formright2" action="tag.php">
      <input type="hidden" name="tag" value="python">
      <li ><a href="javascript:formright2.submit()">Python</a></li>
    </form>
      <form method="post" name="formright3" action="tag.php">
      <input type="hidden" name="tag" value="php">
      <li ><a href="javascript:formright3.submit()">PHP</a></li>
    </form>
  </ul></div>
  </div>
  </div>
</div>
</div>

</body>
<div class="footer">
  <div class="f-item"><a href="index.php">New Post</a></div>
  <form method="post" name="formfooter1" action="tag.php">
  <input type="hidden" name="tag" value="Atcoder">
  <div class="f-item"><a href="javascript:formfooter1.submit()">Atcoder</a></div>
  </form>
  <form method="post" name="formfooter2" action="tag.php">
  <input type="hidden" name="tag" value="Python">
  <div class="f-item"><a href="javascript:formfooter2.submit()">Python</a></div>
</form>
  <form method="post" name="formfooter3" action="tag.php">
  <input type="hidden" name="tag" value="PHP">
  <div class="f-item"><a href="javascript:formfooter3.submit()">PHP</a></div>
</form>
  <div class="f-item">  <i class="fab fa-github"></i></div>
  <div class="f-item">  <i class="fab fa-twitter-square"></i></div>
</div>
</html>
