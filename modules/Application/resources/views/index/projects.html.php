<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/community.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div class="projects-page community-page content-box">

    <div class="breadcrumbs">
        <ul class=" clearfix">
            <li><a href="/">Home</a></li>
            <li><span class="divider">&rsaquo;</span></li>
            <li class="active">Projects</li>
        </ul>
    </div>


	<div class="content-container">
		
		<div class="left-side">
			<?=$view->render('Application:index:community_leftnav.html.php');?>
		</div>
		
		<div class="inner-content">

			<h1>Projects</h1>

			<div class="projects-list">
			<?php foreach($projects as $project): ?>
				<div class="project">
					<div class="title"><?= $project['title']; ?></div>
					<div class="description"><?= $view->escape($project['desc']); ?></div>
					<div class="actions">
						<a href="<?= $project["tracker"];?>" target="_blank" class="readmore">Tracker</a>
						<a href="<?= $project["source"];?>" target="_blank" class="readmore">Source Code</a>
						<a href="<?= $project["download"];?>" target="_blank" class="readmore">Download</a>
						<div class="clear"></div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<link href="<?=$view['assets']->getUrl('css/projects.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>   