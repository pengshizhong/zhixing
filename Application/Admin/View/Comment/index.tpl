<include file="./Application/Admin/View/Header/header.tpl"  />
	<div class="container">
			<div class="menu">
						<ul>
								<a href="{$allComment}"><li>全部评论</li></a>
								<a href="{$passedComment}"><li>已通过</li></a>
								<a href="{$waitingAuditComment}"><li>待通过</li></a>
						</ul>
					<div class="clear"></div>
			</div>
			<table id="commenttable" rules="rows">
				<thread>
					<td>作者</td>
					<td>内容</td>
					<td>回应给</td>
					<td>当前状态</td>
					<td>操作</td>
				</thread>
				<?php foreach($list as $value) { ?>
					<tr>
						<td>{$value['auther']}</td>
						<td>{$value['content']}</td>
						<td>{$value['article']}</td>
						<td>{$value['status']}</td>
						<td>
							<a href="{$value['changeStatusUrl']}"><button class="operate">修改发布状态</button>
							<a href="{$value['deleteUrl']}"><button class="operate">删除</button>
						</td>
					</tr>
				<?php } ?>
			</table>
		
		
		<div class="clear"></div>
		<div class="boundary"></div>
			<div class="pageTurn">
				<?php echo $pageTurn;?>
			</div>
	</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
