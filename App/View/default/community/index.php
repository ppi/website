<div class="community-page">
	<div class="left-side">
	<?php include_once($viewDir . 'community/elements/leftnav.php'); ?>
        
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
				$feedDesc = $item['title'];
			?>
				<div class="feed source-<?= $item['source']; ?>">
					<div class="image">
						<img class="fl <?= $item['source']; ?>" src="<?= $feedImage; ?>" alt="<?= $item['source']; ?>" />
					</div>
					<div class="content">
						<div class="description"><?= $feedDesc; ?></div>

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
