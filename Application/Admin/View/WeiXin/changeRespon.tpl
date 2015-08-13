<include file="./Application/Admin/View/Header/header.tpl" />
	<div class="container">
		<div class="menu">
					<ul>
						<a href="{$special}"><li>特殊回复</li></a>
						<a href="{$autoRespon}"><li>自动回复</li></a>
						<a href="{$checkMessage}"><li>消息记录</li></a>
					</ul>
<!-- 			<div class="uploadbuttondiv">
				<button class="uploadbutton uploadSlideShow">上传下载文件</button>
				<form action="{$action}" method="post" enctype="multipart/form-data" id="uploadfile">
					<input type="file" class="uploadSlideShow"  onchange="uploadFile();" name="downloadfile" />
				</form>
				<div class="clear"></div>
			</div> -->
			<div class="clear"></div>
		</div>

			
				<div >
				<form id="editnewsform" method="post" action="{$action}" enctype="multipart/form-data"><!-- 表单开始 -->
				<div id="editArea">
				<div class="left">
				<div>
					<input name="type" value="news" type="hidden" />
					<h3>标题</h3>
					<input name="title" class="edit" value="{$respon['title']}">
					<h3>关键字</h3>
					<input name="keyword" class="edit" value="{$respon['keyword']}">
					<h3>跳转链接</h3>
					<input name="url" class="edit" value="{$respon['url']}">
				</div>
				<h3>摘要</h3>
				<input type="hidden" name="id" value="{$respon['id']}" />
				<textarea name="content" class="content">{$respon[content]}</textarea>
			<div class="clear"></div>
			</div>
			<div class="right">
				<div class="editAreaRight">
					<h3>图片上传</h3>
					<p>
						<input type="file" name="cover">
					</p>
				</div>
				<div class="editAreaRight">
					<h3>当前封面</h3>
						<img class="view-cover" src="{$respon['cover']}">
				</div>
			</div>
			
			<button type="button" class="checkinput operate" action="{$action}">保存上传</button>
			<div class="clear"></div>
			</form><!-- 表单结束 -->
			</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
