
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
			<h2>修改密码</h2>
			<?php if(!$isAdmin){ ?>
			<h4>请输入旧密码</h4><input class="edit" name="oldPassword" chinaName="旧密码" type="password">
			<?php } ?>
			<h4>请输入新密码</h4><input class="edit" name="newPassword" chinaName="新密码"id="firstPassword" type="password">
			<h4>请再次输入</h4><input class="edit" id="secondPassword" chinaName="新密码" type="password">
		</form>
		</div>
		<div id="table-function">
			<button class="operate" onclick="modifyPassword();">保存</button>
		</div>
			<div class="clear"></div>		
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
