
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
		<table id="friendLink" action="{$action}">
			<thread>
				<td>名称</td>
				<td>链接</td>
				<td>状态</td>
				<td>操作</td>
			</thread>
			<?php foreach( $allFriendLink as $link ){ ?>
				<tr class="linkinfo">
					<td><input name="name" value="{$link['name']}" class="edit name"></td>
					<td><input name="link" value="{$link['link']}" class="edit link"></td>
					<td>
						<select name="status">
							<option <?php if($link['status']=='启用') echo "selected";?>>启用</option>
							<option <?php if($link['status']=='禁用') echo "selected";?>>禁用</option>
						</select>
					</td>
					<td><button class="operate" onclick="$(this).parent().parent().remove();">移除</button></td>
				</tr>
			<?php } ?>
		</table>
		<div id="table-function">
			<button class="operate" onclick="addRow();">添加</button>
			<button class="operate" id="submit-friendLink">保存</button>
		</div>
			<div class="clear"></div>		
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
