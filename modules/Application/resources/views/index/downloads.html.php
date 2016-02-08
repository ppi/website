<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?= $view['assets']->getUrl('js/community.js'); ?>"></script>
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?= $view['assets']->getUrl('css/community.css'); ?>" rel="stylesheet">
<link href="<?= $view['assets']->getUrl('css/downloads.css'); ?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<div class="community-page content-box" id="downloads-page">

    <h1>Downloads</h1>

    <div class="content-container clearfix">
        <div class="projects-list downloads-container">
            <?php foreach ($downloadItems as $downloadItem): ?>
                <div class="download-item clearfix">
                    <div class="download-description span4">
                        <h3><?= $view->escape($downloadItem->getName()); ?></h3>

                        <p>Released: <?= $view->escape($downloadItem->getDateReleased()->format('jS F Y')); ?></p>

                        <p><?= $view->escape($downloadItem->getDesc()); ?></p>

                        <p>
                            <a class="link-arrow" href="http://docs.ppi.io/latest/book/installation.html">
                                Read the full installation instructions</a>
                        </p>

                        <div class="last-col download-button-area">
                            <p>
                                <a href="<?= $downloadItem->getUrl(); ?>" class="btn btn-green download-button"
                                   data-trigger-url="<?= $view['router']->generate('Download', array('fileID' => $downloadItem->getID())); ?>">Download</a>
                            </p>
                        </div>

                    </div>

                    <!-- /.four-col -->

                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
