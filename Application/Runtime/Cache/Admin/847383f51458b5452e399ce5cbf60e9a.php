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
			<div class="uploadbuttondiv">
				<button class="uploadbutton uploadSlideShow">上传下载文件</button>
				<form action="<?php echo ($action); ?>" method="post" enctype="multipart/form-data" id="uploadfile">
					<input type="file" class="uploadSlideShow"  onchange="uploadFile();" name="downloadfile" />
				</form>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

			<table id="commenttable" rules="rows">
				<thread>
					<td>文件名</td>
					<td>下载链接</td>
					<td>上传日期</td>
					<td>操作</td>
				</thread>
				<?php foreach($allDownloadFile as $value) { ?>
					<tr>
						<td><?php echo ($value['name']); ?></td>
						<td>/zhixing/Public/<?php echo ($value['path']); ?></td>
						<td><?php echo ($value['date']); ?></td>
						<td>
							<!-- <a href="<?php echo ($value['changeUrl']); ?>"> -->
								<button class="operate changedownload" action="<?php echo ($value['changeUrl']); ?>">修改</button>
							    <button class="operate delete" deleteUrl="<?php echo ($value['deleteUrl']); ?>">删除</button>
						</td>
					</tr>
				<?php } ?>
			</table>
			<div id="submit">
				<form id="change-info" method="post">
					<h2 id="title">请输入新的名称</h2>
					<input  name="name" class="edit"  />
					<button type="button" class="opreate checkinput">提交</button>
					<button type="button" class="opreate" id="cancel">取消</button>
				</form>
			</div>
	</div>
</body>
</html>