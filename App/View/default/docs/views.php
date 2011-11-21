<div class="content-box">
	<h1>Views</h1>
	<h1 id="anchor-introduction">Introduction</h1>
	<p>The view renders the application logic from the controller into a form suitable for interaction, typically a user interface element.</p>
</div>
<div class="content-box">
	<h1 id="anchor-loading-views">Loading Views</h1>
	<p>Loading views is very simple, you get the function load() on your controller layer.</p>
	<p>This will load your little template file specified into the master template (default template.php) </p>
	<p>PPI renders a "master template" which is basically your site "shell". A part of this master template there is a dynamic part of it, this dynamic part is the actual view that you choose to render from your controller by doing:</p>
	<pre><code class="php">
	$this->load('template_name');
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-loading-an-ajax-view">Loading an ajax view</h1>
	<p>The difference between an ajax view and the standard type of view seen above is; It will only render the content from the specific view file that you're loading using the load() method and not the whole website e.g: the whole &lt;html&gt; block.</p>
	<p>In your master template (template.php) at the very top there is a check for the variable $isAjax. Then it will only load the dynamic part of the set. If $isAjax is not set it will load the whole of your website with your view file specified via load() will be in the dynamic section.</p>
	<pre><code class="php">
&lt;?php
if(!isset($isAjax) || $isAjax == false) {
?>
&lt;html&gt;
....
&lt;?php include_once($viewDir . $actionFile); ?&gt;
....
&lt;/html&gt;
&lt;?php
// Ajax area
} else {
include_once($viewDir . $actionFile);
}
?&gt;
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-passing-data-to-loaded-views">Passing data to loaded views</h1>
	<pre><code class="php">
// This example loads the profile template and passes it the current logged in users data
$this->load('profile', array(
'projectInfo' => $projectModel->getInfo($projectID)
));
	</code></pre>

	<p>Now, in my view template i would have access to a local variable called $projectInfo, for example: </p>
	<pre><code class="php">
&lt;h1>Welcome to the &lt;?php echo $projectInfo['title']; ?&gt; project&lt;/h1>
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-ppi-view-variables">PPI View Variables</h1>
	<p>Every template loaded is given access to a list of pre-set view variables. The list are as follows:</p>
	<p>$baseUrl - The config setting</p>
	<pre><code class="ini">
	system.base_url = http://localhost/myapp/
	</code></pre>
	<pre><code class="php">
	&lt;a href="&lt;?php echo $baseUrl; ?&gt;user/login">Link&lt;/a>
	</code></pre>
	<p>currUrl - Current URI omitting the hostname, eg: user/profile/paul/</p>
	<p>fullUrl - The full URL. protocol://host/uri, eg: https://localhost/mysite/user/profile/paul/</p>
	<p>request - The request array containing controller and method from the dispatcher.</p>
	<p>request.controller - If we are on user/login then controller will be 'user'</p>
	<pre><code class="php">
if($request['controller'] == 'profile') {
	echo '&lt;li class="active">Profile&lt;/a>';
} else {
	echo '&lt;li>Profile&lt;/li>';
}
	</code></pre>
	<p>request.method - If we are on user/login then controller will be 'login' </p>

	<pre><code class="php">
if($request['controller'] == 'profile' && $request['method']) {
	// do something here
}
	</code></pre>

	<p>isLoggedIn - Boolean to see if the user is a guest or not</p>
	<pre><code class="php">
if($isLoggedIn) {
	&lt;a href="&lt;?php echo $baseUrl; ?&gt;user/logout">Logout&lt;/a>
} else {
	&lt;a href="&lt;?php echo $baseUrl; ?&gt;user/login">Login&lt;/a>
}
	</code></pre>

	<p>authData - The current logged in users authentication data</p>
	<pre><code class="php">
if($isLoggedIn) {
	&lt;h1>Welcome &lt;?php echo $authData['username']; ?&gt;&lt;/h1>
}
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-themeing">Themeing</h1>
	<p>The standard path for your view directory is: /App/View/&lt;theme&gt;/template.php</p>
	<pre><code class="php">
layout.view_theme = default
	</code></pre>

	<p>To add a new theme for example "dark" then you would create a new folder such as: /App/View/dark/</p>
	<p>To activate this as the active theme in your configuration file apply:</p>
	<pre><code class="php">
layout.view_theme = dark
	</code></pre>
</div>
<div class="content-box">
	<h1 id="anchor-rendering-engines">Rendering engines</h1>
	<p>PPI supports pluggable rendering engines so you can use raw .php template files but you can also use the Smarty templating engine and Twig templating engine.</p>
	<p>To switch rendering engines for your application you modify the following config setting.</p>
	<pre><code class="php">
layout.renderer = php
layout.renderer = smarty
layout.renderer = twig
	</code></pre>

	<p>Your app's API does not change at all, you still load your template using $this->load()</p>
</div>