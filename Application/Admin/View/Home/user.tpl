
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
		<table id="user" >
			<thread>
				<td>用户</td>
				<td>操作</td>
			</thread>
			<?php foreach( $allUser as $value) { ?>
				<tr>
					<td>{$value['user']}</td>
					<td>
						<a href="{$value['modifyPassword']}"><button class="operate">修改密码</button></a>
						<?php if($value['user']!='admin'){ ?>
						<button class="delete operate" deleteUrl="{$value['deleteUser']}">删除用户</button>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</table>
		<div id="table-function">
			<a href="{$addNewUser}"><button class="operate">增加新用户</button></a>
		</div>
			<div class="clear"></div>		
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
