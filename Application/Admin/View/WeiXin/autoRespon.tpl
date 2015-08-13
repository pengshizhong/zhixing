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

			<table id="commenttable" rules="rows">
				<thread>
					<td>关键字</td>
					<td>类型</td>
					<td>创建日期</td>
					<td>操作</td>
				</thread>
				<?php foreach($allRespon as $respon){ ?>
					<tr respon-id="{$respom['id']}">
						<td>{$respon['keyword']}</td>
						<td>{$respon['type']}</td>
						<td>{$respon['date']}</td>
						<td>
							<a href="{$respon['change']}"><button class="operate">修改</button></a>
							<button class="operate delete" deleteurl="{$respon['delete']}">删除</button></a>
						</td>
					</tr>
				<?php }?>
			</table>
			<div id="table-function">
				<button class="operate changedownload" action="{$action}">新增文本回复</button>
				<button class="operate editnews" action="{$action}">新增图文回复</button>
			</div>
			<div id="submit">
				<form id="change-info" class="weixin-respontext" method="post">
					<h3 id="title">请输入响应回复的关键词</h3>
					<input  name="keyword" class="edit"  />
					<h3>请输入响应回复的文本内容</h3>
					<textarea name="content" class="edit" ></textarea>
					<input type="hidden" value="text" name="type" />
					<button type="button" class="operate check-weixin-text">提交</button>
					<button type="button" class="operate" id="cancel">取消</button>
				</form>
			</div>
			<div class="boundary"></div>
	</div>
	<div class="black-overlay"></div>
				<div id="editnews">
				<form id="editnewsform" method="post" action="{$action}" enctype="multipart/form-data"><!-- 表单开始 -->
				<div id="editArea">
				<div class="left">
				<div>
					<input name="type" value="news" type="hidden" />
					<h3>标题</h3>
					<input name="title" class="edit">
					<h3>关键字</h3>
					<input name="keyword" class="edit">
				</div>
			<!-- 富文本编辑器开始 -->
				<h3>跳转链接</h3>
				<input name="url" class="edit">
			   	<h3>摘要</h3>
				<textarea name="content"  class="edit content"  style="height:200px;"></textarea>
			<!-- 富文本编辑器结束 -->
			<div class="clear"></div>
			</div>
			<div class="right">
				<div class="editAreaRight">
					<h3>图片上传</h3>
					<p>
						<input type="file" name="cover">
					</p>
				</div>
			</div>
			
			<button type="button" class="check-weixin-news operate">
				<?php if($article) echo "确认修改"; else echo "保存上传";?>
			</button>
			<button id="cancel-editnews" type="button" class="operate" >取消</button>
			<div class="clear"></div>
			</form><!-- 表单结束 -->
			</div>
<include file="./Application/Admin/View/Header/footer.tpl" />
