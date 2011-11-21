<div class="community-page">
	<div class="left-side">
		<nav>
		<ul>
			<li><a class="first" href="<?= $baseUrl; ?>contributors" target="_blank">Contributors</a></li>
			<li><a class="first" href="http://www.github.com/ppi" target="_blank">GitHub</a></li>
			<li><a class="first" href="http://www.twitter.com/#!/ppi_framework" target="_blank">Twitter Feed</a></li>
			<li><a class="first" href="<?= $baseUrl; ?>live-chat" target="_blank">Live Chat</a></li>
			<li><a class="first" href="" target="_blank">How to get involved?</a></li>
			<li class="box">
				<p class="title">PPI IRC Network</p>
				<p class="details">
					<strong>Server:</strong> irc.freenode.org<br>
					<strong>Channel:</strong> #ppi
				</p>
				<p><a class="btn success" href="<?= $baseUrl; ?>live-chat" target="_blank">Connect</a></p>
			</li>
			<li class="box newsletter-box">
				<p class="title">PPI Newsletter</p>
				<div class="form">
					<p>Email</p> <input id="newsletter-email" name="email" type="text" placeholder="Type email, press enter." /></p>
					<div class="clear"></div>
					<input type="submit" class="btn success submit" href="<?= $baseUrl; ?>live-chat" target="_blank" value="Subscribe">
				</div>
			</li>
		</ul>
		</nav>
		
	</div>
	<div class="content-box">
		
		<ul class="breadcrumb">
			<li><a href="#">Home</a> <span class="divider">/</span></li>
			<li class="active">Community</li>
		</ul>
		
		<h1>Community</h1>
		<div class="topcontent">
				<div class="filter">Filter: <a href="<?= $baseUrl; ?>community/" class="filter-all">All</a> - <a href="<?= $baseUrl; ?>community/index/filter/twitter" class="filter-twitter">Twitter</a> - <a href="<?= $baseUrl; ?>community/index/filter/github" class="filter-github">Github</a> </div>
		</div>

		<div class="activity-stream <?= $filtered ? 'filtered' : ''; ?>">
			<div class="feeds">
			<?php
			foreach($activity as $item):
				$feedImage  = $baseUrl . 'images/community/' . $item['source'] . '.png';
			?>
				<div class="feed source-<?= $item['source']; ?>">
					<div class="image">
						<img class="fl <?= $item['source']; ?>" src="<?= $feedImage; ?>" alt="<?= $item['source']; ?>" />
					</div>
					<div class="content">
						<div class="description"><?= $item['title']; ?></div>

						<div class="actions">
							<a href="<?= $item["url"];?>" target="_blank" class="readmore">Learn More...</a>
						</div>

					</div>
					<div class="clear"></div>
				</div>
			<?php
			endforeach;
			?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
