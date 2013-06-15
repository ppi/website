<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?> 

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/community.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div class="community-page content-box">

	<div class="breadcrumbs">
		<ul class=" clearfix">
			<li><a href="/">Home</a></li>
			<li><span class="divider">&rsaquo;</span></li>
			<li class="active">Community</li>
		</ul>
	</div>

	<div class="content-container clearfix">

		<div class="left-side">
	        <?=$view->render('Application:index:community_leftnav.html.php');?>
		</div>
    
		<div class="inner-content">
			
			<h1>Community Activity</h1>

			<div class="activity-stream <?= $filtered ? 'filtered' : ''; ?>">
				<div class="feeds">
				<?php
				foreach($activity as $item):
					$feedImage  =  $view['assets']->getUrl('images/' . $item['source'] . '.png');
					$feedDesc = $item['title'];
				?>
					<div class="feed source-<?= $item['source']; ?> clearfix">
						<div class="image"><img class="fl <?= $item['source']; ?>" src="<?= $feedImage; ?>" alt="<?= $item['source']; ?>" /></div>
						<div class="content">
							<p class="description"><?= $feedDesc	; ?></p>
	                        <p class="date"><?=$item['date'];?> - <a href="<?= $item["url"];?>" target="_blank" class="readmore">Read More</a></p>
						</div>
					</div>
				<?php
				endforeach;
				?>
				</div>
			</div>
		</div>
	</div>
</div>
