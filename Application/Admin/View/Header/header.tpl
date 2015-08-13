<!doctype html>
<html>
<head>
<base href="<?php echo C('BASE_HREF');?>" />
<link rel="icon" href="__PUBLIC__/images/system/Favicon.ico" mce_href="__PUBLIC__/images/system/Favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<?php foreach ($allCss as $value) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $value;?>">
<?php } ?>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/common.js"></script>
<?php foreach ($allJs as $value){ ?>
	<script type="text/javascript" src="<?php echo $value;?>"></script>
<?php } ?>
<title><?php echo $head_title;?></title>
<meta name="keywords" content="<?php echo $head_keywords;?>" />
<meta name="description" content="<?php echo $head_description;?>" />
<meta charset="utf-8">
</head>
<body>
<div id="header">
	<img src="__PUBLIC__/images/system/logo.png">
	<div id="nav">
		<ul>
			<li>
				<a href="index.php/Admin/Home/home.html">
					<div  class="nav-li" nav="Home">
						<div>
						<img src="__PUBLIC__/images/system/Home.png">
						</div>
						<span>首页</span>
						
					</div>
				</a>
			</li>
			<li>
				<a href="index.php/Admin/Article/index.html">
					<div  class="nav-li" nav="Article">
						<div>
						<img src="__PUBLIC__/images/system/Documents.png">
						</div>
						<span>文章</span>
						
					</div>
				</a>
				</li>
			<li>
				<a href="index.php/Admin/SlideShow/index.html">
					<div   class="nav-li" nav="SlideShow">
						<div>
						<img src="__PUBLIC__/images/system/Image.png">
						</div>
						<span>图片&&下载</span>
						
					</div>
				</a>
				</li>
			<li>
				<a href="index.php/Admin/WeiXin/index.html">
					<div   class="nav-li" nav="WeiXin">
						<div>
						<img src="__PUBLIC__/images/system/Conversation.png">
						</div>
						<span>微信</span>
						
					</div>
				</a>
			</li>
		</ul>
	</div>
</div>
