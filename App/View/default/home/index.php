<div id="home-page" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
	 xmlns="http://www.w3.org/1999/html">
	<div class="top">
		
		<div class="intro">
			<p class="heading">ppi framework version 2 is here!</p>
			<p class="desc">ppi is an open source php meta-framework. we have taken the good bits from Symfony2 and ZendFramework2 and combined them together to create a solid and easy web application framework. If you are already a fan of SF2 or ZF2 then you're already familiar with ppi. ppi is fully <a href="http://www.php-fig.org" title="PSR-0" target="_blank">PSR-0</a>, <a href="http://www.php-fig.org" title="PSR-0" target="_blank">PSR-1</a> and <a href="http://www.php-fig.org" title="PSR-0" target="_blank">PSR-2</a> compliant.</p>
			<div class="buttons">
				<div class="btn-group">
					<a class="btn btn-success btn-large dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-circle-arrow-down icon-white"></i> Download</a>
					<ul class="dropdown-menu">
						<li><a href="#download" id="download-skeleton-without-vendors">Skeleton App (without vendors) .tar.gz 5.8KB</a></li>
						<li><a href="#download" id="download-skeleton-with-vendors">Skeleton App (with vendors) .tar.gz 20MB</a></li>
					</ul>
				</div>
				<a class="main-button docs-button btn btn-large" href="<?= $baseUrl; ?>docs">Documentation</a>
				<a class="main-button github-button btn btn-large" href="http://www.github.com/ppi">GitHub</a>
			</div>
		</div>
	</div>
	<div class="middle">
		<p class="heading">what is ppi made of?</p>
		<p class="download-count">downloaded <b><?=$downloadCount;?></b> times</p>
		<ul class="list">
			<li>
				<a class="icon" href="<?= $baseUrl; ?>docs/modules.html" title=""><img src="<?= $baseUrl; ?>images/light/components.png" alt="Icon"></a>
				<a class="title" href="<?= $baseUrl; ?>docs/modules.html" title="">Modules</a>
				<p class="desc">New and easy modular framework, leveraging the ZendFramework2 ModuleManager component.</p>
			</li>
			<li>
				<a class="icon" href="<?= $baseUrl; ?>docs/controllers-and-routing.html" title=""><img src="<?= $baseUrl; ?>images/light/routing.png" alt="Icon"></a>
				<a class="title" href="<?= $baseUrl; ?>docs/controllers-and-routing.html" title="">Routing</a>
				<p class="desc">Simple and powerful routing based on the Symfony2 Routing component</p>
			</li>
			<li style="margin-right: 0;">
				<a class="icon" href="<?= $baseUrl; ?>" title=""><img src="<?= $baseUrl; ?>images/light/home_templating.png" alt="Icon"></a>
				<a class="title" href="<?= $baseUrl; ?>" title="">Templating</a>
				<p class="desc">Awesome templating based on the Symfony2 Templating Component. We support PHP, Twig and Smarty</p>
			</li>
			<li>
				<a class="icon" href="<?= $baseUrl; ?>" title=""><img src="<?= $baseUrl; ?>images/light/config.png" alt="Icon"></a>
				<a class="title" href="<?= $baseUrl; ?>" title="">Databases</a>
				<p class="desc">Simple and powerful DataSource component based on the Doctrine2 DBAL component</p>
			</li>
			<li>
				<a class="icon" href="<?= $baseUrl; ?>" title=""><img src="<?= $baseUrl; ?>images/light/composer.png" alt="Icon"></a>
				<a class="title" href="<?= $baseUrl; ?>" title="">Composer Based</a>
				<p class="desc">ppi itself is a composer package, and all of its dependencies are also composer packages. installation has never been so easy!</p>
			</li>
			<li style="margin-right: 0;">
				<a class="icon" href="<?= $baseUrl; ?>" title=""><img src="<?= $baseUrl; ?>images/light/community2.png" alt="Icon"></a>
				<a class="title" href="<?= $baseUrl; ?>" title="">Our community rocks</a>
				<p class="desc">Our <a href="<?= $baseUrl; ?>community" title="Community">Community</a> page gives you access to what's going on in the PPI eco-system.</p>
			</li>
			
		</ul>
	</div>
	<div class="bottom">
		<a class="fork" href="http://www.github.com/ppi/website" title="Fork me on github"><img src="<?= $baseUrl; ?>images/light/fork-me.png" alt="Fork me on github"></a>
		<p class="header">Community</p>
		<ul class="list">
			<li>
				<a class="icon" target="_blank" href="<?= $baseUrl; ?>live-chat" title=""><img src="<?= $baseUrl; ?>images/light/chat.png" alt="Icon"></a>
				<a class="title" target="_blank" href="<?= $baseUrl; ?>live-chat" title="IRC Live Chat">IRC</a>
				<p class="desc">Chat with the ppi community at #ppi on freenode.</p>
			</li>
			<li>
				<a class="icon" target="_blank" href="http://www.github.com/ppi" title="" style="margin-top: -3px;"><img src="<?= $baseUrl; ?>images/light/github.png" alt="Icon"></a>
				<a class="title" target="_blank" href="http://www.github.com/ppi" title="GitHub">GitHub</a>
				<p class="desc">The easiest way to contribute to ppi is to fork us on GitHub</p>
			</li>
			<li>
				<a class="icon" target="_blank" href="http://stackoverflow.com/questions/tagged/ppi" title="StackOverflow" style="margin-top: -3px;"><img src="<?= $baseUrl; ?>images/light/stackoverflow.png" alt="Icon"></a>
				<a class="title" target="_blank" href="http://stackoverflow.com/questions/tagged/ppi" title="StackOverflow">StackOverflow</a>
				<p class="desc">Share your knowledge by answering user questions about ppi.</p>
			</li>
		</ul>
	</div>
	
</div> <!-- /#home-page -->
