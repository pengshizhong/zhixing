<include file="./Application/Admin/View/Header/header.tpl" />
	<div class="container">
		<div class="menu">
					<ul>
						<a href="{$menu}"><li>菜单</li></a>
						<a href="{$autoRespon}"><li>自动回复</li></a>
						<a href="{$checkMessage}"><li>消息记录</li></a>
					</ul>
			<div class="uploadbuttondiv">
				<button class="uploadbutton uploadSlideShow">上传下载文件</button>
				<form action="{$action}" method="post" enctype="multipart/form-data" id="uploadfile">
					<input type="file" class="uploadSlideShow"  onchange="uploadFile();" name="downloadfile" />
				</form>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

			<table id="commenttable" rules="rows">
				<thread>
					<td>文件名</td>
					<td>下载链接</td>
					<td>上传日期</td>
					<td>操作</td>
				</thread>
				<?php foreach($allDownloadFile as $value) { ?>
					<tr>
						<td>{$value['name']}</td>
						<td>__PUBLIC__/{$value['path']}</td>
						<td>{$value['date']}</td>
						<td>
							<!-- <a href="{$value['changeUrl']}"> -->
								<button class="operate changedownload" action="{$value['changeUrl']}">修改</button>
							    <button class="operate delete" deleteUrl="{$value['deleteUrl']}">删除</button>
						</td>
					</tr>
				<?php } ?>
			</table>
			<div id="submit">
				<form id="change-info" method="post">
					<h2 id="title">请输入新的名称</h2>
					<input  name="name" class="edit"  />
					<button type="button" class="operate checkinput">提交</button>
					<button type="button" class="operate" id="cancel">取消</button>
				</form>
			</div>
			<div class="boundary"></div>
			<div class="pageTurn">
				{$pageTurn}
			</div>
	</div>
	<div class="black-overlay"></div>

<include file="./Application/Admin/View/Header/footer.tpl" />
