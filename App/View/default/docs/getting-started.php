<article class="content-box docs-page">

	<aside class="toc">
		<p class="heading">Table of Contents</p>
		<ul class="items">
			<li><a href="#" title="">Introduction</a></li>
			<li><a href="#" title="">Getting the source</a></li>
			<li><a href="#" title="">Configuration</a></li>
			<li><a href="#" title="">Default routing</a></li>
			<li><a href="#" title="">Finally</a></li>
		</ul>
	</aside>

	<h1>Introduction</h1>
	<p>The following is an introduction to getting the PPI framework + application and configuring it appropriately. Before you begin you will need a LAMP/WAMP/MAMP setup. If you need a database for your application then get your DB client ready and fired up.</p>

	<h1 id="getting-the-source">Getting the source <a href="#getting-the-source" class="anchor" title="Getting the Source">¶</a></h1>
	<p><strong>Framework</strong></p>
	<p>The PPI Framework is a stand-alone library which is booted up from your PPI application. This means that you can have one repository powering 10 PPI applications at the same time. One benefit of this is that if you perform an update to the framework then all of your 10 applications will automatically be updated rather than having to update 10 different applications.</p>
	
	<p><a href="http://github.com/ppi/framework" title="Github Framework Repository">Github Framework Repository</a></p>
	
	<p><strong>Application</strong></p>
	<p>The PPI Skeleton Application is available for download and from this you will be able to quickly have a static HTML site up and running in a jiffy.</p>
	
	<p><a href="http://github.com/ppi/skeletonapp" title="Github Applicaiton Repository">Github Application Repository</a></p>

	<h1 id="configuration">Configuration <a href="#configuration" class="anchor" title="Configuration">¶</a></h1>
	<p><strong>Bootstrap</strong></p>
	<p>To get things started you'll need to configure your Bootstrap file (index.php)</p>
	<pre><code class="php">include('PPI/PPI/init.php');

$app = new PPI\App();
$app->boot()
		
// more $app options here..
		
// Dispatch the controller
$app->dispatch();</pre></code>

	<h2>Config File</h2>
	<p>The second thing you'll need to do is configure your application's config file. By default this is located in <span class="light">/App/Config/general.ini</span>.</p>

	<p><strong>Config Option: base_url</strong></p>
	<p>Change the baseUrl to your sites root, with an ending slash.</p>
	<pre><code class="ini">system.base_url = http://localhost/mysite/</pre></code>
	
	<h2>Default routing</h2>
	<p>If you now try to load the page you should have successfully got a default "ppi skeleton app" page. 
		The page is giving you instructions to remove the "default route" from your application's default route file which is located at /App/Config/routes.php. The routes.php file will contain a route section that looks like this:</p>
	<pre><code class="php">&lt;?php
$routes = array();

// --- DEFAULT SECTION - REMOVE THIS ---
$routes['.*'] = 'general/showdefault';
return;
// --- DEFAULT SECTION - REMOVE THIS ---

$routes['__default__'] = 'home/index';
$routes['__404__'] = 'general/show404';</code></pre>
	<br>
	
	<h2>Finally</h2>
	<p>Go ahead and remove the default section saying "remove this". This is here to make sure you're reading the documentation properly. Now by browsing to <span class="light">http://localhost/mysite/</span> you will be dispatching the __default__ route from your routes file, thus going to "home/index" which means loading up the "Home" controller and calling its "index" method.</p>

</article>


<!--
	<div id="back-to-top-area">
		<div id="back-to-top"><a href="#">▲</a></div>
		<div id="hover-menu">
			<ul></ul>
		</div>
		<div class="clear"></div>
	</div>
	--->
