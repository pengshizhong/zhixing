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
		<div class="menu" >
				<ul>
					<a href="<?php echo $note;?>"><li>用户便签</li></a>
					<a href="<?php echo $friendLink;?>"><li>友情链接</li></a>
					<a href="<?php echo $user;?>"><li>账号管理</li></a>
					<a href="<?php echo $activity;?>"><li>活动报名</li></a>
				</ul>
				<div class="clear"></div>
		</div>
		<table id="friendLink" action="<?php echo ($action); ?>">
			<thread>
				<td>名称</td>
				<td>链接</td>
				<td>状态</td>
				<td>操作</td>
			</thread>
			<?php foreach( $allFriendLink as $link ){ ?>
				<tr class="linkinfo">
					<td><input name="name" value="<?php echo ($link['name']); ?>" class="edit name"></td>
					<td><input name="link" value="<?php echo ($link['link']); ?>" class="edit link"></td>
					<td>
						<select name="status">
							<option <?php if($link['status']=='启用') echo "selected";?>>启用</option>
							<option <?php if($link['status']=='禁用') echo "selected";?>>禁用</option>
						</select>
					</td>
					<td><button class="operate" onclick="$(this).parent().parent().remove();">移除</button></td>
				</tr>
			<?php } ?>
		</table>
		<div id="table-function">
			<button class="operate" onclick="addRow();">添加</button>
			<button class="operate" id="submit-friendLink">保存</button>
		</div>
			<div class="clear"></div>		
	</div>
</body>
</html>