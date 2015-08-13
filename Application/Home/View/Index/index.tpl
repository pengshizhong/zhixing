<include file="./Application/Home/View/Header/header.tpl"  />
		<div class="content">
			<div class="aa">
				<div class="logo">
					<img src="__PUBLIC__/images/picture/logo.png">
				</div>
				<div class="pic_box flexslider">
					<ul class="slides">
					<?php foreach($slideImage as $slide){ ?>
						<li>
							<a href="{$slide['url']}">
								<img src="{$slide['address']}">
								<h1 id="title">{$slide['title']}</h1>
							</a>
							
						</li>
					<?php  } ?>
					</ul>
				</div>
			</div>
			<div class="news red_ver">
				<div class="news_title"><a href="{$jobMore}"><p>招聘信息</p></a></div>
				<div class="news_list">
					<ul>
					<?php foreach($jobNews as $job){  ?>
						<li>
							<a href="{$job['url']}"><h3>{$job['title']}</h3></a>
							<h4>{$job['type']}</h4>
							<p>{$job['keywords']}</p>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>
			<div class="ac">
				<a href="{$infoNews[0]['url']}" class="ac_latest">
					<div class="ac_latest_sub">
						<h1>{$infoNews[0]['title']}</h1>
						<p>{$infoNews[0]['date']}</p>
					</div>
					<img src="{$infoNews[0]['cover']}">
				</a>
				<div class="ac_list">
					<a class="ac_title" href="{$more}">知行干货</a>
					<div class="ac_more">
						<p>往期回顾</p>
					</div>
					<ul class>
					<?php for ($i=1; $i < count($infoNews); $i++) {  ?>
					
						<li>
							<a href="{$infoNews[$i]['url']}">
								<h4>{$infoNews[$i]['title']}</h4>
								<p>{$infoNews[$i]['date']}</p>
							</a>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>
			<div class="news orange_ver">
				<div class="news_title "><a href="{$activityMore}"><p>活动动态</p></a></div>
				<div class="news_list">
					<ul>
						<?php  foreach($activityNews as $activity){ ?>
						<li>
							<a href="{$activity['url']}"><h3>{$activity['title']}</h3></a>
							<h4>{$activity['type']}</h4>
							<p>{$activity['keywords']}</p>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<include file="./Application/Home/View/Header/footer.tpl"  />