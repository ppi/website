<?php $view->extend('::base.html.php'); ?>

<div id="home-page">
	<div class="top">
		
		<div class="intro">
			<p class="heading">ppi framework version 2 is here!</p>
			<p class="desc">ppi is an open source php meta-framework. we have taken the good bits from Symfony2, ZendFramework2 &amp; Doctrine2 and combined them together to create a solid and very easy web application framework. ppi is fully <a href="http://www.php-fig.org" title="PSR-0" target="_blank">PSR</a> compliant.</p>
            <p class="desc">ppi can be considered the boilerplate of PHP frameworks</p>
			<div class="buttons">
				<div class="btn-group">
					<button class="btn btn-green btn-large dropdown-toggle" data-toggle="dropdown">
                        <span class="icon-circle-arrow-down icon-white"></span> Download
                    </button>
					<ul class="dropdown-menu">
						<li><a href="#download" id="download-skeleton-without-vendors">Skeleton App (without vendors) .tar.gz 5.8KB</a></li>
						<li><a href="#download" id="download-skeleton-with-vendors">Skeleton App (with vendors) .tar.gz 20MB</a></li>
					</ul>
				</div>
				<a class="main-button docs-button btn btn-large" href="<?=$view['router']->generate('DocsViewFile', array('page' => 'getting-started'));?>">Documentation</a>
				<a class="main-button github-button btn btn-large" href="http://www.github.com/ppi/skeletonapp">GitHub</a>
			</div>
		</div>
	</div>
	<div class="middle">
		<p class="heading">What is ppi made of?</p>
		<p class="download-count">Downloaded <b><?=$downloadCount;?></b> times</p>
		<ul class="list">
			<li>
				<a class="icon" href="<?=$view['router']->generate('Homepage');?>docs/modules.html" title=""><img src="<?=$view['assets']->getUrl('images/components.png');?>" alt="Icon"></a>
				<a class="title" href="<?=$view['router']->generate('Homepage');?>docs/modules.html" title="">Modules</a>
				<p class="desc">New and easy modular framework, leveraging the ZendFramework2 ModuleManager component.</p>
			</li>
			<li>
				<a class="icon" href="<?=$view['router']->generate('Homepage');?>docs/routing.html" title=""><img src="<?=$view['assets']->getUrl('images/routing.png');?>" alt="Icon"></a>
				<a class="title" href="<?=$view['router']->generate('Homepage');?>docs/routing.html" title="">Routing</a>
				<p class="desc">Simple and powerful routing based on the Symfony2 Routing component</p>
			</li>
			<li style="margin-right: 0;">
				<a class="icon" href="<?=$view['router']->generate('Homepage');?>" title=""><img src="<?=$view['assets']->getUrl('images/home_templating.png');?>" alt="Icon"></a>
				<a class="title" href="<?=$view['router']->generate('Homepage');?>" title="">Templating</a>
				<p class="desc">Awesome templating based on the Symfony2 Templating Component. We support PHP, Twig, Smarty and Mustache templates.</p>
			</li>
			<li>
				<a class="icon" href="<?=$view['router']->generate('Homepage');?>" title=""><img src="<?=$view['assets']->getUrl('images/config.png');?>" alt="Icon"></a>
				<a class="title" href="<?=$view['router']->generate('Homepage');?>" title="">Databases</a>
				<p class="desc">Simple and powerful DataSource component based on the Doctrine2 DBAL component</p>
			</li>
			<li>
				<a class="icon" href="<?=$view['router']->generate('Homepage');?>" title=""><img src="<?=$view['assets']->getUrl('images/composer.png');?>" alt="Icon"></a>
				<a class="title" href="<?=$view['router']->generate('Homepage');?>" title="">Composer Based</a>
				<p class="desc">ppi itself is a composer package, and all of its dependencies are also composer packages. installation has never been so easy!</p>
			</li>
			<li style="margin-right: 0;">
				<a class="icon" href="<?=$view['router']->generate('Community');?>" title=""><img src="<?=$view['assets']->getUrl('images/community2.png');?>" alt="Icon"></a>
				<a class="title" href="<?=$view['router']->generate('Community');?>" title="">Our community rocks</a>
				<p class="desc">Our <a href="<?=$view['router']->generate('Community');?>" title="Community">Community</a> page gives you access to what's going on in the PPI eco-system.</p>
			</li>
			
		</ul>
	</div>
	<div class="bottom">
		<a class="fork" href="http://www.github.com/ppi/website" title="Fork me on github"><img src="<?=$view['assets']->getUrl('images/fork-me.png');?>" alt="Fork me on github"></a>
		<p class="header">Community</p>
		<ul class="list">
			<li>
				<a class="icon" target="_blank" href="<?=$view['router']->generate('Chat');?>" title=""><img src="<?=$view['assets']->getUrl('images/chat.png');?>" alt="Icon"></a>
				<a class="title" target="_blank" href="<?=$view['router']->generate('Chat');?>" title="IRC Chat">IRC</a>
				<p class="desc">Chat with the ppi community at #ppi on freenode.</p>
			</li>
			<li>
				<a class="icon" target="_blank" href="http://www.github.com/ppi/skeletonapp" title="" style="margin-top: -3px;"><img src="<?=$view['assets']->getUrl('images/github.png');?>" alt="Icon"></a>
				<a class="title" target="_blank" href="http://www.github.com/ppi/skeletonapp" title="GitHub">GitHub</a>
				<p class="desc">The easiest way to contribute to ppi is to fork us on GitHub</p>
			</li>
			<li>
				<a class="icon" target="_blank" href="http://stackoverflow.com/questions/tagged/ppi" title="StackOverflow" style="margin-top: -3px;"><img src="<?=$view['assets']->getUrl('images/stackoverflow.png');?>" alt="Icon"></a>
				<a class="title" target="_blank" href="http://stackoverflow.com/questions/tagged/ppi" title="StackOverflow">StackOverflow</a>
				<p class="desc">Share your knowledge by answering user questions about ppi.</p>
			</li>
		</ul>
	</div>
	
</div> <!-- /#home-page -->


<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/home.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>    

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/home.js');?>"></script>
<?php $view['slots']->stop(); ?>