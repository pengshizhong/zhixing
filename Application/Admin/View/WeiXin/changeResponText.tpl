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
					<input name="type" value="text" type="hidden" />
					<h3>关键字</h3>
					<input name="keyword" class="edit" value="{$respon['keyword']}">
				</div>
			<!-- 富文本编辑器开始 -->
				<h3>内容</h3>
				<input type="hidden" name="id" value="{$respon['id']}" />
				<textarea name="content" class="content">{$respon[content]}</textarea>
				<script type="text/javascript">
				    UE.getEditor('myEditor');
				</script>
			<!-- 富文本编辑器结束 -->
			<div class="clear"></div>
			</div>
			<div class="right">
			</div>
			
			<button type="button" class="checkinput operate" action="{$action}">保存上传</button>
			<div class="clear"></div>
			</form><!-- 表单结束 -->
			</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
