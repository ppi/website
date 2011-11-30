<article class="content-box docs-page">

	<aside class="toc">
		<p class="heading">Table of Contents</p>
		<ul class="items">
			<li><a href="#" title="">Introduction</a></li>
			<li><a href="#" title="">Loading Views</a></li>
			<li><a href="#" title="">Loading an ajax view</a></li>
			<li><a href="#" title="">Passing data to loaded views</a></li>
			<li><a href="#" title="">PPI View Variables</a></li>
			<li><a href="#" title="">Themeing</a></li>
			<li><a href="#" title="">Rendering engines</a></li>
		</ul>
	</aside>

	<h1>Views</h1>
	<h3 id="anchor-introduction">Introduction</h3>
	<p>The view renders the application logic from the controller into a form suitable for interaction, typically a user interface element. Views typically contain child views, html, css and javascript.</p>
	
	<h3 id="anchor-loading-views">Loading Views</h3>
	<p>Loading views is very simple, by calling $this->render() you're invoking a file to handle presentation logic. This view has values passed to it from your controller and it renders the appropriate output type, most commonly HTML.</p>
	<p>This will load your little template file specified into the master template (default template.php)</p>
	<p>PPI renders a "master template" which is basically your site "shell". A part of this master template there is a dynamic part of it, this dynamic part is the actual view that you choose to render from your controller by doing:</p>
	<pre><code class="php">// No data to pass, just render raw HTML
$this->render('user/profile');
		
// Passing data
$this->render('user/profile', array(
	'firstname' => 'ppi',
	'lastname'  => 'master'
));

// Passing data with compact
$firstname = 'ppi;
$lastname  = 'master';
$this->render('user/profile', compact('firstname', 'lastname'));</code></pre>
	
	<p>Now that we have chosen to render our user profile view. We must now learn the path of the view file that's being rendered here.</p>
	<p>In our configuration file we have the following value.</p>
	<pre><code class="php">view.theme = default</code></pre>
	<p>So in light of that value, our path is <strong>App/View/default/user/profile.php</strong>. From now on, it's back to normal HTML and CSS in your profile.php page to perform presentation logic.</p>
	
	<h3>Master Template</h3>
	<p>What we have, is a master template. By default when you install the skeleton app the path to this file is <strong>App/View/default/template.php</strong>. This file is your website frame. It contains your header, footer and any other global assets.</p>
	<p><strong>Notice: </strong> Our master template is passed a variable called <strong>$actionFile</strong>. This is the path to the template that was called up from <strong>$this->render()</strong>. This means you can have one maintainable site template and just the content area of your page will be dynamic.</p>
	<p>The following is an example of a master template skeleton structure.</p>
	<pre><code class="php">&lt;?php
if($isAjax) {
	include($viewDir . $actionFile);
	return;
}
?>
&lt;html&gt;
	&lt;?php include($viewDir . 'elements/head.php'); ?>
	&lt;body&gt;
		&lt;?php include($viewDir . 'elements/header_and_nav.php'); ?>
		&lt;div id="page-content"&gt;
			&lt;?php include($viewDir . $actionFile); ?>
		&lt;/div&gt;
		&lt;?php include($viewDir . 'elements/footer.php'); ?>
	&lt;/body&gt;
&lt;/html&gt;
	</code></pre>
	
	<h3 id="anchor-loading-a-partial-view">Load a Partial View</h3>
	<p>A partial view is the same concept as loading an ajax ciew. You're not looking to obtain the entire website template with your render() file's contents. You're just looking to obtain the content back from the rendering of a view instead of it outputting to the browser.</p>
	<p><strong>Notice:</strong> the render() method now takes a third param. The third param contains behavioural settings to the render process.</p>
	<pre><code class="php">$user = $this->getUser();
$settings = $this->getSettings();
$userInfoAreaContent = $this->render('user/elements/info-area', compact('user', 'settings'), array('partial' => true));
		
$this->render('user/profile', compact('userInfoAreaContent'));</code></pre>
	
	<h3>Loading a cached view</h3>
	<p>When loading a cached view, you're typically looking to generate some HTML that won't change until your data next changes; such as a navigation menu that's generated from the database.</p>
	<p>Below is an example that checks if the cached partial view has been cached before. If so you will be given the existing content back. If it doesn't then it will render your view and then return you the content.</p>
	<p><strong>Notice: </strong>Below we're mixing partial views with caching</p>
	<pre><code class="php">// Checking if our view has been cached before, or the TTL has expired.
if($this->isViewCached('user/elements/profile/leftnav')) {
	$leftNavContent = $this->getCachedView('user/elements/profile/leftnav');
} else {
	$navItems = $this->getNavItems();
	$leftNavContent = $this->render('user/elements/profile/leftnav', compact('navItems'), array(
		'cache'    => true,
		'cacheTTL' => 86400
	));
}

