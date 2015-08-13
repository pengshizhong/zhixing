<include file="./Application/Home/View/Header/header.tpl"  />
		<div class="content">
			<div class="da">
			</div>
			<div class="db">
				<h1 class="db_title">{$content['title']}</h1>
				<h2 class="db_date">{$content['date']}</h2>
				<a href="{$content['last']}" class="db_back">返回上一级</a>
				<div class="db_article">
					{$content['article']}
				</div>
			</div>
		</div>


<include file="./Application/Home/View/Header/footer.tpl"  />