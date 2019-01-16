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
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=desert"></script>
</head>
<body>
<!-- header -->
<div class="headcontainer">
  <div class="heading">
    <div class="head-left"><a href="./index.php">RUNRUN-BLOG</a>
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
      <input type="hidden" name="tag" value="Atcorder">
      <a href="javascript:formtop1.submit()">Atcorder</a>
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
    <!-- 記事の内容 -->
    <div class="col-md-9">
      <div class="post-frame">
    <?php foreach($posts as $post){?>
      <div class="time"><?php echo $post['time'];?></div>
      <div class="title"><?php echo $post['title'];?></div>
      <div class="tag">
        <form method="post" name="formtag" action="tag.php">
        <input type="hidden" name="tag" value="<?php echo $post['tags'];?>">
	       <a href="javascript:formtag.submit()"><i class="fa fa-chevron-right"></i><?php echo $post['tags'];?></a>
       </form>
       </div>
         <!-- ここに記事の内容がくる -->
      <div class="content">
        <?php echo $post['content'];}?>
      </div>
    </div>
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
      <input type="hidden" name="tag" value="Atcorder">
      <li ><a href="javascript:formright1.submit()">Atcorder</a></li>
      </form>
      <form method="post" name="formright2" action="tag.php">
      <input type="hidden" name="tag" value="Python">
      <li ><a href="javascript:formright2.submit()">Python</a></li>
    </form>
      <form method="post" name="formright3" action="tag.php">
      <input type="hidden" name="tag" value="PHP">
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
  <input type="hidden" name="tag" value="Atcorder">
  <div class="f-item"><a href="javascript:formfooter1.submit()">Atcorder</a></div>
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
