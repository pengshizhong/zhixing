<include file="./Application/Admin/View/Header/header.tpl" />
	<div class="container">
		<div class="menu">
					<ul>
						<a href="{$special}"><li>特殊回复</li></a>
						<a href="{$autoRespon}"><li>自动回复</li></a>
						<a href="{$checkMessage}"><li>消息记录</li></a>
					</ul>
			<div class="uploadbuttondiv">
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>


		<div>
			<div class="left">
				<h2>消息历史</h2>
				<div class="weixin-record">
					<?php foreach($allMsg as $msg) {?>
					<div class="weixin-record-unit">
					<p><?php echo $msg['content'];?></p>
					<p><?php echo $msg['date'];?></p>
					</div>
					<div class="weixin-record-unit">
						<div class="weixin-record-right">
							<p><?php echo $msg['respon'];?></p>
							<p><?php echo $msg['date'];?></p>	
						</div>
						<div class="clear"></div>
					</div>
					<?php }?>
				</div>
			</div>
			<div class="right">
				<h2>关注用户</h2>
				<?php foreach($allOpenId as $value){?>
				<a href="<?php echo $value['url']; ?>"><button class="openid"><?php echo $value['openid']; ?></button></a>
				<?php }?>
			</div>
		</div>

	</div>
	<div class="black-overlay"></div>

<include file="./Application/Admin/View/Header/footer.tpl" />
