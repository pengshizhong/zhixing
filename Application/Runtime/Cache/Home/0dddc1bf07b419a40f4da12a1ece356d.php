<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<base href="<?php echo C('BASE_HREF');?>" />
<link rel="icon" href="/zhixing/Public/images/system/Favicon.ico" mce_href="/zhixing/Public/images/system/Favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="/zhixing/Public/css/frontstyle.css">
<?php foreach ($allCss as $value) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $value;?>">
<?php } ?>
<script type="text/javascript" src="/zhixing/Public/javascript/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/zhixing/Public/javascript/common.js"></script>
<?php foreach ($allJs as $value){ ?>
	<script type="text/javascript" src="/zhixing/Public/javascript/<?php echo $value;?>"></script>
<?php } ?>
<title><?php echo $head_title;?></title>
<meta name="keywords" content="<?php echo $head_keywords;?>" />
<meta name="description" content="<?php echo $head_description;?>" />
<meta charset="utf-8">
</head>
<body>
		<div  style="background: black">
			<div id='header'>
				<div id="index_item"><a href="index.php/Home/Index/index.html">首页</a></div>
				<ul>
					<li><a href="index.php/Home/Article/index/type/招聘信息.html">招聘信息</a></li>			
					<li><a href="index.php/Home/Article/index/type/活动动态.html">活动动态</a></li>
					<li><a href="index.php/Home/Article/index/type/知行干货.html">知行干货</a></li>
					<li><a href="index.php/Home/About/index.html">关于我们</a></li>
				</ul>
			</div>
		</div>



	<div id="container">
		<div id="main">
			<div id="ca">
				
				<?php if($navType) {?>
					<a href="<?php echo $navTypeUrl;?>"><div id="father" class="text_over"><?php echo $navType; ?></div></a>
					<a href="<?php echo $contentTypeUrl;?>"><div id="child" class="text_over"><?php echo $content['type']; ?></div></a>
				<?php } else {?>
					<a href=""><div id="father" class="text_over"><?php echo $content['type']; ?></div></a>
				<?php }?>
			</div>
			<div id="cb">
				<div id="top">
					<h1><?php echo ($content['title']); ?></h1>
					<h2><?php echo ($content['date']); ?></h2>
				</div>
				<div id="article">
					<?php echo ($content['article']); ?>
				</div>
			</div>
		</div>
	</div>


<!-- 		<div id="footer">
			<div>
				
			</div>
		</div>
	</div>
</body>
</html> -->