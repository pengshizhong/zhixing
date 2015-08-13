<!DOCTYPE html>
<html>
<head>
<base href="<?php echo C('BASE_HREF');?>" />
<link rel="icon" href="__PUBLIC__/images/system/Favicon.ico" mce_href="__PUBLIC__/images/system/Favicon.ico" type="image/x-icon">
<?php foreach ($allCss as $value) { ?>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/{$value}">
<?php } ?>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-2.1.1.min.js"></script>

<?php foreach ($allJs as $value){ ?>
	<script type="text/javascript" src="__PUBLIC__/javascript/{$value}"></script>
<?php } ?>
<title><?php echo $head_title;?></title>
<meta name="keywords" content="<?php echo $head_keywords;?>" />
<meta name="description" content="<?php echo $head_description;?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
</head>
<body>
<h1 class="weixin-title">{$article['title']}</h1>
<p class="weixin-date">{$article['date']}</p>
<div class="weixin-content">
{$article['article']}
</div>
</body>
</html>
