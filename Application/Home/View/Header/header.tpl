<!doctype html>
<html>
<head>
<base href="<?php echo C('BASE_HREF');?>" />
<meta name="viewport" content="width-device-width,intial-scale=1"/>
<link rel="icon" href="__PUBLIC__/images/system/Favicon.ico" mce_href="__PUBLIC__/images/system/Favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/frontstyle.css">
<?php foreach ($allCss as $value) { ?>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/<?php echo $value;?>">
<?php } ?>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.8.3.min.js"></script>
<?php foreach ($allJs as $value){ ?>
	<script type="text/javascript" src="__PUBLIC__/javascript/<?php echo $value;?>"></script>
<?php } ?>
<?php foreach ($allIeScript as $value){ ?>
	<?php echo $value;?>
<?php } ?>
<title><?php echo $head_title;?></title>
<meta name="keywords" content="<?php echo $head_keywords;?>" />
<meta name="description" content="<?php echo $head_description;?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="__PUBLIC__/javascript/common.js"></script>
</head>
<body>
	<div class="container">
		<div  class='header'>
			<div class="content">
				<ul>
					<li><a href="index.php/Home/Index/index.html">首页</a></li>
					<li><a href="index.php/Home/Article/index/type/招聘信息.html">招聘信息</a></li>			
					<li><a href="index.php/Home/Article/index/type/活动动态.html">活动动态</a></li>
					<li><a href="index.php/Home/Article/index/type/知行干货.html">知行干货</a></li>
					<li><a href="index.php/Home/About/index.html">关于我们</a></li>
				</ul>
			</div>
		</div>
