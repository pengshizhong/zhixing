<include file="./Application/Admin/View/Header/header.tpl"  />
	<div class="container">
	<div class="menu">
				<ul>
					<a href="<?php echo $menu_index;?>"><li>查看文章</li></a>
					<a href="<?php echo $menu_type;?>"><li>分类管理</li></a>
				</ul>
		<div class="clear"></div>
		</div>
		<div class="left">
			<table id="typetable" rules="rows">
				<thread>
					<td>名称</td>
					<td>文章数</td>
					<td>父级分类</td>
					<td>操作</td>
				</thread>
				<?php foreach ($allType as $type) { ?>
					<tr>
					<td><?php echo $type['name'];?></td>
					<td><?php echo $type['articleNum'];?></td>
					<td><?php echo $type['parent'];?></td>
					<?php if($type['name']!="未分类"&&$type['name']!="招聘信息"&&$type['name']!="活动动态"&&$type['name']!="知行干货") {?>
					<td>
						<a href="<?php echo $type['changeUrl'];?>">
							<span class="function">修改</span>
						</a>
						<a href="javascript:void(0)">
						<span class="function delete" deleteUrl="<?php echo $type['deleteUrl'];?>">删除</span>
						</a>
					</td>
					<?php } else {?>
					<td></td>
					<?php } ?>
				</tr>
			<?php	}?>
			</table>
		</div>
		<div class="right" id="type-input">
			<form method="post" action="{$action}">
				<h2><?php if(isset($changeType)) echo "修改指定分类:" . $changeType['name']; else echo "添加新的分类";?></h2>
				<?php if (isset($changeType)) { ?>
					<input name="oldName" type="hidden" value="<?php echo $changeType['name']	;?>">
				<?php }?>
				<input class="edit" name="name" <?php if(isset($changeType))
					{
					echo "value='" . $changeType['name'] . "'";
					}?>/>
				<h2>父级</h2>
				<select class="edit" name="parent">
				<?php if (isset($changeType)&&$changeType['parent']!='') { ?>
					<option selected><?php echo $changeType['parent'];?></option>
					
				<?php }  ?>
					<?php  foreach ($allParent as $type) { 
					if($type!=$changeType['parent']){ ?>
					<option><?php  echo $type; ?></option>
					<?php }} ?>
				</select>
				<h2>描述</h2>
				<textarea name="description"><?php if(isset($changeType)){echo $changeType['description'];}?></textarea>
				<div class="uploadbuttondiv">
					<button  type="button" class="uploadbutton checkinput" style="float:none;"><?php if (isset($changeType)) { echo "确认修改";} else {echo "保存";}?></button>
				</div>
			</form>
		</div>
		<div class="clear"></div>
		
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
