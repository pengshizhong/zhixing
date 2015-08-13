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
					<a href="<?php echo $menu_index;?>"><li>查看文章</li></a>
					<a href="<?php echo $menu_type;?>"><li>分类管理</li></a>
				</ul>
				<div class="uploadbuttondiv">
					<a href="<?php echo ($editButton); ?>"><button class="uploadbutton">写文章</button></a>
				</div>
				<div class="clear"></div>
		</div>
		<div id="article-type">
			<?php foreach ($allType as $value){ ?>
				<div class="type-list">
				<h4><?php echo $value['name'];?></h4>
				<?php foreach($value['child'] as $child){ ?>
					<a href="<?php echo ($child['url']); ?>"><span><?php echo $child['name'];?></span></a>
				<?php } ?>
				</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<?php  foreach( $allArticle as $article ) { ?>
		<div class="article">
			<div class="article-info">
				<ul>
					<li><span>标题：<?php echo $article['title'];?></span></li>
					<li><span>日期：<?php echo $article['date'];?></span></li>
					<li><span>分类：<?php echo $article['type'];?></span></li>
					<li><span>关键字：<?php echo $article['keywords'];?></span></li>
					<li><span>发布状态：<?php echo $article['status_0'];?></span></li>
					<li>
						<a href="<?php echo $article['changeUrl'];?>">
							<span class="function">编辑</span>
						</a>
					</li>
					<li>
						<span class="function delete" deleteUrl="<?php echo $article['deleteUrl'];?>">删除</span>
					</li>
				</ul>
			</div>
			<img class="view-cover" src="/zhixing/Public/<?php echo $article['cover'];?>" />
		</div>
		<?php } ?>
			<div class="boundary"></div>
			<div class="pageTurn">
				<?php echo $pageTurn;?>
			</div>
	</div>
</body>
</html>