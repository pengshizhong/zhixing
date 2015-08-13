<include file="./Application/Home/View/Header/header.tpl"  />



	<div id="container">
		<div id="main">
			<div id="ba">
				<div id="top">
					<h1>下载库</h1>
				</div>
				<ul>
					<?php  foreach( $allChild as $child) {?>
						<!-- <a href="<?php echo $child['url'];?>"><li><?php echo $child['name'];?></li></a> -->
					<?php } ?>
				</ul>
			</div>
			<div id="bb">
				<div id="list">
					<ul>
						<?php foreach( $allFiles as $file ) { ?>
						<li>
							<a href="{$file['path']}"><h1>{$file['name']}</h1></a>
							<h2>{$file['date']}</h2>
							<!-- <a href="{$article['url']}">
								<img src="__PUBLIC__/{$article['cover']}">
							</a> -->
							<!-- <p>{$article['description']}</p> -->
						</li>
						<?php } ?>
					</ul>
				</div>
				<div id="tab">
					<div>
						{$pageTurn}
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- <include file="./Application/Home/View/Header/footer.tpl"  /> -->