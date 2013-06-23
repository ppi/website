<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/community.js');?>"></script>
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<link href="<?=$view['assets']->getUrl('css/downloads.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>   

<div class="community-page content-box" id="downloads-page">

	<div class="breadcrumbs">
		<ul class=" clearfix">
			<li><a href="/">Home</a></li>
			<li><span class="divider">&rsaquo;</span></li>
			<li class="active">Downloads</li>
		</ul>
	</div>

	<div class="content-container clearfix">

		<div class="left-side">
		    <?=$view->render('Application:index:community_leftnav.html.php');?>
		</div>

		<div class="inner-content">

			<h1>Download PPI Framework</h1>

			<div class="projects-list downloads-container">
			<?php foreach($downloadItems as $downloadItem): ?>
				<div class="download-item clearfix">

					<h3><?= $view->escape($downloadItem->getName()); ?></h3>
					<div class="download-description span5">
						<p><?=$view->escape($downloadItem->getDesc());?></p>
						<p><a class="link-arrow" href="/download/desktop/install-desktop-long-term-support">Read the full installation instructions</a></p>
					</div>
					<div class="span3 last-col download-button-area">
						<form class="form-download" action="<?=$view['router']->generate('Download', array('fileID' => $downloadItem->getID()));?>" method="post">
							<fieldset>
								<p class="smaller">If you choose <strong>without vendor</strong> then you will have to run composer yourself. <br><a href="https://help.ubuntu.com/community/UEFI">Read more ›</a></p>
								<select id="dl-item-<?=$downloadItem->getID();?>" name="vendor">
									<option value="no" selected="selected">without vendor (<?= $view->escape($downloadItem->getFilesizeHuman()); ?>)</option>
									<option value="yes">with vendor (<?= $view->escape($downloadItem->getVendorFilesizeHuman()); ?>)</option>
								</select>
							</fieldset>
							<div>
								<button type="submit" class="btn-green"><?= $view->escape($downloadItem->getName()); ?></button>
							</div>
						</form>
					</div><!-- /.four-col -->

					<!-- <div class="download-count"><?= $view->escape($downloadItem->getNumDownloads()); ?></div> -->
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
