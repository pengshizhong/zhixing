<include file="./Application/Admin/View/Header/header.tpl"  />
	<div class="container">
		<div class="menu">
				<ul>
					<a href="<?php echo $menu_edit;?>"><li>新增文章</li></a>
					<a href="<?php echo $menu_type;?>"><li>分类管理</li></a>
				</ul>
			
		<div class="clear"></div> 
		</div>
		<form method="post" action="<?php echo $action;?>" enctype="multipart/form-data"><!-- 表单开始 -->
		<div id="editArea">
			<div class="left">
				<div>
					<h3>标题</h3>
					<input name="title" class="edit" value="<?php if($article) echo $article['title'];?>" >
					<h3>关键字</h3>
					<input name="keywords" class="edit" value="<?php if($article) echo $article['keywords'];?>">
				</div>
			<!-- 富文本编辑器开始 -->
			
				<textarea name="article" id="myEditor" style="height:300px;"><?php if($article) echo $article['article'];?></textarea>
				<js  href="Public/ueditor/ueditor.config.js" />
				<js  href="Public/ueditor/ueditor.all.min.js" />
				<js  href="Public/ueditor/lang/zh-cn/zh-cn.js" />
				<script type="text/javascript">
				    UE.getEditor('myEditor');
				</script>
			<!-- 富文本编辑器结束 -->
			<div class="clear"></div>
			</div>
			<div class="right">
				<div class="editAreaRight">
					<h3>发布状态</h3>
					<p>日期：<?php if($article) echo $article['date']; else echo date("Y-m-d")?></p>

					<p>
						状态

						<select name="status_0" >
							<?php if($article) { ?>
								<option <?php if($article['status_0']=="0") echo "selected";?>>
									待审核
								</option>
								<option <?php if($article['status_0']=="1") echo "selected";?>>
									已发布
								</option>
							<?php } else { ?>
								<option selected>待审核</option>
								<option>已发布</option>
							<?php } ?>	
						</select>
					</p>
				</div>
				<div class="editAreaRight">
					<h3>文章封面</h3>
					<p>
						<input type="file" name="cover">
					</p>
					<?php if($article&&$article['cover']!='') { ?>
					<p>当前的封面图</p>
					<img class="view-cover" src="<?php echo $article['cover'];?>" />
					<?php } ?>
				</div>
				<div class="editAreaRight">
					<h3>分类目录</h3>
					
					<p>
						<select name="type">
							<?php   foreach( $allType as $type) {?>
							<option <?php if($article&&$article['type']==$type) echo "selected";?>><?php echo $type; ?></option>
							<?php } ?>
						</select>
					</p>
				</div>
			</div>
			<div class="uploadbuttondiv">
			<button type="button" class="uploadbutton checkinput">
				<?php if($article) echo "确认修改"; else echo "保存上传";?>
			</button>
			</div>
			
			<div class="clear"></div>
			</form><!-- 表单结束 -->
		</div>



	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
