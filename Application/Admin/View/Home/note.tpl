
<include file="./Application/Admin/View/Header/header.tpl"  />
	<div class="container">
		<div class="menu" >
				<ul>
					<a href="<?php echo $note;?>"><li>操作记录</li></a>
					<a href="<?php echo $friendLink;?>"><li>友情链接</li></a>
					<a href="<?php echo $user;?>"><li>账号管理</li></a>
	
				</ul>
				<div class="clear"></div>
		</div>
		<div>
			<?php foreach( $allNotes as $note ) { ?>
				<div class="note">
					<div class="note-content">
						<span class="note-title">{$note['content']}</span>
						<span class="note-date">{$note['date']}</span>
					</div>
					<div class="note-auther">
						<strong>操作者:</strong>
						<span>{$note['auther']}</span>
					</div>
				</div>
			<?php } ?>
		</div>
			<div class="boundary"></div>
			<div class="pageTurn">
				<?php echo $pageTurn;?>

			</div>
			<div class="clear"></div>
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
