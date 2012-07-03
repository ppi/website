<article class="content-box docs-page">

	<aside class="toc">
		<p class="heading">Table of Contents</p>
		<ul class="items">
			<li><a href="#" title="">Introduction</a></li>
			<li><a href="#" title="">The Module.php class</a></li>
			<li><a href="#" title="">Configuration</a></li>
			<li><a href="#" title="">Routing</a></li>
			<li><a href="#" title="">Resources</a></li>
		</ul>
	</aside>
	
	<h1>PPI Modules</h1>
	
	<p>Figured 1.3 shows the breakdown of a typical PPI module.</p>
	
	<p class="section-title">Introduction</p>
	<p>/modules/Application/ is the global module for your app that is provided to you by default.</p>
	
	<p class="section-title">The Module.php class</p>
	<p>Every PPI module looks for a Module.php class file, this is the starting point for your module. </p>
	
	<p>Figure 1.4 shows an example Module.php in all its glory. You need the init() method so your module will be loadable. Modules can optionally have the getConfig() and getRoutes() methods.</p>
	
	<p class="section-title">Configuration</p>
	<p>Your global config of /app/app.config.php and all the getConfig() method calls for all your modules are merged together. You'll learn later how to get access to it.</p>
	
	<p class="section-title">Routing</p>
	<p>The getRoutes() method currently expects is re-using the Symfony2 routing component.</p>
	
	<p class="section-title">Your modules resources</p>
	<p>/Application/resources/ is where non-PHP-class files live such as config files (resources/config) and views (resources/views). We encourage you to put your own custom config files in /resources/config/ too.</p>
	
	<a class="prev-article btn btn-success" href="application.html"><i class="icon-arrow-left icon-white"></i> The Skeleton Application</a>
	<a class="next-article btn btn-success" href="routing.html">Routing <i class="icon-arrow-right icon-white"></i></a>
	
</article>