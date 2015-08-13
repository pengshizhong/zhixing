<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
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
		<div class="menu" >
				<ul>
					<a href="<?php echo $note;?>"><li>用户便签</li></a>
					<a href="<?php echo $friendLink;?>"><li>友情链接</li></a>
					<a href="<?php echo $user;?>"><li>账号管理</li></a>
					<a href="<?php echo $activity;?>"><li>活动报名</li></a>
				</ul>
				<div class="clear"></div>
		</div>
		<div>
			<?php foreach( $allNotes as $note ) { ?>
				<div class="note">
					<div class="note-content">
						<span class="note-title"><?php echo ($note['content']); ?></span>
						<span class="note-date"><?php echo ($note['date']); ?></span>
					</div>
					<div class="note-auther">
						<strong>操作者:</strong>
						<span><?php echo ($note['auther']); ?></span>
					</div>
				</div>
			<?php } ?>
		</div>
			<div class="boundary"></div>
			<div class="pageTurn">
				<?php echo $pageTurn;?>
			</div>
	</div>
</body>
</html>