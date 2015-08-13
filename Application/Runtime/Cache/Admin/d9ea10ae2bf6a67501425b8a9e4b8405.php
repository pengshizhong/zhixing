<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/zhixing/Public/css/login.css">
<base href="<?php echo C('BASE_HREF');?>" />
<meta name="keywords" content="登陆" />
<meta name="description" content="登陆" />
<script type="text/javascript" src="/zhixing/Public/javascript/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/zhixing/Public/javascript/common.js"></script>
<meta charset="utf-8">
<title>登陆</title>
</head>
<body>
<div id="login-logo">
	<img src="/zhixing/Public/images/system/logo.png">
</div>
<div id="login-login">
	<div id="login-login-biaodan">
	<form method="post" action="<?php echo $action;?>">
	<?php if($url) {?>
		<input type="hidden" value="<?php echo $url;?>" name='url'>
	<?php } ?>
	<input name="username" class='people edit clearaway' value="账号" id='username'  />
	<!-- <img src="/zhixing/Public/images/system/People.png" /> -->
	<input name="password" class='lock edit' value="密码"  />
	<button type="button" class="uploadbutton checkinput">登陆</button>
</form>
</div>
</div>
</body>
</html>