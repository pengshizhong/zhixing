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
					<a href="<?php echo $menu_edit;?>"><li>新增文章</li></a>
					<a href="<?php echo $menu_type;?>"><li>分类管理</li></a>
				</ul>
			
		<div class="clear"></div> 
		</div>
		<form method="post" action="<?php echo $action;?>" enctype="multipart/form-data"><!-- 表单开始 -->
		<div id="editArea">
			<div class="left">
				<div>
					<h3>标题</h3>
					<input name="title" class="edit" value="<?php if($article) echo $article['title'];?>" >
					<h3>关键字</h3>
					<input name="keywords" class="edit" value="<?php if($article) echo $article['keywords'];?>">
				</div>
			<!-- 富文本编辑器开始 -->
			
				<textarea name="article" id="myEditor" style="height:300px;"><?php if($article) echo $article['article'];?></textarea>
				<script type="text/javascript" src="Public/ueditor/ueditor.config.js"></script>
				<script type="text/javascript" src="Public/ueditor/ueditor.all.min.js"></script>
				<script type="text/javascript" src="Public/ueditor/lang/zh-cn/zh-cn.js"></script>
				<script type="text/javascript">
				    UE.getEditor('myEditor');
				</script>
			<!-- 富文本编辑器结束 -->
			<div class="clear"></div>
			</div>
			<div class="right">
				<div class="editAreaRight">
					<h3>发布状态</h3>
					<p>日期：<?php if($article) echo $article['date']; else echo date("Y-m-d")?></p>

					<p>
						状态

						<select name="status_0" >
							<?php if($article) { ?>
								<option <?php if($article['status_0']=="0") echo "selected";?>>
									待审核
								</option>
								<option <?php if($article['status_0']=="1") echo "selected";?>>
									已发布
								</option>
							<?php } else { ?>
								<option selected>待审核</option>
								<option>已发布</option>
							<?php } ?>	
						</select>
					</p>
				</div>
				<div class="editAreaRight">
					<h3>图片上传</h3>
					<p>
						<input type="file" name="cover">
					</p>
					<?php if($article&&$article['cover']!='') { ?>
					<p>当前的封面图</p>
					<img class="view-cover" src="/zhixing/Public/<?php echo $article['cover'];?>" />
					<?php } ?>
				</div>
				<div class="editAreaRight">
					<h3>分类目录</h3>
					<p>
						<select name="type">
							<?php  foreach( $allType as $type) {?>
							<option <?php if($article&&$article['type']==$type['name']) echo "selected";?>><?php echo $type['name']; ?></option>
							<?php } ?>
						</select>
					</p>
				</div>
			</div>
			<div class="uploadbuttondiv">
			<button type="button" class="uploadbutton checkinput">
				<?php if($article) echo "确认修改"; else echo "保存上传";?>
			</button>
			</div>
			
			<div class="clear"></div>
			</form><!-- 表单结束 -->
		</div>



	</div>
</body>
</html>