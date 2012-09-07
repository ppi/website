<div class="continer-fluid content-box docs-page">

<div class="toc-mobile">
	<p class="toc-heading"><i class="icon-arrow-down left icon-white"></i> Table of Contents <i class="icon-arrow-down icon-white right"></i></p>
	<ul class="items">
		<li><a href="#introduction" title="Introduction">Introduction</a></li>
		<li><a href="#example-controllers" title="Example controller">Example controller</a></li>
	</ul>
</div>

<div class="row-fluid">

<section>
    
<!--<a class="next-article top btn btn-green" href="controllers.html">Controllers <i class="icon-arrow-right icon-white"></i></a>-->

<h1>Templating</h1>

<p class="section-title" id='introduction'>Introduction</p>
<p>As discovered in the previous chapter, a controller's job is to process each HTTP request that hits your web application. Once your controller has finished its processing it usually wants to generate some output content. To achieve this it hands over responsibility to the templating engine. The templating engine will be passed its data by the controller, and then generate the output needed.</p>
<p>In this chapter you'll learn:</p>
<ul>
    <li>How to load templates from your controller</li>
    <li>How to pass data into templates</li>
    <li>How to extend a parent template</li>
    <li>How to use template helpers</li>
</ul>
    

<p class="section-title" id='example-controllers'>Example Scenario</p>
<p>Consider the following scenario. We have the route <b>Blog_Show</b> which executes the action <b>"Application:Blog:show"</b>. We then load up a template which is designed to show the user their blog post.</p>
<pre><code>
Blog_Show:
    pattern: /blog/{id}
    defaults: { _controller: "Application:Blog:show"}
    
</code></pre>
    
<pre><code>
&lt;?php
namespace Application\Controller;

use Application\Controller\Shared as BaseController;

class Blog extends BaseController {

    public function showAction() {
    
        $blogID = $this->getRouteParam('id');
        $bs     = $this->getBlogStorage();
    
        if(!$bs->existsByID($blogID)) {
            $this->setFlash('error', 'Invalid Blog ID');
            return $this->redirectToRoute('Blog_Index');
        }
    
        // Get the blog post for this ID
        $blogPost = $bs->getByID($blogID);
        
        // Render our blog post page, passing in our $blogPost article to be rendered
        $this->render('Application:blog:show.html.php', compact('blogPost'));
    }
}
    
</code></pre>
    
<p>Observe the above <b>render()</b> method </p>

<!--<a class="next-article bottom btn btn-green" href="controllers.html">Controllers <i class="icon-arrow-right icon-white"></i></a>-->
<a class="prev-article btn btn-green" href="controllers.html"><i class="icon-arrow-left icon-white"></i> Controllers</a>

</section>

</div>
</div>