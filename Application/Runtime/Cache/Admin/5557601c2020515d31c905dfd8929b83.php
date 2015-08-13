<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<base href="<?php echo C('BASE_HREF');?>" />
<link rel="stylesheet" type="text/css" href="/zhixing/Public/css/style.css">
<?php foreach ($allCss as $value) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $value;?>">
<?php } ?>
<script type="text/javascript" src="/zhixing/Public/javascript/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/zhixing/Public/javascript/common.js"></script>
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
	<img src="/zhixing/Public/images/system/logo.png">
	<div id="nav">
		<ul>
			<li>
				<a href="index.php/Admin/Home/home.html">
					<div  class="nav-li" nav="Home">
						<div>
						<img src="/zhixing/Public/images/system/Home.png">
						</div>
						<span>首页</span>
						
					</div>
				</a>
			</li>
			<li>
				<a href="index.php/Admin/Article/index.html">
					<div  class="nav-li" nav="Article">
						<div>
						<img src="/zhixing/Public/images/system/Documents.png">
						</div>
						<span>文章</span>
						
					</div>
				</a>
				</li>
			<li>
				<a href="index.php/Admin/SlideShow/index.html">
					<div   class="nav-li" nav="SlideShow">
						<div>
						<img src="/zhixing/Public/images/system/Image.png">
						</div>
						<span>图片&&下载</span>
						
					</div>
				</a>
				</li>
			<li>
				<a href="index.php/Admin/WeiXin/index.html">
					<div   class="nav-li" nav="WeiXin">
						<div>
						<img src="/zhixing/Public/images/system/Conversation.png">
						</div>
						<span>微信</span>
						
					</div>
				</a>
			</li>
		</ul>
	</div>
</div>

	<div class="container">
	<div class="menu">
				<ul>
					<a href="<?php echo ($imageView); ?>"><li>查看图片</li></a>
					<a href="<?php echo ($downloadFile); ?>"><li>下载管理</li></a>
					<a href="<?php echo ($changeSort); ?>"><li>控制滚动顺序</li></a>
				</ul>
		<div class="uploadbuttondiv">
			<button class="uploadbutton uploadSlideShow">上传图片</button>
			<form action="<?php echo ($action); ?>" method="post" enctype="multipart/form-data" id="uploadfile" >
				<input type="file" class="uploadSlideShow" onchange="uploadFile();" name="slideShow" />
			</form>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<div id="imagecontainer">
		<?php foreach( $allImage as $image ) { ?>
			<div class="image-pictext">
				<img src="/zhixing/Public/<?php echo $image['address'];?>" class="view-cover"  id="slide-adjust" />
				<div class="image-sin">
					<p><strong>标题：<?php echo $image['title'];?></strong></p>
					<p class="image-url">链接:<?php echo $image['url'];?></p>
					<a href="<?php echo $image['changeUrl'];?>">
						<span class="function">修改</span>
					</a>
						<span class="function delete" deleteUrl="<?php echo $image['deleteUrl'];?>">删除</span>
					<?php if(!$image['sort']) { ?>
						<a href="<?php echo $image['addToSlideShowUrl'];?>">
							<span class="function">加入slideshow</span>
						</a>
					<?php } else {?>
						<a href="<?php echo $image['removeFromSlideShowUrl'];?>">
							<span class="function">移出slideshow</span>
						</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>