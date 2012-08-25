<div class="continer-fluid content-box docs-page">

<div class="toc-mobile">
	<p class="toc-heading"><i class="icon-arrow-down left icon-white"></i> Table of Contents <i class="icon-arrow-down icon-white right"></i></p>
	<ul class="items">
		<li><a href="#introduction" title="">Introduction</a></li>
		<li><a href="#details" title="">The Details</a></li>
		<li><a href="#basic-routes" title="">Basic Routes</a></li>
		<li><a href="#routes-with-parameters" title="">Routes with parameters</a></li>
		<li><a href="#routes-with-requirements" title="">Routes with requirements</a></li>
	</ul>
</div>

<div class="row-fluid">

<section>
    
    <a class="next-article top btn btn-green" href="controllers.html">Controllers <i class="icon-arrow-right icon-white"></i></a>

<h1>Routing</h1>

<p class="section-title" id='introduction'>Introduction</p>

<p>Routes are the rules that tell the framework what URLs map to what area of your application. The routing
	here is simple and expressive. We are using the Symfony2 routing component here, this means if you're a
	Symfony2 developer you already know what you're doing. If you don't know Symfony2 already, then learning
	the routes here will allow you to read routes from existing Symfony2 bundles out there in the wild. It's
	really a win/win situation.</p>

<p>Routes are an integral part of web application development. They make way for nice clean urls such as <b>/blog/view/5543</b>
	instead of something like <b>/blog.php?Action=view&article=5543</b>.</p>

<p></p>

<p>By reading this routing section you'll be able to:</p>
<ul>
	<li>Create beautiful clean routes</li>
	<li>Create routes that take in different parameters</li>
	<li>Specify complex requirements for your parameters</li>
	<li>Generate URLs within your controllers</li>
	<li>Redirect to routes within your controllers</li>
</ul>

<p class="section-title" id='details'>The Details</p>

<p>Lets talk about the structure of a route, you have a route name, pattern, defaults and requirements.</p>

<p><b>Name:</b><br>This is a symbolic name to easily refer to this actual from different contexts in your
	application. Examples of route names are <b>Homepage, Blog_View, Profile_Edit</b>. These are extremely
	useful if you want to just redirect a user to a page like the login page, you can redirect them to <b>User_Login</b>.
	If you are in a template file and want to generate a link you can refer to the route name and it will be
	created for you. The good part about this is you can maintain the routes via your <b>routes.yml</b> file
	and your entire system updates.</p>

<p><b>Pattern:</b><br>This is the URI pattern that if present will activate your route. In this example
	we're targeting the homepage. This is where you can specify params like <b>{id}</b> or <b>{username}</b>.
	You can make URLs like <b>/article/{id}</b> or <b>/profile/{username}</b></p>

<p><b>Defaults:</b><br>This is the important part, The syntax is <b>Module:Controller:action</b>. So if you
	specify <b>Application:Blog:show</b> then this will execute the following class path: <b>/modules/Application/Controller/Blog->showAction()</b>.
	Notice how the method has a suffix of Action, this is so you can have lots of methods on your controller
	but only the ones ending in Action() will be executable from a route.</p>

<p><b>Requirements: </b><br>This is where you can specify things like the request method being POST or PUT.
	You can also specify rules for the parameters you created above in the <b>pattern</b> section. Such as
	{id} being numeric, or {lang} being in a whitelist of values such as <b>en</b>|<b>de</b>|<b>it</b>.</p>

<p>With all this knowledge in mind, take a look at all the different examples of routes below and come back
	up here for reference.</p>

<p class="section-title" id='basic-routes'>Basic Routes</p>
<pre><code>
Homepage:
    pattern: /
    defaults: { _controller: "Application:Index:index"}
    
Blog_Index:
    pattern: /blog
    defaults: { _controller: "Application:Blog:index"}
    
</code></pre>

<p class="section-title" id='routes-with-parameters'>Routes with parameters</p>

<p>The following example is basically /blog/* where the wildcard is the value given to <b>title</b>. If the
	URL was <b>/blog/using-ppi2</b> then the <b>title</b> variable gets the value <b>using-ppi2</b>, which
	you can see being used in the Example Controller section below.</p>
<pre><code>
Blog_Show:
    pattern: /blog/{title}
    defaults: { _controller: "Application:Blog:show"}
    
</code></pre>

<p>This example optionally looks for the {pageNum} parameter, if it's not found it defaults to 1</p>
<pre><code>
Blog_Show:
    pattern: /blog/{pageNum}
    defaults: { _controller: "Application:Blog:index", pageNum: 1}

</code></pre>

<p class="section-title" id='routes-with-requirements'>Routes with requirements</p>

<p>Only form submits using POST will trigger this route. This means you dont have to check this kind of
	stuff in your controller.</p>
<pre><code>
Blog_EditSave:
    pattern: /blog/edit/{id}
    defaults: { _controller: "Application:Blog:edit"}
    requirements:
    _method: POST
    
</code></pre>

<p>Checking if the {pageNum} parameter is numerical. Checking if the {lang} parameter is <b>en</b> or
	<b>de</b></b></del></p>
<pre><code>
Blog_Show:
    pattern: /blog/{lang}/{pageNum}
    defaults: { _controller: "Application:Blog:index", pageNum: 1, lang: en}
    requirements:
    id: \d+
    lang: en|de
    
</code></pre>

<p>Checking if the page is a POST request, and that {id} is numerical</p>
<pre><code>
Blog_EditSave:
    pattern: /blog/edit/{id}
    defaults: { _controller: "Application:Blog:edit"}
    requirements:
    _method: POST
    id: \d+
    
</code></pre>

    
<a class="prev-article btn btn-green" href="modules.html"><i class="icon-arrow-left icon-white"></i> Modules</a>
<a class="next-article bottom btn btn-green" href="controllers.html">Controllers <i class="icon-arrow-right icon-white"></i></a>
                

</section>

</div>
</div>