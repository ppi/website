<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<link href="<?=$view['assets']->getUrl('css/about.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>   

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/community.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div class="about-page community-page content-box">
    
    <div class="breadcrumbs">
        <ul class=" clearfix">
            <li><a href="/">Home</a></li>
            <li><span class="divider">&rsaquo;</span></li>
            <li class="active">About</li>
        </ul>
    </div>

    <div class="content-container clearfix">

        <div class="left-side">
               <?=$view->render('Application:index:community_leftnav.html.php');?>
       	</div>
           
       	<div class="inner-content">
            
            <div class="desc">
                <h2>What is PPI?</h2>
                <p>PPI is a vendor agnostic PHP meta framework that provides an equal and open platform to empower PHP developers to pick the best tools from the best PHP frameworks</p>
                <p>PPI bootstraps framework components for you from the top frameworks such as ZendFrameworks2, Symfony2, Laravel4, FuelPHP, Doctrine2</p>
            </div>
            
            <div class="desc">
                <h2>Key Aspects</h2>
                <ul>
                    <li>Clean and simple.</li>
                    <li>Minimal and useful (non-intrusive)</li>
                    <li>Well documented.</li>
                    <li>Fully PSR compliant. You can use all of your existing compatible PSR code in PPI.</li>
                    <li>Re-use of time/code invested in learning/using other frameworks since all code is directly reusable.</li>
                </ul>
            </div>
            
        </div>
    </div>
</div>