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
</head>
<body>
	<div class="container" id="fullpage">
		<div class="section page1 ">
			
			<a href="index.php/Home/Index/index.html"><img src="__PUBLIC__/images/picture/test/zhixing.png"></a>
			<div class="contact">
				<p>关注我们</p>
				<ul>
					<li>微博：</li>
					<li><a href="http://weibo.com/u/2687087315">@华农知行职业中心</a></li>
				</ul>
				<ul>
					<li>微信公众号：</li>
					<li>华农知行职业指导中心</li>
				</ul>
			</div>
		</div>
		<div class="section page2">
			<h2>知行职业指导与服务中心</h2>
			<div class="intro">
				<p>成立于2011年，是信息学院软件学院党委直接领导下唯一的职业就业服务型组织。</p>
				<p>知行职业指导与服务中心下设主任团以及<b>外联部、秘书部、策划部、信息部</b>四个部门。</p>
				<p>负责学院的就业服务，协助老师完成毕业生档案整理工作，承办学院众多的企业宣讲会、毕业生供需见面会、招聘会以及各种名人讲座，还主办大型的特色比赛，如职业素养挑战赛，职业规划大赛等。</p>
				<p>知行人秉承<b>热诚、担当、精益求精</b>知行文化，负责学院一系列的就业工作和职业指导活动，始终站在就业第一线，在学院里架起一座沟通毕业生与企事业单位的桥梁，为企事业单位提供最便利的服务，帮助我校毕业生顺利走上岗位，深受老师同学欢迎。</p>
			</div>
			<ul class="intro_pic">
				<li><img src="__PUBLIC__/images/picture/test/1.jpg"></li>
				<li><img src="__PUBLIC__/images/picture/test/8.jpg"></li>
				<li><img src="__PUBLIC__/images/picture/test/7.jpg"></li>
				<li><img src="__PUBLIC__/images/picture/test/5.jpg"></li>
			</ul>
		</div>
		<div class="section lastPage">
			<div class="intro">
				<p><b>如果你希望</b>在大学提前了解职场，提前接触企业代表，提前专业就业前景，那么</p>
				<p><b>知行必定是你最佳的选择！</b></p>
				<p><b>在知行</b>，你不仅可以和学院老师以及大四师兄面对面了解就业情况，不仅可以直接接触企业代表，了解HR，同时，还可以在工作中提高或者发挥你的领导能力、社交能力、策划能力、技术水平、文案写作功底，更可以在工作中为你以后就业拓宽人脉，积累就业经验！</p>
			</div>
			<div class="contact">
				<p>关注我们</p>
				<ul>
					<li>微博：</li>
					<li><a href="http://weibo.com/u/2687087315">@华农知行职业中心</a></li>
				</ul>
				<ul>
					<li>微信公众号：</li>
					<li>华农知行职业指导中心</li>
				</ul>
				<ul>
					<li>官方博客：</li>
					<li><a href="http://blog.sina.com.cn/zhixingzhongxin">知行中心</a></li>
				</ul>
			</div>
			
		</div>
	</div>
</body>
</html>