<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>   

<div class="community-page">
	<div class="left-side">
        <?=$view->render('Application:index:community_leftnav.html.php');?>
	</div>
    
	<div class="content-box">
		
		<ul class="breadcrumb">
			<li><a href="#">Home</a> <span class="divider">/</span></li>
			<li class="active">Community</li>
		</ul>
		
		<h1>Community</h1>

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
