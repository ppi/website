<div class="projects-page">
	<div class="left-side">
	<?= include_once($viewDir . 'community/elements/leftnav.php'); ?>
	</div>
	<div class="content-box">
		
		<ul class="breadcrumb">
			<li><a href="#">Home</a> <span class="divider">/</span></li>
			<li class="active">Projects</li>
		</ul>
		
		<h1>Projects</h1>

		<div class="projects-list">
		<?php
		foreach($projects as $project):
		?>
			<div class="project">
				<div class="title"><?= $project['title']; ?></div>
				<div class="description"><?= $helper->escape($project['desc']); ?></div>
				<div class="actions">
					<a href="<?= $project["tracker"];?>" target="_blank" class="readmore">Tracker</a>
					<a href="<?= $project["discussions"];?>" target="_blank" class="readmore">Discussions</a>
					<a href="<?= $project["source"];?>" target="_blank" class="readmore">Source Code</a>
					<a href="<?= $project["download"];?>" target="_blank" class="readmore">Download</a>
					<div class="clear"></div>
				</div>
			</div>
		<?php
		endforeach;
		?>
		</div>
	</div>
	<div class="clear"></div>
</div>