// Now that we've got our left nav HTML content, lets pass it to the main template to be rendered
$user = $this->getUser();
$this->render('user/profile', compact('user', 'leftNavContent'));</code></pre>
	
	<h3 id="anchor-loading-an-ajax-view">Loading an ajax view</h3>
	<p>If you look at the master template example above, you will see there is an initial check for <strong>$isAjax</strong>. This variable is automatically set if the HTTP request made to your PPI request was an ajax one. This is really just rendering a partial view but you can control all ajax behaviour via the master template. The difference between an ajax view and the standard type of view seen above is; It will only render the template specified from your <strong>$this->render()</strong> call.</p>
	<p><strong>Notice: </strong> The application logic for an ajax view and a standard view is identical.</p>
	<pre><code class="php">$user = $this->getUser();
$projectData = $this->getUserProjectData($user);
$this->render('user/projects', compact('projectData', 'user'));</code></pre>

	<p>Now, in my view template i would have access to a local variable called $projectInfo, for example: </p>
	<pre><code class="php">
&lt;h3>Welcome to the &lt;?php echo $projectInfo['title']; ?&gt; project&lt;/h3>
	</code></pre>

	<h3 id="anchor-ppi-view-variables">PPI View Variables</h3>
	<p>Every template loaded is given access to a list of pre-set view variables. The list are as follows:</p>
	<p><strong>$baseUrl - The config setting</strong></p>
	<pre><code class="ini">system.base_url = http://localhost/myapp/</code></pre>
	<pre><code class="php">&lt;a href="&lt;?php echo $baseUrl; ?&gt;user/login">Link&lt;/a></code></pre>
<!--	<p><strong>currUr</strong> - Current URI</p>-->
	<p><strong>fullUrl</strong> - The full URL. protocol://host/uri, eg: https://localhost/mysite/user/profile/ppi_master</p>

	<p><strong>request</strong> The request array containing controller and method from the dispatcher.</p>
	<p><strong>request.controller</strong> - If we are on user/login then controller will be 'user'</p>
	<pre><code class="php">// Are we making a request to the homepage?
if($request['controller'] == 'home') { .. }</code></pre>
	<p><strong>request.method</strong> - If we are on user/login then controller will be 'login' </p>

	<pre><code class="php">// Are we on the login page?
if($request['controller'] === 'user' && $request['method'] === 'login') { .. }</code></pre>

	<p><strong>isLoggedIn</strong> - Boolean to see if the user is a guest or not</p>
	<pre><code class="php">&lt;?php if($isLoggedIn): ?&gt;
	&lt;a href="&lt;?php echo $baseUrl; ?&gt;user/logout">Logout&lt;/a>
&lt;?php else: ?&gt;
	&lt;a href="&lt;?php echo $baseUrl; ?&gt;user/login">Login&lt;/a>
&lt;?php endif; ?&gt;</code></pre>

	<p><strong>authData</strong> - The current logged in users authentication data</p>
	<pre><code class="php">if($isLoggedIn) {
	&lt;h3>Welcome &lt;?php echo $authData['username']; ?&gt;&lt;/h3>
}</code></pre>

	<h3 id="anchor-themeing">Themeing</h3>
	
	<p>Themeing is a very powerful feature of PPI. It abstracts away the theme so that your application logic (aka controllers) never changes</p>
	<p>The active theme is controlled from your applications config file under the <strong>view.theme</strong> setting.</p>
	
	<p>The standard path for your view directory is: <strong>/App/View/&lt;theme&gt;/&lt;template&gt;</p>
	
	<pre><code class="php">layout.view_theme = default</code></pre>
	
	<p>To render a view with the default theme activated would be:</p>
	<pre><code class="php">$this->render('project/view');</code></pre>
	
	<p>To render a view with the <strong>dark</strong> theme activated would be:</p>
	<pre><code class="php">$this->render('project/view');</code></pre>
	
	<p>To add a new theme for example "dark" then you would create a new folder such as: /App/View/dark/</p>
	<p>To activate this as the active theme in your configuration file apply:</p>
	<pre><code class="php">layout.view_theme = dark</code></pre>

	<h3 id="anchor-rendering-engines">Rendering engines</h3>
	<p>PPI supports pluggable rendering engines so you can use raw .php template files but you can also use the Smarty templating engine and Twig templating engine.</p>
	<p>To switch rendering engines for your application you modify the following config setting.</p>
	<pre><code class="php">layout.renderer = php
layout.renderer = smarty
layout.renderer = twig</code></pre>

	<p>Your app's API does not change at all, you still load your template using $this->render()</p>
</article>