<include file="./Application/Admin/View/Header/header.tpl" />
	<div class="container">
		<div class="menu">
				<ul>
					<a href="{$imageView}"><li>查看图片</li></a>
					<a href="{$downloadFile}"><li>下载管理</li></a>
					<a href="{$changeSort}"><li>控制滚动顺序</li></a>
				</ul>
		<div class="clear"></div>
		</div>
		<div class="uploadbuttondiv">
			<button class="uploadbutton" id="saveSettings">保存设置</button>
			<div class="clear"></div>
		</div>
	<!-- 	<div class="shunxu-pic">项目开始
			<div class="bianhao">
				1
			</div>
			<div class="shunxu-content">
				<img src="" />
				<strong>图片标题</strong>
				<p>所属文章的名字是我</p>
				<strong>19941218</strong>
			</div>
			<div class="gongneng">
				<span>上移</span>
				<span>下移</span>
				<span>移除</span>
			</div>
			<div class="clear"></div>
		</div>项目结束 -->
		<?php foreach( $allSlideShow as $slideShow){ ?>
			<div class="shunxu-pic"><!-- 项目开始 -->
				<div class="bianhao">
					<span class='sort' imageId="<?php echo $slideShow['id'];?>"><?php echo $slideShow['sort'];?></span>
				</div>
				<div class="shunxu-content">
					<img src="<?php echo $slideShow['address'];?>" />
					<strong>标题：<?php echo $slideShow['title'];?></strong>
					<p>
						<a class="slideshowlink" href="<?php echo $slideShow['url'];?>">
						链接：<?php echo $slideShow['url'];?>
						</a>
					</p>
				</div>
				<div class="gongneng">
					<span class='function moveUp'>上移</span>
					<span class='function moveDown'>下移</span>
					<a href="<?php echo $slideShow['removeUrl']; ?>">
						<span class='function'>移除</span>
					</a>
				</div>
				<div class="clear"></div>
			</div><!-- 项目结束 -->
		<?php  }?>
		<div class="clear"></div>
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
