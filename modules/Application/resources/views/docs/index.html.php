<?php $view->extend('::docsbase.html.php'); ?>

<div class="content-box docs-page">
    <?=$view->render('Application:docs:' . $page . '.html.php');?>
</div>