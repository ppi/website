<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/community.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div class="projects-page community-page">
    <div class="left-side">
        <?=$view->render('Application:index:community_leftnav.html.php');?>
    </div>
	<div class="content-box">
		
		<ul class="breadcrumb">
			<li><a href="#">Home</a> <span class="divider">/</span></li>
			<li class="active">Downloads</li>
		</ul>
		
		<h1>Downloads</h1>

		<div class="projects-list">
		<?php foreach($downloadItems as $downloadItem): ?>
			<div class="download">
				<div class="name"><?= $downloadItem->getName(); ?></div>
				<div class="filename"><?= $view->escape($downloadItem->getFilename()); ?></div>
				<div class="filesize"><?= $view->escape($downloadItem->getFilesizeHuman()); ?></div>
				<div class="download-count"><?= $view->escape($downloadItem->getNumDownloads()); ?></div>
			</div>
		<?php
		endforeach;
		?>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<link href="<?=$view['assets']->getUrl('css/projects.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>   