<div class="continer-fluid content-box docs-page">

	<div class="toc-mobile">
		<p class="toc-heading"><i class="icon-arrow-down left icon-white"></i> Table of Contents <i class="icon-arrow-down icon-white right"></i></p>
		<ul class="items">
			<li><a href="#introduction" title="">Introduction</a></li>
			<li><a href="#module-class" title="">The Module.php class</a></li>
			<li><a href="#init" title="">Init</a></li>
			<li><a href="#configuration" title="">Configuration</a></li>
			<li><a href="#routing" title="">Routing</a></li>
			<li><a href="#conclusion" title="">Conclusion</a></li>
		</ul>
	</div>

	<div class="row-fluid">

		<section class='content'>

			<h1>PPI Modules</h1>

			<a class="next-article top btn btn-green" href="routing.html">Routing <i class="icon-arrow-right icon-white"></i></a>

			<article id='introduction'>
				<p class="section-title">Introduction</p>

				<p>By default, one module is provided with the SkeletonApp, named "Application". It provides a simple
					route pointing to the homepage. A simple controller to handle the "home" page of the application.
					This demonstrates using routes, controllers and views within your module.</p>
			</article>

			<article id='module-structure'>
				<p class="section-title">Module Structure</p>

				<p>Your module starts with Module.php. You can have configuration on your module. Your can have routes
					which result in controllers getting dispatched. Your controllers can render view templates.</p>
			<pre><code>
				modules/

				Application/

				Controller/
				Index.php

				resources/

				views/
				index/index.html.php
				index/list.html.php

				config/
				config.yml
				routes.yml

				Module.php
			</code></pre>

			</article>

			<article id='module-class'>
				<p class="section-title">The Module.php class</p>

				<p>Every PPI module looks for a Module.php class file, this is the starting point for your module. </p>
			<pre><code>
				&lt;?php
				namespace Application;

				use PPI\Module\Module as BaseModule
				use PPI\Autoload;

				class Module extends BaseModule {

				protected $_moduleName = 'Application';

				function init($e) {
				Autoload::add(__NAMESPACE__, dirname(__DIR__));
				}

				}
			</code></pre>
			</article>

			<article id='init'>
				<p class="section-title">Init</p>

				<p>The above code shows you the Module class, and the all important <b>init()</b> method. Why is it
					important? If you remember from <b>The Skeleton Application</b> section previously, we have defined
					in our <b>modules.config.php</b> config file an <b>activeModules</b> option, when PPI is booting up
					the modules defined activeModules it looks for each module's init() method and calls it.</p>

				<p class="tip">The init() method is run for every page request, and should not perform anything heavy.
					It is considered bad practice to utilize these methods for setting up or configuring instances of
					application resources such as a database connection, application logger, or mailer.</p>
			</article>

			<article id='modules-resources'>
				<p class="section-title">Your modules resources</p>

				<p>/Application/resources/ is where non-PHP-class files live such as config files (resources/config) and
					views (resources/views). We encourage you to put your own custom config files in /resources/config/
					too.</p>
			</article>

			<article id='configuration'>
				<p class="section-title">Configuration</p>

				<p>Expanding on from the previous code example, we're now adding a getConfig() method. This must return
					a raw php array. All the modules with getConfig() defined on them will be merged together to create
					'modules config' and this is merged with your global app's configuration file at <b>/app/app.config.php</b>.
					Now from any controller you can get access to this config by doing <b>$this->getConfig()</b>. More
					examples on this later in the Controllers section.</b></p>
			<pre><code>
				&lt;?php
				class Module extends BaseModule {

				protected $_moduleName = 'Application';

				public function init($e) {
				Autoload::add(__NAMESPACE__, dirname(__DIR__));
				}

				public function getConfig() {
				return include(__DIR__ . '/resources/config/config.php');
				}

				}
			</code></pre>
			</article>

			<article id='routing'>

				<p class="section-title">Routing</p>

				<p>The getRoutes() method currently is re-using the Symfony2 routing component. It needs to return a
					Symfony RouteCollection instance. This means you can setup your routes using PHP, YAML or XML.</p>
			
			<pre><code>
				class Module extends BaseModule {

				protected $_moduleName = 'Application';

				public function init($e) {
				Autoload::add(__NAMESPACE__, dirname(__DIR__));
				}

				/**
				* Get the configuration for this module
				*
				* @return array
				*/
				public function getConfig() {
				return include(__DIR__ . '/resources/config/config.php');
				}

				/**
				* Get the routes for this module, in YAML format.
				*
				* @return \Symfony\Component\Routing\RouteCollection
				*/
				public function getRoutes() {
				return $this->loadYamlRoutes(__DIR__ . '/resources/config/routes.yml');
				}

				}
			</code></pre>
			</article>

			<article id='conclusion'>

				<p class="section-title">Conclusion</p>

				<p>So, what have we learnt in this section so far? We learnt how to initialize our module, and how to
					obtain configuration options and routes from it. </p>

				<p>PPI will boot up all the modules and call the getRoutes() method on them all. It will merge the
					results together and match them against a request URI such as <b>/blog/my-blog-title</b>. When a
					matching route is found it dispatches the controller specified in that route.</p>

				<p>Lets move onto the <b>Routing and Controllers</b> section to check out what happens next.</p>
			</article>

			<a class="prev-article btn btn-green" href="application.html"><i class="icon-arrow-left icon-white"></i> The Skeleton Application</a>
			<a class="next-article bottom btn btn-green" href="routing.html">Routing <i class="icon-arrow-right icon-white"></i></a>

		</section>

	</div>
</div>