<div class="continer-fluid content-box docs-page">

    <div class="toc-mobile">
        <p class="toc-heading"><i class="icon-arrow-down left icon-white"></i> Table of Contents <i class="icon-arrow-down icon-white right"></i></p>
        <ul class="items">
			<li><a href="#" title="">Introduction</a></li>
			<li><a href="#" title="">Basic Routing</a></li>
			<li><a href="#" title="">Routes with parameters</a></li>
			<li><a href="#" title="">Routes with HTTP Method Requirements</a></li>
			<li><a href="#" title="">Routes with default parameters</a></li>
			<li><a href="#" title="">Routes with parameters (advanced)</a></li>
			<li><a href="#" title="">Controller Naming Scheme</a></li>
			<li><a href="#" title="">Example controller</a></li>
        </ul>
    </div>
	
	<div class="row-fluid">
		
		<article>
		
			<h1>Templating</h1>
			<p class="section-title">Introduction</p>
			<p>Content coming shortly</p>
			<p class="section-title">Basic Routing</p>
			<p>The homepage route</p>
			<pre><code>
Homepage:
	pattern:  /
	defaults: { _controller: "Application:Index:index"}
			</code></pre>
			
			<p>The the blog homepage route</p>
			<pre><code>
Blog_Index:
	pattern:  /blog
	defaults: { _controller: "Application:Blog:index"}
			</code></pre>
			
			<p class="section-title">Routes with parameters</p>
			<p>The following example is basically /blog/* where the wildcard is the value given to <b>title</b>. If the URL was <b>/blog/using-ppi2</b> then the <b>title</b> variable gets the value <b>using-ppi2</b>, which you can see being used in the Example Controller section below.</p>
			<pre><code>
Blog_Show:
	pattern: /blog/{title}
	defaults: { _controller: "Application:Blog:show"}
			</code></pre>
			
			<p class="section-title">Routes with HTTP Method Requirements</p>
			<p>Only form submits using POST will trigger this route. This means you dont have to check this kind of stuff in your controller.</p>
			<pre><code>
Blog_EditSave:
	pattern: /blog/edit/{id}
	defaults: { _controller: "Application:Blog:edit"}
	requirements:
		_method: POST
			</code></pre>
			
			<p class="section-title">Routes with default parameters</p>
			<p>This example optionally looks for the {pageNum} parameter, if it's not found it defaults to 1</p>
			<pre><code>
Blog_Show:
	pattern: /blog/{pageNum}
	defaults: { _controller: "Application:Blog:index", pageNum: 1}
			</code></pre>
			
			<p></p>
			
			<p class="section-title">Routes with parameters (advanced)</p>
			<p>Checking if the {pageNum} parameter is numerical. Checking if the {lang} parameter is <b>en</b> or <b>de</b></b></del></p>
			<pre><code>
Blog_Show:
	pattern: /blog/{lang}/{pageNum}
	defaults: { _controller: "Application:Blog:index", pageNum: 1, lang: en}
	requirements:
		id:  \d+
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
			
			<p class="section-title">Controller Naming Scheme</p>
			<p>As you may have noticed, every route has a <b>_controller</b> key, this is the value specifying with controller/action to execute.</p>
			<p>The syntax is: <b>modulename</b>:<b>controllername</b>:<b>methodname</b></p>
			<p>This means that within the Application module, it instantiates the Blog controller, and runs the showAction method on the controller.</p>
			<p><b>Application:Blog:show</b> => <b>/modules/Application/Controller/Blog->showAction()</b></p>
			<p><b>Application:Blog:editsave</b> => <b>/modules/Application/Controller/Blog->editsaveAction()</b></p>
			
			<p class="section-title">Example controller</p>
			<p>Here is an example blog controller, based on some of the routes provided above.</p>
			<pre><code>
&lt;?php
namespace Application\Controller;

use PPI\Module\Controller as BaseController;

class Blog extends BaseController {

	public function indexAction() {
                
        // Get all the blog posts
		$posts = $this->getBlogStorage()->getAll();
                
        // Render our main blog page, passing in our $posts to get rendered. 
		$this->render('Application:blog:index.html.php', compact('posts'));
	}

	public function showAction() {
				
		// Get {title} from the Blog_Show route
		$blogTitle = $this->getRouteParam('title');
				
		// Obtain a blog post by its $title
		$blogPost  = $this->getBlogStorage()->getByTitle($blogTitle);
                
        // Load up our template and send $blogPost there to get rendered
		return $this->render('Application:blog:show.html.php', compact('blogPost'));
	}

	public function editsaveAction() {
				
		// Get all post values
		$blogData = $this->post();
				
		// Get {id} from the Blog_EditSave route
		$blogID   = $this->getRouteParam('id');
				
		// Update the blog record
		$this->getBlogStorage()->update($blogData, array('id' => $blogID));
				
		// Reverse route lookup, specifying route Name instead of the URI
		$this->redirectToRoute('Blog_Index');
	}
}
			</code></pre>
		</article>
		
	</div>
</div>