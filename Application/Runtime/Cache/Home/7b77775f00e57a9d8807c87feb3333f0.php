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
		<div  style="background: black">
		</div>
		<div id="main">
			<div id="aa">
				<div id="logo">
					<img src="/zhixing/Public\images\front-system\logo.png">
				</div>
				<div id="news_box">
					<ul id="slider" style="width: 1680px;position: absolute;left: 0;top: 0;">
					<?php foreach( $slideImage as $slide ){ ?>
						<li>
							<a href="<?php echo ($slide['url']); ?>"><img src="/zhixing/Public\<?php echo ($slide['address']); ?>"></a>
							<h1 id="title" class="text_over"><?php echo ($slide['title']); ?></h1>
						</li>
					<?php } ?>	
					</ul>
					<div id="bg" class="opacity"></div>
					<ul id="tab">
						<li class="on"></li>
						<?php $i=0; for(; $i<count($slideImage)-1 ; $i++){ ?>
							<li class="off"></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div id="ab">
				<a href="<?php echo ($jobMore); ?>"><div id="title"><p>招聘信息</p></div></a>
				<div id="list">
					<ul>
						<?php foreach ($jobNews as $job){ ?>
						<li>
							<h1><?php echo ($job['H1']); ?></h1>
							<h2><?php echo ($job['H2']); ?></h2>
							<a href="<?php echo ($job['url']); ?>"><p><?php echo ($job['title']); ?></p></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div id="ac">
				<div id="image_box">
					<div id="ib_left">
						<a href="<?php echo ($infoNews[0]['url']); ?>"><img src="/zhixing/Public\<?php echo ($infoNews[0]['cover']); ?>"></a>
						<div id="cover"></div>
					</div>
					<div id="ib_right">
						<img src="/zhixing/Public\images\front-system\rt.jpg">
						<a href="<?php echo ($infoNews[0]['url']); ?>"><h1><?php echo ($infoNews[0]['title']); ?></h1></a>
						<img src="/zhixing/Public\images\front-system\rb.jpg">
						<p><?php echo ($infoNews[0]['description']); ?></p>
					</div>
				</div>
				<div id="image_sbox">
					<ul>
						<li>
							<a href="<?php echo ($infoNews[1]['url']); ?>"><img src="/zhixing/Public/<?php echo ($infoNews[1]['cover']); ?>"></a>
							<div class="opacity"></div>
							<h4><?php echo ($infoNews[1]['title']); ?></h4>
							<p class="text_over"><?php echo ($infoNews[1]['description']); ?></p>
						</li>
						<li>
							<a href="<?php echo ($infoNews[2]['url']); ?>"><img src="/zhixing/Public/<?php echo ($infoNews[2]['cover']); ?>"></a>
							<div class="opacity"></div>
							<h4><?php echo ($infoNews[2]['title']); ?></h4>
							<p class="text_over"><?php echo ($infoNews[2]['description']); ?></p>
						</li>
					</ul>
				</div>
				<div id="list">
					<ul>
						<?php $i=3; for(; $i<=6 ; $i++) { ?>
						<li>
							<a href="<?php echo ($infoNews[$i]['url']); ?>"><h2><?php echo ($infoNews[$i]['title']); ?></h2></a>
							<h3><?php echo ($infoNews[$i]['date']); ?></h3>
						</li>
						<?php } ?>
					</ul>
					<div id="more"><a href="<?php echo ($more); ?>">往期回顾>> </a></div>
				</div>
			</div>
			<div id="ab">
				<a href="<?php echo ($activityMore); ?>"><div id="title"><p>活动动态</p></div></a>
				<div id="list">
					<ul>
						<?php foreach ($activityNews as $activity){ ?>
						<li>
							<h1><?php echo ($activity['H1']); ?></h1>
							<h2><?php echo ($activity['H2']); ?></h2>
							<a href="<?php echo ($activity['url']); ?>"><p><?php echo ($activity['title']); ?></p></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		</div>
		<div id="clear"></div>
<script type="text/javascript" src="/zhixing/Public\javascript\1.js"></script>



		<div id="footer">
			<div>
				
			</div>
		</div>
	</div>
</body>
</html>