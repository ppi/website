<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?= $view['assets']->getUrl('css/community.css'); ?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?= $view['assets']->getUrl('js/community.js'); ?>"></script>
<?php $view['slots']->stop(); ?>

<div class="community-page content-box">
    <h1>Community</h1>
    <ul>
        <li><a href="">Chat</a></li>
        <li><a href="">Facebook</a></li>
        <li><a href="">GitHub</a></li>
        <li><a href="">Twitter</a></li>
        <li><a href="">Google Plus</a></li>
    </ul>
</div>
