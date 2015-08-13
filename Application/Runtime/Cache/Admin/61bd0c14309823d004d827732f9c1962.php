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
					<a href="<?php echo $menu_index;?>"><li>查看文章</li></a>
					<a href="<?php echo $menu_type;?>"><li>分类管理</li></a>
				</ul>
		<div class="clear"></div>
		</div>
		<div class="left">
			<table id="typetable" rules="rows">
				<thread>
					<td>名称</td>
					<td>文章数</td>
					<td>父级分类</td>
					<td>操作</td>
				</thread>
				<?php foreach ($allType as $type) { ?>
					<tr>
					<td><?php echo $type['name'];?></td>
					<td><?php echo $type['articleNum'];?></td>
					<td><?php echo $type['parent'];?></td>
					<?php if($type['name']!="未分类"&&$type['name']!="招聘信息"&&$type['name']!="活动动态"&&$type['name']!="知行干货") {?>
					<td>
						<a href="<?php echo $type['changeUrl'];?>">
						<span class="function">修改</span>
						</a>
						<span class="function delete" deleteUrl="<?php echo $type['deleteUrl'];?>">删除</span>
					</td>
					<?php } else {?>
					<td></td>
					<?php } ?>
				</tr>
			<?php	}?>
			</table>
		</div>
		<div class="right" id="type-input">
			<form method="post" action="<?php echo ($action); ?>">
				<h2><?php if(isset($changeType)) echo "修改指定分类:" . $changeType[0]['name']; else echo "添加新的分类";?></h2>
				<?php if (isset($changeType)) { ?>
					<input name="oldName" type="hidden" value="<?php echo $changeType[0]['name'] ;?>">
				<?php }?>
				<input class="edit" name="name" <?php if(isset($changeType)) { echo "value='" . $changeType[0]['name'] . "'"; }?>/>
				<h2>父级</h2>
				<select class="edit" name="parent">
				<?php if (isset($changeType)&&$changeType[0]['parent']!='') { ?>
					<option selected><?php echo $changeType[0]['parent'];?></option>
					
				<?php } ?>
					<?php  foreach ($allParent as $type) { if($type!=$changeType[0]['parent']){ ?>
					<option><?php  echo $type; ?></option>
					<?php }} ?>
				</select>
				<h2>描述</h2>
				<textarea name="description"><?php if(isset($changeType)){echo $changeType[0]['description'];}?></textarea>
				<div class="uploadbuttondiv">
					<button  type="button" class="uploadbutton checkinput" style="float:none;"><?php if (isset($changeType)) { echo "确认修改";} else {echo "保存";}?></button>
				</div>
			</form>
		</div>
		<div class="clear"></div>
		
	</div>
</body>
</html>