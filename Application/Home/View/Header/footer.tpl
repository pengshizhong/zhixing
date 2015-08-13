		<div class="footer">
				<div class="content">
					<h1>友情链接</h1>
					<ul>
						<?php foreach($allFriendlink as $friendlink){ ?>
						<li><a href="{$friendlink['link']}">{$friendlink['name']}</a></li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>

</html>