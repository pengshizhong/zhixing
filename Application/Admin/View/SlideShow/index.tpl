<include file="./Application/Admin/View/Header/header.tpl" />
	<div class="container">
	<div class="menu">
				<ul>
					<a href="{$imageView}"><li>查看图片</li></a>
					<a href="{$downloadFile}"><li>下载管理</li></a>
					<a href="{$changeSort}"><li>控制滚动顺序</li></a>
				</ul>
		<div class="uploadbuttondiv">
			<button class="uploadbutton uploadSlideShow">上传图片</button>
			<form action="{$action}" method="post" enctype="multipart/form-data" id="uploadfile" >
				<input type="file" class="uploadSlideShow" onchange="uploadFile();" name="slideShow" />
			</form>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<div id="imagecontainer">
		<?php foreach( $allImage as $image ) { ?>
			<div class="image-pictext">
				<img src="<?php echo $image['address'];?>" class="view-cover"  id="slide-adjust" />
				<div class="image-sin">
					<p><strong>标题：<?php echo $image['title'];?></strong></p>
					<p class="image-url">链接:<?php echo $image['url'];?></p>
					<a href="<?php echo $image['changeUrl'];?>">
						<span class="function">修改</span>
					</a>
					<a href="javascript:void(0)">
						<span class="function delete" deleteUrl="<?php echo $image['deleteUrl'];?>">删除</span>
					</a>
					<?php if(!$image['sort']) { ?>
						<a href="<?php echo $image['addToSlideShowUrl'];?>">
							<span class="function">加入slideshow</span>
						</a>
					<?php } else {?>
						<a href="<?php echo $image['removeFromSlideShowUrl'];?>">
							<span class="function">移出slideshow</span>
						</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
