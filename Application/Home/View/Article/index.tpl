
<include file="./Application/Home/View/Header/header.tpl"  />



	
		<div class="container">
			<div class="content">
					<div class="list_page_title">
						<div class="top">
							{$type}
						</div>
						<ul class="sub_class">
						<?php foreach($allChild as $value){ ?>
							<a href="{$value['url']}"><li>{$value['name']}</li></a>
						<?php } ?>
						</ul>
					</div>
					<div class="bb">
						<ul class="bb_list">
							<?php foreach($allArticle as $article){ ?>
							<li>
								<a href="{$article['url']}">
									<span class="info">
										<h1>{$article['title']}</h1>
										<h2>{$article['date']}</h2>
										<p>{$article['description']}</p>
									</span>
									<img src="{$article['cover']}">
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="tab">
						{$pageTurn}
					</div>

			</div>
		</div>
	


<include file="./Application/Home/View/Header/footer.tpl"  />