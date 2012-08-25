<div class="continer-fluid content-box docs-page">

<div class="toc-mobile">
	<p class="toc-heading"><i class="icon-arrow-down left icon-white"></i> Table of Contents <i class="icon-arrow-down icon-white right"></i></p>
	<ul class="items">
		<li><a href="#introduction" title="">Introduction</a></li>
		<li><a href="#details" title="">The Details</a></li>
		<li><a href="#basic-routes" title="">Basic Routes</a></li>
		<li><a href="#routes-with-parameters" title="">Routes with parameters</a></li>
		<li><a href="#routes-with-requirements" title="">Routes with requirements</a></li>
		<li><a href="#example-controllers" title="">Example controller</a></li>
		<li><a href="#generating-urls-using-routes" title="">Generating urls using routes</a></li>
		<li><a href="#redirecting-to-routes" title="">Redirecting to routes</a></li>
		<li><a href="#getting-route-parameters-in-the-controllers" title="">Getting route parameters in the controller</a></li>
	</ul>
</div>

<div class="row-fluid">

<section>

<h1>Controllers</h1>

<p class="section-title" id='introduction'>Introduction</p>
<p>So what is a controller? A controller is just a PHP class, like any other that you've created before, but the intention of it, is to have a bunch of methods on it called <b>actions</b>. The idea is, for each <b>route</b> in your system <b>action method</b>. Examples of action methods would be your <b>homepage</b> or <b>blog post page</b>. The job of a controller is to perform a bunch of code and respond with some HTTP content to be sent back to the browser. The response could be a HTML page, a JSON array, XML document or to redirect somewhere. Controllers in PPI are ideal for making anything from web services, to web applications, to just simple html-driven websites.</p>
    
<p>Lets quote something we said in the last chapter's introduction section</p>
<blockquote><p><b>Defaults:</b><br>This is the important part, The syntax is <b>Module:Controller:action</b>. So if you
	specify <b>Application:Blog:show</b> then this will execute the following class path: <b>/modules/Application/Controller/Blog->showAction()</b>.
	Notice how the method has a suffix of Action, this is so you can have lots of methods on your controller
	but only the ones ending in Action() will be executable from a route.</p>
</blockquote>
    


<p class="section-title" id='example-controllers'>Example controller</p>
    
<p>Review the following route that we'll be matching.</p>
<pre><code>
Blog_Show:
    pattern: /blog/{id}
    defaults: { _controller: "Application:Blog:show"}
    
</code></pre>
    
<p>So lets presume the route is <b>/blog/show/{id}</b>, and look at what your controller would look like. Here is an example blog controller, based on some of the routes provided above.</p>
    
    
<pre><code>
&lt;?php
namespace Application\Controller;

use Application\Controller\Shared as BaseController;

class Blog extends BaseController {

    public function showAction() {
    
        $blogID = $this->getRouteParam('id');
    
        $bs = $this->getBlogStorage();
    
        if(!$bs->existsByID($blogID)) {
            $this->setFlash('error', 'Invalid Blog ID');
            return $this->redirectToRoute('Blog_Index');
        }
    
        // Get the blog post for this ID
        $blogPost = $bs->getByID($blogID);
        
        // Render our main blog page, passing in our $blogPost article to be rendered
        $this->render('Application:blog:show.html.php', compact('blogPost'));
    }

}
</code></pre>

<p class="section-title" id='generating-urls-using-routes'>Generating urls using routes</p>
<p>Here we are still executing the same route, but making up some urls using route names</p>
<pre><code>
&lt;?php
namespace Application\Controller;

use Application\Controller\Shared as BaseController;

class Blog extends BaseController {

    public function showAction() {
    
        $blogID = $this->getRouteParam('id');
    
        // pattern: /about
        $aboutUrl = $this->generateUrl('About_Page');
        
        // pattern: /blog/show/{id}
        $blogPostUrl = $this->generateUrl('Blog_Post', array('id' => $blogID);

    }
}

</code></pre>
    
<p class="section-title" id='redirecting-to-routes'>Redirecting to routes</p>
<p>An extremely handy way to send your users around your application is redirect them to a specific route.</p>
<pre><code>
&lt;?php
namespace Application\Controller;

use Application\Controller\Shared as BaseController;

class Blog extends BaseController {

    public function showAction() {
    
        // Send user to /login, if they are not logged in
        if(!$this->isLoggedIn()) {
            return $this->redirectToRoute('User_Login');
        }
    
        // go to /user/profile/{username}
        return $this->redirectToRoute('User_Profile', array('username' => 'ppi_user'));
    
    }
}
</code></pre>
    
<p class="section-title" id='post-cookie-values'>Working with POST values, QueryString parameters, Server Variables, Cookies &amp; Session values</p></p>

<pre><code>
&lt;?php
namespace Application\Controller;

use Application\Controller\Shared as BaseController;

class Blog extends BaseController {

    public function postAction() {
    
        $this->getPost()->set('myKey', 'myValue');
    
        var_dump($this->getPost()->get('myKey')); // string('myValue')
    
        var_dump($this->getPost()->has('myKey')); // bool(true)
    
        var_dump($this->getPost()->remove('myKey'));
        var_dump($this->getPost()->has('myKey')); // bool(false)
    
        // To get all the post values
        $postValues = $this->post();
    
    }

    // The URL is /blog/?action=show&id=453221
    public function queryStringAction() {
    
        var_dump($this->getQueryString()->get('action')); // string('show')
        var_dump($this->getQueryString()->has('id')); // bool(true)
    
        // Get all the query string values
        $allValues = $this->queryString();
    
    }
    
    public function serverAction() {
        
        $this->getServer()->set('myKey', 'myValue');
    
        var_dump($this->getServer()->get('myKey')); // string('myValue')
    
        var_dump($this->getServer()->has('myKey')); // bool(true)
    
        var_dump($this->getServer()->remove('myKey'));
        var_dump($this->getServer()->has('myKey')); // bool(false)
    
        // Get all server values
        $allServerValues =  $this->server();
        
    }
    
    public function cookieAction() {
    
        $this->getCookie()->set('myKey', 'myValue');
    
        var_dump($this->getCookie()->get('myKey')); // string('myValue')
    
        var_dump($this->getCookie()->has('myKey')); // bool(true)
    
        var_dump($this->getCookie()->remove('myKey'));
        var_dump($this->getCookie()->has('myKey')); // bool(false)
    
        // Get all the cookies
        $cookies = $this->cookies();
    
    }
    
    public function sessionAction() {
    
        $this->getSession()->set('myKey', 'myValue');
    
        var_dump($this->getSession()->get('myKey')); // string('myValue')
    
        var_dump($this->getSession()->has('myKey')); // bool(true)
    
        var_dump($this->getSession()->remove('myKey'));
        var_dump($this->getSession()->has('myKey')); // bool(false)
    
        // Get all the session values
        $allSessionValues = $this->session();
    
    }
    
}
    
</code></pre>
    
    

    <a class="prev-article btn btn-green" href="templating.html"><i class="icon-arrow-left icon-white"></i> Templating</a>
                

</section>

</div>
</div>