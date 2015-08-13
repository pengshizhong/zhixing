
<include file="./Application/Admin/View/Header/header.tpl"  />
	<div class="container">
		<div class="menu" id="article-type">
				<ul>
					<a href="<?php echo $note;?>"><li>用户便签</li></a>
					<a href="<?php echo $friendLink;?>"><li>友情链接</li></a>
					<a href="<?php echo $user;?>"><li>账号管理</li></a>
		
				</ul>
				<div class="clear"></div>
		</div>
			<div class="boundary"></div>
			<div class="pageTurn">
				<?php echo $pageTurn;?>
			</div>
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
