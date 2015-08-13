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
								<a href="<?php echo ($allComment); ?>"><li>全部评论</li></a>
								<a href="<?php echo ($passedComment); ?>"><li>已通过</li></a>
								<a href="<?php echo ($waitingAuditComment); ?>"><li>待通过</li></a>
						</ul>
					<div class="clear"></div>
			</div>
			<table id="commenttable" rules="rows">
				<thread>
					<td>作者</td>
					<td>内容</td>
					<td>回应给</td>
					<td>当前状态</td>
					<td>操作</td>
				</thread>
				<?php foreach($list as $value) { ?>
					<tr>
						<td><?php echo ($value['auther']); ?></td>
						<td><?php echo ($value['content']); ?></td>
						<td><?php echo ($value['article']); ?></td>
						<td><?php echo ($value['status']); ?></td>
						<td>
							<a href="<?php echo ($value['changeStatusUrl']); ?>"><button class="operate">修改发布状态</button>
							<a href="<?php echo ($value['deleteUrl']); ?>"><button class="operate">删除</button>
						</td>
					</tr>
				<?php } ?>
			</table>
		
		
		<div class="clear"></div>
		<div class="boundary"></div>
			<div class="pageTurn">
				<?php echo $pageTurn;?>
			</div>
	</div>
</body>
</html>