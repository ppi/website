<?php $view->extend('BlogModule:blog:view.html.php'); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('mod/blog/blog.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/mustache.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('mod/blog/blog.js');?>"></script>
<?php $view['slots']->stop(); ?>

<?php $view['slots']->set('post_title', 'Showing local FourSquare venues with APC'); ?>

<!---- move this to the about page ---->
<!--As you may already know, PPI is a meta framework, it abstracts the best of Zend framework 2 and Symfony 2, but making the app development process very simple and yet powerful.-->
<!--Our approach is to have a robust core, a very straightforward development process and a low learning curve, so developers around the world can benefit from it.-->
<!---- move this to the about page ---->

<h4>What are we going to cover ?</h4>
<p>In this article, we're going to learn how to work with the framework as a whole by making a module, controller, routes, templates (views) and services, by writing a real-world application. In order to do so, we are going to use the foursquare API, APC for caching API lookups, Google Maps API to plot foursquare venues on the map.</p> 

<h4>What functionality will we be achieving ?</h4>
<p>The purpose of this module is to place foursquare venues on a google map based on your current location as a user.</p>

<p class="note">If you are as desperate as us to try this out, and want to see the code instead of reading the article, you can see the actual module here (https://github.com/alfrekjv/FourSquareModule).</p>

<h4>Preparing the skeleton app</h4>
<p>
We are assuming that you already have checked out the skeleton application and have it working on your development environment before continuing. If not, then refer to the proper <a href="http://www.ppi.io/docs/getting-started.html" target="_blank" title="documentation">documentation</a> , and then come back here.
Another assumption is that you already have the credentials in order to use the foursquare API, if not then refer to <a href="https://developer.foursquare.com" target="_blank" title="https://developer.foursquare.com">https://developer.foursquare.com</a> , and then come back here.
</p>

<h4>Creating the FourSquare Module</h4>
<p>First of all, let's create the foursquare module, for that, open your terminal, change to your ppi skeleton app’s directory and run the following command:</p>
<p class="well">./app/console module:create FourSquareModule</p>

<h4>Adding foursquare credentials</h4>
<p>So we have our controller and it’s using a service named ‘foursquare.handler’, but where does this exist? We create this in our module’s Module.php class. Definitely familiarise yourself with the Modules <a href="http://www.ppi.io/docs/modules.html" target="_blank" title="documentation">documentation</a>.</p>
<p>Before we jump right into making our service, it needs some config data i.e: your foursquare secure credentials to talk to foursquare, so in your <b>./FourSquareModule/resources/config/config.php</b> file add the following code</p>

<p class="note">obviously replace the placeholders with your actual foursquare credentials.</p>
<script src="https://gist.github.com/4491440.js"></script>



<h4>Implementing the API calls</h4>
<p>The majority of our work is not going to be done in a framework-specific layer, like a controller. It’s going to be in a generic PHP class that can be used from any part of the project. You can even take this class and use it in any PHP project as long as you pass in the dependencies it requires, such as config keys and the cache library, read on to understand more. </p>
<p>In the following ApiHandler class we have pre-selected some random categoryids to fetch some venues from, from foursquare. In our getVenues() function we're actually doing the call to foursquare's API and fetching the venues from a given location. We store the results in our injected $this->cache  object for later re-use. If this lookup occurs twice, the cache key will match and the cache->exists() call will be true and it will fetch from the cache rather than perform another live API lookup.</p>
    
<p>Go ahead and create the file: <b>./FourSquareModule/Classes/ApiHandler.php</b> put the following contents into it:</p></p>
<script src="https://gist.github.com/4491584.js"></script>

<h4>Building our service</h4>
<p>
In the module’s getServiceConfig() function, we construct the service, by using setter methods we pass in the dependencies that this service requires in order to do its API calls. Some things it needs are config data and cache drivers. Each of your services are encapsulated within a lazy-loaded Closure. This means the code will never be executed until invoked via a getService() call in a controller or via another service. 
Now make sure the following code is part of your <b>./FourSquareModule/Module.php</b> file:
</p>
<script src="https://gist.github.com/4491612.js"></script>

<h4>Connecting the dots</h4>
<p><b>Implementing the controller and routes</b></p>
<p>
We need a controller that can respond to the user's request and initiate the API calls. We are going to create two actions in our controller, the first is the action just loads the page. The second is an AJAX call that the javascript makes to lazy-load in some venues.
Here are our routes, update your <b>./FourSquareModule/resources/config/routes.yml</b> file by adding:
</p>
<script src="https://gist.github.com/4491607.js"></script>

<p>Here are our controller actions, update the following file: <b>./FourSquareModule/Controller/Index.php</b> file by adding:</p>
<script src="https://gist.github.com/4491602.js"></script>

<h4>Creating the Views</h4>
<p>
In the following template file we have a few distinct sections here. The first i the extend call, which extends the base template defined in ./app/views/base.html.php. The second is us extending the include_css and include_js_body blocks to inject custom stylesheets and javascript in the parent base template. The last part is plain old HTML with an id=”map” which is the target element for our mapping Javascript.
Let’s edit the <b>./FourSquareModule/resources/views/index.html.php</b> view file and add the following code:
</p>
<script src="https://gist.github.com/4491599.js"></script>

<h4>Plotting the venues on a google maps</h4>
<p>The following javascript code listed above is pretty simple, what is does is:</p>
<ol>
    <li>Get the user’s location if it can, if the browser doesn’t have that capabilities then it uses a default location.</li>
    <li>Create a Map using the Google Maps API.</li>
    <li>Does an AJAX call to the controller in order to fetch the venues, by giving it lat/lng coordinated</li>
    <li>After getting the JSON Object back from the ajax call, it process it and plots each venue on the map.</li>
    <li>Go ahead and add the following code in the /public/foursquare/js/index.js file.</li>
</ol>
<script src="https://gist.github.com/4491595.js"></script>

<h4>What have we learned so far?</h4>
<p>
In quick words, we have learned how to create and use the modules component. We also learned how to use services in order to encapsulate the API code and use it via Controllers. We have learned how to render views, specify custom css/js templates within them and extendng base views. We also learned how to integrate use javascript and run ajax calls to a controller to get json responses back.
Hopefully, this article clarifies the development workflow of the framework, and helps you as a start point to improve your development skills in a structured, maintainable and simple way.
</p>

<h4>References</h4>
<p>Here are a series of links that contain information supplementary to what was covered above</p>

<ul>
    <li>Skeleton app: <a href="http://www.ppi.io/docs/getting-started.html" target="_blank" title="http://www.ppi.io/docs/getting-started.html">http://www.ppi.io/docs/getting-started.html</a> </li>
    <li>Modules: <a href="http://www.ppi.io/docs/modules.html" target="_blank" title="http://www.ppi.io/docs/modules.html">http://www.ppi.io/docs/modules.html</a> </li>
    <li>Routing: <a href="http://www.ppi.io/docs/routing.html" target="_blank" title="http://www.ppi.io/docs/routing.html">http://www.ppi.io/docs/routing.html</a> </li>
    <li>Controllers: <a href="http://www.ppi.io/docs/controllers.html" target="_blank" title="http://www.ppi.io/docs/controllers.html">http://www.ppi.io/docs/controllers.html</a> </li>
    <li>Templating: <a href="http://www.ppi.io/docs/templating.html" target="_blank" title="http://www.ppi.io/docs/templating.html">http://www.ppi.io/docs/templating.html</a> </li>
<!--Services: -->
</ul>