<div class="continer-fluid content-box docs-page">

    <div class="toc-mobile">
        <p class="toc-heading"><i class="icon-arrow-down left icon-white"></i> Table of Contents <i class="icon-arrow-down icon-white right"></i></p>
        <ul class="items">
            <li><a href="#" title="">Appliction File Structure</a></li>
            <li><a href="#" title="">The public folder</a></li>
            <li><a href="#" title="">The public index.php file</a></li>
            <li><a href="#" title="">The app folder</a></li>
            <li><a href="#" title="">The app.config.php file</a></li>
            <li><a href="#" title="">The app.modules.php file</a></li>
            <li><a href="#" title="">The modules folder</a></li>
        </ul>
    </div>
	
	<div class="row-fluid">
		
		<aside class="toc-container">
			
			<div class="toc">
				<p class="heading">Table of Contents</p>
				<ul class="items">
					<li><a href="#" title="">Appliction File Structure</a></li>
					<li><a href="#" title="">The public folder</a></li>
					<li><a href="#" title="">The public index.php file</a></li>
					<li><a href="#" title="">The app folder</a></li>
					<li><a href="#" title="">The app.config.php file</a></li>
					<li><a href="#" title="">The app.modules.php file</a></li>
					<li><a href="#" title="">The modules folder</a></li>
				</ul>
			</div>
		</aside>
		
		<article>
		
			<h1>The Skeleton Application</h1>
		
			<p class="section-title">Application File Structure</p>
			<p>First, lets review the file structure of the PPI skeleton application that we have pre-built for you to get up and running as quickly as possible.</p>
			<p><pre>

www/ <- your web root directory

    skeleton/ <- the unpacked archive
        app/
            app.config.php
            cache/
            views/
            ...

        public/
            index.php
            css/
            js/
            images/
            ...

        modules/
            Application/
                Module.php
                Controller/
                resources/
                    config/
                    views/
                    ...

        PPI/ <- the ppi framework and vendors
		  </pre></p>
			
			<p>Lets break it down into parts:</p>
			
			<p class="section-title">The public folder</p>
			<p>The structure above shows you the <b>/public/</b> folder. Anything outside of /public/ i.e: all your business code will be secure from direct URL access. In your development environment you don't need a virtualhost file, you can directly access your application like so: <b>http://localhost/skeleton/public/</b>. In your production environment this will be <b>http://www.mysite.com/</b>. All your publicly available asset files should be here, CSS, JS, Images.</p>
			
			<p class="section-title">The public index.php file</p>
			<p>The <b>/public/index.php</b> is also known are your bootstrap file, or front controller is explained in-depth below</p>
			<p><pre><code>
&lt;?php

// All relative paths start from the main directory, not from /public/
chdir(dirname(__DIR__));

// Lets include PPI
include('PPI/init.php');

// Initialise our PPI App
$app               = new PPI\App();
$app->moduleConfig = include 'app/modules.config.php';
$app->config       = include 'app/app.config.php';

// Do you want twig engine enabled?
//$app->templatingEngine = 'twig';

// If you are using the DataSource component, enable this
//$app->useDataSource = true;

$app->boot()->dispatch();
			</code></pre></p>
			
			<p>If you uncomment the useDataSource line, it is going to look for your <b>/app/datasource.config.php</b> and load that into the DataSource component for you. Databases are not a requirement in PPI so if you dont need one then you wont need to bother about this. More in-depth documentation about this in the DataSource chapter.</p>
			
			<p class="section-title">The app folder</p>
			<p>This is where all your apps global items go such as app config, datasource config and modules config and global templates(views). You wont need to touch these out-of-the-box but it allows for greater flexibility in the future if you need it.</p>
			
			<p class="section-title">The app.config.php file</p>
			<p>Looking at the example config file below, you can control things here such as the environment, templating engine and datasource connection.</p>
			<p><pre><code>
&lt;?php
$config = array(
    'environment'            => 'development', // <-- Change this depending on your environment
    'templating.engine'      => 'php', // <-- The default templating engine
    'datasource.connections' => include (__DIR__ . '/datasource.config.php')
);

// Are we in debug mode ?
if($config['environment'] !== 'development') { // <-- You can also check the env from your controller using $this->getEnv()
    $config['debug']     = $config['environment'] === 'development';
    $config['cache_dir'] = __DIR__ . '/cache';
}
return $config; // Very important
        </code></pre></p>
        <p>The 'return $config' line gets pulled into your index.php's <b>$app->config</b> variable.</p>

        <p class="section-title">The modules.config.php file</p>
        <p>The example below shows that you can control which modules are active and a list of directories <b>module_paths</b> that PPI will scan for your modules. Pay close attention to the <b>order</b> in which your modules are loaded. If one of your modules relies on resources loaded by another module. Make sure the module loading the resources is loaded <b>before</b> the others that depend upon it.</p>
        <p><pre><code>
&lt;?php
return array(
    'activeModules'   => array('Application', 'User'),
    'listenerOptions' => array('module_paths' => array('./modules'), 'routingEnabled' => true),
);
			</code></pre></p>
			<p>Note that this file returns an array too, which is assigned against your index.php's <b>$app->moduleConfig</b> variable</p>
			
			<p class="section-title">The app/views folder</p>
			<p>This folder is your applications global views folder. A global view is one that a multitude of other module views extend from. A good example of this is your website's template file. The following is an example of <b>/app/views/base.html.php</b></p>
			<p><pre><code>
&lt;html&gt;
    &lt;body&gt;
        &lt;h1&gt;My website&lt;/h1&gt;
        &lt;div class="content"&gt;
            &lt;?php $view['slots']-&gt;output('_content'); ?&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
			</code></pre></p>
			
			<p>You'll notice later on in the Templating section to reference and extend a global template file, you will use the following syntax in your modules template.</p>
			<p><pre><code>
&lt;?php $view->extend('::base.html.php'); &gt;
			</code></pre></p>
			<p>Now everything from your module template will be applied into your <b>base.html.php</b> files <b>_content</b> section demonstrated above.</p>
			
			<p class="section-title">The modules folder</p>
			<p>This is where we get stuck into the real details, we're going into the /modules/ folder. Click the next section to proceed</p>
			
			<a class="prev-article btn btn-success" href="getting-started.html"><i class="icon-arrow-left icon-white"></i> Getting Started</a>
			<a class="next-article btn btn-success" href="modules.html">Modules <i class="icon-arrow-right icon-white"></i></a>
	
	</article>
	</div>
</div>