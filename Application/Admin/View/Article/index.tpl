
<include file="./Application/Admin/View/Header/header.tpl"  />
	<div class="container">
		<div class="menu" >
				<ul>
					<a href="<?php echo $menu_index;?>"><li>查看文章</li></a>
					<a href="<?php echo $menu_type;?>"><li>分类管理</li></a>
				</ul>
				<div class="uploadbuttondiv">
					<a href="{$editButton}"><button class="uploadbutton">写文章</button></a>
				</div>
				<div class="clear"></div>
		</div>
		<div id="article-type">
			<?php foreach ($allType as $value){ ?>
				<div class="type-list">
				<h4><?php echo $value['name'];?></h4>
				<?php foreach($value['child'] as $child){ ?>
					<a href="{$child['url']}"><span><?php echo $child['name'];?></span></a>
				<?php } ?>
				</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<?php  foreach( $allArticle as $article ) { ?>
		<div class="article">
			<div class="article-info">
				<ul>
					<li><span>标题：<?php echo $article['title'];?></span></li>
					<li><span>日期：<?php echo $article['date'];?></span></li>
					<li><span>分类：<?php echo $article['type'];?></span></li>
					<li><span>关键字：<?php echo $article['keywords'];?></span></li>
					<li><span>发布状态：<?php echo $article['status_0'];?></span></li>
					<li>
						<a href="<?php echo $article['changeUrl'];?>">
							<span class="function">编辑</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<span class="function delete" deleteUrl="<?php echo $article['deleteUrl'];?>">删除</span>
						</a>
					</li>
				</ul>
			</div>
			<img class="view-cover" src="<?php echo $article['cover'];?>" />
		</div>
		<?php } ?>
			<div class="boundary"></div>
			<div class="pageTurn">
				<?php echo $pageTurn;?>
			</div>
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
