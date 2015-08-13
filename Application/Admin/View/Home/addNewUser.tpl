
<include file="./Application/Admin/View/Header/header.tpl"  />
	<div class="container">
		<div class="menu" >
				<ul>
					<a href="<?php echo $note;?>"><li>用户便签</li></a>
					<a href="<?php echo $friendLink;?>"><li>友情链接</li></a>
					<a href="<?php echo $user;?>"><li>账号管理</li></a>

				</ul>
				<div class="clear"></div>
		</div>
		<div class="modify-password">
		<form method="post" action="{$action}">
			<h2>增加新用户</h2>
			<h4>请输入用户名</h4><input class="edit" name="user" chinaName="用户名" >
			<h4>请输入密码</h4><input class="edit" name="newPassword" chinaName="密码" id="firstPassword" type="password">
			<h4>请再次输入</h4><input class="edit" id="secondPassword" chinaName="密码" type="password">
		</form>
		</div>
		<div id="table-function">
			<button class="operate" onclick="modifyPassword();">保存</button>
		</div>
			<div class="clear"></div>		
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
