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
				<a href="index.php/Admin/Comment/index.html">
					<div   class="nav-li" nav="Comment">
						<div>
						<img src="/zhixing/Public/images/system/Conversation.png">
						</div>
						<span>评论</span>
						
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
		<div class="clear"></div>
		</div>
		<div class="uploadbuttondiv">
			<button class="uploadbutton" id="saveSettings">保存设置</button>
			<div class="clear"></div>
		</div>
	<!-- 	<div class="shunxu-pic">项目开始
			<div class="bianhao">
				1
			</div>
			<div class="shunxu-content">
				<img src="" />
				<strong>图片标题</strong>
				<p>所属文章的名字是我</p>
				<strong>19941218</strong>
			</div>
			<div class="gongneng">
				<span>上移</span>
				<span>下移</span>
				<span>移除</span>
			</div>
			<div class="clear"></div>
		</div>项目结束 -->
		<?php foreach( $allSlideShow as $slideShow){ ?>
			<div class="shunxu-pic"><!-- 项目开始 -->
				<div class="bianhao">
					<span class='sort' imageId="<?php echo $slideShow['id'];?>"><?php echo $slideShow['sort'];?></span>
				</div>
				<div class="shunxu-content">
					<img src="/zhixing/Public/<?php echo $slideShow['address'];?>" />
					<strong>标题：<?php echo $slideShow['title'];?></strong>
					<p>
						<a class="slideshowlink" href="<?php echo $slideShow['url'];?>">
						链接：<?php echo $slideShow['url'];?>
						</a>
					</p>
				</div>
				<div class="gongneng">
					<span class='function moveUp'>上移</span>
					<span class='function moveDown'>下移</span>
					<a href="<?php echo $slideShow['removeUrl']; ?>">
						<span class='function'>移除</span>
					</a>
				</div>
				<div class="clear"></div>
			</div><!-- 项目结束 -->
		<?php  }?>
		<div class="clear"></div>
	</div>
</body>
</html>