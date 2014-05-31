<?php $view->extend('::base.html.php'); ?>

<div id="home-page">
    
    <div class="top-container clearfix">
    
        <div class="top">
            <div class="intro">
                <p class="heading">ppi: the php meta framework!</p>
                <p class="desc">PPI is a vendor agnostic PHP meta framework that provides an equal and open platform to empower PHP developers to pick the best tools from the best PHP frameworks</p>
                <p class="desc">PPI bootstraps framework components for you from the top frameworks such as ZendFrameworks2, Symfony2, Laravel4, FuelPHP, Doctrine2<p>
    
                <div class="buttons">
                    <a class="btn btn-green btn-large" href="<?=$view['router']->generate('Downloads');?>">
                        <span class="icon-circle-arrow-down icon-white"></span> Download
                    </a>
                    <a class="main-button docs-button btn btn-large" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>">Documentation</a>
                    <a class="main-button github-button btn btn-large" href="http://www.github.com/ppi">GitHub</a>
                </div>
            </div>
        </div>
        
        <div class="news-area">
            <div class="heading">
                <span>What's new</span>
            
                <div class="social-icons">
                    <a href="http://twitter.com/ppi_framework" tutorial-geolocation-with-foursquare-and-google-mapst="_blank"><img src="<?= $view['assets']->getUrl('images/twitter2.png');?>" alt="Twitter" width="38" /></a>
                    <a href="https://plus.google.com/communities/100606932222119087997" target="_blank"><img src="<?= $view['assets']->getUrl('images/googleplus.png');?>" width="38" /></a>
<!--                    <a href="--><?//=$view['router']->generate('BlogGetRSS');?><!--"><img src="--><?//= $view['assets']->getUrl('images/rss.png');?><!--" width="38" /></a>-->
                </div>
            
            </div>
            
            <ul>
                <li><a href="<?=$view['router']->generate('BlogView', array('postID' => '4', 'title' => 'the-official-interview'));?>" title="">The Official PPI Interview</a></li>
                <li><a href="<?=$view['router']->generate('BlogView', array('postID' => '3', 'title' => 'new-sphinx-powered-documentation-system'));?>" title="">New Sphinx Powered Documentation System</a></li>
                <li><a href="<?=$view['router']->generate('BlogView', array('postID' => '1', 'title' => 'tutorial-geolocation-with-foursquare-and-google-maps'));?>" title="">Tutorial: GeoLocation with Foursquare and Google Maps</a></li>
                <li><a href="<?=$view['router']->generate('Blog');?>" title="New Blog Launched">New Blog Launched</a></li>
                <li><a href="https://plus.google.com/communities/100606932222119087997" title="Google plus community launched">Google plus community launched</a></li>
                
            </ul>
        </div>
    </div>
        
    <div class="middle">

        <p class="heading">What is ppi made of?</p>

        <ul class="list">
            <li>
                <a class="icon" href="<?=$view['router']->generate('DocsIndex', array('page' => 'modules'));?>" title="">
                    <img src="<?=$view['assets']->getUrl('images/components.png');?>" alt="Icon">
                </a>
                <a class="title" href="<?=$view['router']->generate('DocsIndex', array('page' => 'modules'));?>" title="">Modules</a>
                
                <p class="desc">Light and simple modules, leveraging the ZF2 ModuleManager component.</p>
            </li>
            <li>
                <a class="icon" href="<?=$view['router']->generate('DocsIndex', array('page' => 'routing'));?>" title="">
                    <img src="<?=$view['assets']->getUrl('images/routing.png');?>" alt="Icon">
                </a>
                <a class="title" href="<?=$view['router']->generate('DocsIndex', array('page' => 'routing'));?>" title="">Routing</a>
                <p class="desc">Simple and powerful routing based on the Symfony2 Routing component</p>
            </li>
            <li style="margin-right: 0;">
                <a class="icon" href="<?=$view['router']->generate('DocsIndex', array('page' => 'templating'));?>" title="">
                    <img src="<?=$view['assets']->getUrl('images/home_templating.png');?>" alt="Icon">
                </a>
                <a class="title" href="<?=$view['router']->generate('DocsIndex', array('page' => 'templating'));?>" title="">Templating</a>

                <p class="desc">Awesome templating based on the Symfony2 Templating Component. We support PHP, Twig, Smarty and Mustache</p>
            </li>
            <li>
                <a class="icon" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>" title=""><img src="<?=$view['assets']->getUrl('images/config.png');?>" alt="Icon"></a>
                <a class="title" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>" title="">Databases</a>
                <p class="desc">Our powerful DataSource component bootstraps the best DB libraries such as: DoctrineDBAL, DoctrineMongoDB, ZendDB, LaravelDB, Eloquent, Monga</p>
            </li>
                <li>
                <a class="icon" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>" title=""><img src="<?=$view['assets']->getUrl('images/composer.png');?>" alt="Icon"></a>
                <a class="title" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>" title="">Composer Based</a>
                <p class="desc">PPI is fully utilising composer for every dependency!</p>
            </li>
            <li style="margin-right: 0;">
                <a class="icon" href="<?=$view['router']->generate('Community');?>" title="">
                    <img src="<?=$view['assets']->getUrl('images/community2.png');?>" alt="Icon">
                </a>
                <a class="title" href="<?=$view['router']->generate('Community');?>" title="">Our community rocks</a>
                <p class="desc">Join our community pages on <a href="/gplus">GooglePlus</a>, <a href="/facebook">FaceBook</a> or follow us on <a href="/twitter">Twitter</a>.</p>
            </li>

        </ul>
    </div>
    
    <div class="bottom">
        <a class="fork" href="http://www.github.com/ppi/website" title="Fork me on github">
            <img src="<?=$view['assets']->getUrl('images/fork-me.png');?>" alt="Fork me on github">
        </a>

        <p class="header">Community</p>

        <ul class="list">
            <li>
                <a class="icon" target="_blank" href="<?=$view['router']->generate('Chat');?>" title="">
                    <img src="<?=$view['assets']->getUrl('images/chat.png');?>" alt="Icon">
                </a>
                <a class="title" target="_blank" href="<?=$view['router']->generate('Chat');?>" title="IRC Chat">IRC</a>
                <p class="desc">Chat with the ppi community at #ppi on freenode.</p>
            </li>
            <li>
                <a class="icon" target="_blank" href="http://www.github.com/ppi/skeletonapp" title="" style="margin-top: -3px;"><img src="<?=$view['assets']->getUrl('images/github.png');?>" alt="Icon"></a>
                <a class="title" target="_blank" href="http://www.github.com/ppi/skeletonapp" title="GitHub">GitHub</a>
                <p class="desc">The easiest way to contribute to ppi is to fork us on GitHub</p>
            </li>
        </ul>

        <div class="newsletter newsletter-box">
            <p class="title">PPI Newsletter</p>

            <form action="#submit" class="newsletter-form" method="post">
                <p><label for="newsletterName">Name</label><input name="name" type="text" class="name" id="newsletterName"></p>
                <p><label for="newsletterEmail">Email</label><input name="email" type="text" class="email" id="newsletterEmail"></p>
                <input type="submit" class="btn success submit" href="<?= $view['router']->generate('Chat'); ?>" target="_blank" value="Subscribe to the newsletter">
            </form>
        </div>
    </div>

</div> <!-- /#home-page -->


<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/home.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/home.js');?>"></script>
<?php $view['slots']->stop(); ?>
