<?php $view->extend('::base.html.php'); ?>

<div id="home-page">
    
    <div class="top-container clearfix">
    
        <div class="top">
    
            <div class="intro">
                <p class="heading">ppi: the php meta framework!</p>
                <p class="desc">ppi is an open source php meta-framework. we have taken the good bits from Symfony2, ZendFramework2 &amp; Doctrine2 and combined them together to create a solid and very easy web application framework.
                <p class="desc">ppi can be considered the boilerplate of PHP frameworks</p>
    
                <div class="buttons">
                    <div class="btn-group">
                        <button class="btn btn-green btn-large dropdown-toggle" data-toggle="dropdown">
                            <span class="icon-circle-arrow-down icon-white"></span> Download
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#download" id="download-skeleton-without-vendors">Skeleton App (without vendors).tar.gz</a></li>
                            <li><a href="#download" id="download-skeleton-with-vendors">Skeleton App (with vendors) .tar.gz</a></li>
                        </ul>
                    </div>
                    <a class="main-button docs-button btn btn-large" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>">Documentation</a>
                    <a class="main-button github-button btn btn-large" href="http://www.github.com/ppi">GitHub</a>
                </div>
            </div>
            
        </div>
        
        <div class="news-area">
            <div class="heading">
                <span>What's new</span>
            
                <div class="social-icons">
                    <a href="http://twitter.com/ppi_framework" target="_blank"><img src="<?= $view['assets']->getUrl('images/twitter2.png');?>" alt="Twitter" width="38" /></a>
                    <a href="https://plus.google.com/communities/100606932222119087997" target="_blank"><img src="<?= $view['assets']->getUrl('images/googleplus.png');?>" width="38" /></a>
<!--                    <a href="--><?//=$view['router']->generate('BlogGetRSS');?><!--"><img src="--><?//= $view['assets']->getUrl('images/rss.png');?><!--" width="38" /></a>-->
                </div>
            
            </div>
            
            <ul>
                <li><a href="<?=$view['router']->generate('BlogView', array('postID' => '1', 'title' => 'tutorial-geolocation-with-foursquare-and-google-maps'));?>" title="">Tutorial: GeoLocation with Foursquare and Google Maps</a></li>
                <li><a href="<?=$view['router']->generate('Blog');?>" title="New Blog Launched">New Blog Launched</a></li>
                <li><a href="https://plus.google.com/communities/100606932222119087997" title="Google plus community launched">Google plus community launched</a></li>
                <li><a href="https://twitter.com/smashingmag/status/250490134590545920" title="Smashing Magazine mentions PPI" target="_blank">Smashing Magazine mentions PPI</a></li>
                <li><a href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting-started'));?>" title="New documentation theme released">New documentation theme released</a></li>
                
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
                
                <p class="desc">New and easy modular framework, leveraging the ZendFramework2 ModuleManager component.</p>
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

                <p class="desc">Awesome templating based on the Symfony2 Templating Component. We support PHP, Twig and Smarty</p>
            </li>
            <li>
                <a class="icon" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>" title=""><img src="<?=$view['assets']->getUrl('images/config.png');?>" alt="Icon"></a>
                <a class="title" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>" title="">Databases</a>
                <p class="desc">Simple and powerful DataSource component based on the Doctrine2 DBAL component</p>
            </li>
                <li>
                <a class="icon" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>" title=""><img src="<?=$view['assets']->getUrl('images/composer.png');?>" alt="Icon"></a>
                <a class="title" href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting_started'));?>" title="">Composer Based</a>
                <p class="desc">ppi itself is a composer package, and all of its dependencies are also composer packages. installation has never been so easy!</p>
            </li>
            <li style="margin-right: 0;">
                <a class="icon" href="<?=$view['router']->generate('Community');?>" title="">
                    <img src="<?=$view['assets']->getUrl('images/community2.png');?>" alt="Icon">
                </a>
                <a class="title" href="<?=$view['router']->generate('Community');?>" title="">Our community rocks</a>
                <p class="desc">Our <a href="<?=$view['router']->generate('Community');?>" title="Community">Community</a> page gives you access to what's going on in the PPI eco-system.</p>
            </li>

        </ul>
    </div>
    
    <div class="whos-using-ppi">
        <p class="heading">Who's using PPI Framework?</p>
        <ul class="clearfix">
            <li><a href="http://www.bestbuys.com" title="BestBuys" target="_blank"><img src="<?=$view['assets']->getUrl('images/who/bestbuys.png');?>" alt=""></a></li>
            <li><a href="http://store.tomorrowland.com" title="Tomorrowland" target="_blank"><img src="<?=$view['assets']->getUrl('images/who/tomorrowland.png');?>" alt=""></a></li>
            <li class="nhs"><a href="#" onclick="javascript: void(0);" title="NHS Local" target="_blank"><img src="<?=$view['assets']->getUrl('images/who/nhs.jpg');?>" alt=""></a></li>
<!--            <li class="cumbernauld"><a href="#" onclick="javascript: void(0);" title="NHS Local" target="_blank"><img src="<?=$view['assets']->getUrl('images/who/cumbernauld.png');?>" alt=""></a></li> -->
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
