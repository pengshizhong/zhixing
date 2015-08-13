<include file="./Application/Admin/View/Header/header.tpl"  />
	<div class="container">
			<div class="menu">
						<ul>
								<a href="{$special}"><li>特殊回复</li></a>
								<a href="{$autoRespon}"><li>自动回复</li></a>
								<a href="{$checkMessage}"><li>消息记录</li></a>
						</ul>
					<div class="clear"></div>
			</div>
			<?php foreach ($allRespon as $key => $value) { ?>
				<div class="editAreaRight specialrespon">
					<h3>{$value['name']}</h3>
					<form method="post" action="{$value['action']}">
						<input type="hidden" name="name" value="{$value['name']}">
						<textarea class="content" name="content" >{$value['content']}</textarea>
						<input class="operate" type="submit" />
					</form>
				</div>
			<?php } ?>
			<!-- <div class="editAreaRight specialrespon">
				<h3>无正确响应信息时回复</h3>
				<form>
					<textarea class="content" name=""></textarea>
					<input class="operate" type="submit" />
				</form>
			</div> -->


		<div class="clear"></div>
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
