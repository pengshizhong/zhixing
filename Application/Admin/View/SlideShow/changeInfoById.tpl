<include file="./Application/Admin/View/Header/header.tpl" />
	<div class="container">
		<form method="post" action="<?php echo $action;?>" enctype="multipart/form-data">
			<input name="id" type="hidden" value="<?php echo $id;?>">
			<h3>标题</h3>
			<input name="title" value="<?php echo $image['title'];?>" class="edit" />
			<h3>URL</h3>
			<input name="url" value="<?php echo $image['url'];?>" class="edit" />
			<h3>当前缩略图</h3>
			<img src="<?php echo $image['address'];?>" class='view-cover' />
			<input type="file" name="slideShow" />
			<div class="uploadbuttondiv">
				<button class="uploadbutton checkinput" type="button">保存</button>
			</div>
		</form>
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
