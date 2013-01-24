<!---- move this to the about page ---->
<!--As you may already know, PPI is a meta framework, it abstracts the best of Zend framework 2 and Symfony 2, but making the app development process very simple and yet powerful.-->
<!--Our approach is to have a robust core, a very straightforward development process and a low learning curve, so developers around the world can benefit from it.-->
<!---- move this to the about page ---->

<h4>What are we going to cover ?</h4>
<p>In this article, we're going to learn how to work with the framework as a whole by making a module, controller, routes, templates (views) and services by writing a real-world application. In order to achieve this we are going to use the foursquare API and then APC for caching the API lookups. We will plot the venues from FourSquare in Google Maps for display.</p> 

<h4>What functionality will we achieve ?</h4>
<p>The purpose of this module is to place foursquare venues on a google map based on your current location as a user.</p>

<p class="note">If you are as desperate as us to try this out and want to see the code instead of reading the article, you can grab the actual module here: <a href="https://github.com/ppi/foursquare-tutorial-module" title="https://github.com/ppi/foursquare-tutorial-module" target="_blank">https://github.com/ppi/foursquare-tutorial-module</a>.</p>

<h4>Preparing the skeleton app</h4>
<p>We are assuming that you have already setup the skeleton application (<a href="http://www.ppi.io/docs/getting-started.html" title="details here">details here</a>) and that you already have the credentials in order to use the FourSquare API (If not, grab them here: <a href="https://developer.foursquare.com" target="_blank">https://developer.foursquare.com</a>).</p>

<h4>Creating the FourSquare Module</h4>
<p>First of all, let's create the foursquare module, for that, open your terminal, change to your ppi skeleton app’s directory and run the following command:</p>
<script src="https://gist.github.com/4498280.js"></script>
    
<p>This will ask you to confirm the modules directory path, just press enter and you should see something like this</p>
<script src="https://gist.github.com/4617112.js"></script>
    
<p>Now update your <b>./app/modules.config.php</b> file by adding <b>FourSquareModule</b> onto the end, it should look something like this:</p>
<script src="https://gist.github.com/4617134.js"></script>

<h4>Creating the Map</h4>
    
<h5>Adding the Route</h5>
<p>First of all, we need to add a route, so go ahead and edit your <b>./FourSquareModule/resources/config/routes.yml</b> file</p>
<script src="https://gist.github.com/4559285.js"></script>

<h5>The Controller</h5>
<p>Now, we are going to load the Map on our view, so, let's edit our Controller's index action by updating your <b>./FourSquareModule/Controller/Index.php</b> file.</p>
<script src="https://gist.github.com/4559122.js"></script>

<h5>Creating the Views</h5>
<p>
    Let's edit the <b>./FourSquareModule/resources/views/index.html.php</b> view file and add the following code:
</p>
<script src="https://gist.github.com/4491599.js"></script>

<h5>Adding some style</h5>
<p>We need to add a height and width for our Map container so go ahead and add the following CSS to the <b>./public/foursquare/css/index.css</b> file:</p>
<script src="https://gist.github.com/4498274.js"></script>

<h5>Implementing the Google Maps API </h5>

<p>Next, lets implement the Google Maps API in order to show the map on our view:</p>
<script src="https://gist.github.com/4559462.js"></script>

<p>Now, you can point your browser to <b>http://yourhost/foursquare-tutorial/public/foursquare/</b>. You should see a page similar to Figure 1 below.</p>
<p class="note">We are essentially loading a google map with geolocation enabled and you should hopefully be taken to where you live on the map with no foursquare integration yet.</p>
<figure>
    <img src="<?=$view['assets']->getUrl('blog/images/foursquare-1.png');?>" />
    <figcaption class="foursquare-figure-1">Figure 1 - Google Maps API</figcaption>
</figure>

<h3></h3>

<h4>Setting up foursquare: Adding foursquare credentials</h4>
<!--<p>So we have our controller and it’s using a service named ‘foursquare.handler’, but where does this exist? We create this in our module’s Module.php class. Definitely familiarise yourself with the Modules <a href="http://www.ppi.io/docs/modules.html" target="_blank" title="documentation">documentation</a>.</p>-->
<p>First, lets update our config.php file to store your foursquare secure credentials to talk to the foursquare API. So in your <b>./FourSquareModule/resources/config/config.php</b> file add the following code:</p>

<p class="note">Replace the placeholders with your own foursquare credentials.</p>
<script src="https://gist.github.com/4491440.js"></script>

<h4>Implementing the API calls</h4>
<p>The majority of our work  will not be done in a framework-specific layer, like a controller. It's will be in a generic PHP class that can be used from any part of the project. You can even take this class and use it in any PHP project as long as you pass in the dependencies it requires, such as config keys and the cache library, read on to understand more. </p>
<p>In the following <b>ApiHandler</b> class we have pre-selected some random categoryids for you, to fetch some venues from foursquare. In our getVenues() function we're making the calls to foursquare's API and fetching the venues from a given location. We then store the results in our injected <b>$this->cache</b> object for later re-use.</p>
    
<p>Go ahead and create the file: <b>./FourSquareModule/Classes/ApiHandler.php</b> put the following contents into it:</p></p>
<script src="https://gist.github.com/4491584.js"></script>

<h4>Building our service</h4>
<p>We're not going to directly access ApiHandler from our controller class, it's going to be set up as a <a href="<?=$view['router']->generate('DocsIndex', array('page' => 'services'));?>" title="" target="_blank">service</a>. In your <b>./modules/FourSquareModule/Module.php</b> file's <b>getServiceConfig()</b> method add the following code:</p>
<script src="https://gist.github.com/4491612.js"></script>

<h4>Connecting the dots</h4>
<p><b>The controller and routes</b></p>
<p>We need a route and corresponding controller action that can respond to the user's ajax call once the google map loads to initiate API calls to foursquare and return venues to be placed onto the map.</p>
<p>Here is our new route, update your <b>./FourSquareModule/resources/config/routes.yml</b> file by adding:</p>
<script src="https://gist.github.com/4491607.js"></script>

<p>Here is our updated controller with our new <b>getVenuesAction()</b> action, update the following file: <b>./FourSquareModule/Controller/Index.php</b> replacing what is already in there:</p>
<script src="https://gist.github.com/4491602.js"></script>

<h4>Plotting the venues on a google map</h4>

<p>The following javascript code listed above is pretty simple, what this does is:</p>
<ol>
    <li>Get the user's location if it can, if the browser doesn't have those capabilities then it uses a default location.</li>
    <li>Create a Map using the Google Maps API.</li>
    <li>Performs an AJAX call to the controller in order to fetch the venues by giving it lat/long coordinates.</li>
    <li>After getting the JSON Object back from the ajax call it process it and plots each venue on the map.</li>
</ol>
    
<p>Go ahead and click on the following link and replace what's in your <b>/public/foursquare/js/index.js</b> file with the content of the following gist link.</li></p>
<p class="note">As the size of the javascript file is now very large we don't want to include it in this article. You can view it <a href="https://gist.github.com/4491595" title="View index.js" target="_blank">here</a></p>

<h4>Let's make it happen!</h4>
<p>Now browse to <b>/foursquare/</b> in your application. This will trigger <b>Foursquare_Index</b> route and load the map for you. An ajax call occurs in the background and within a few seconds you'll see the markets drop onto the map. You should see something similar to Figure 2 shown below:</p>

<figure>
    <img src="<?=$view['assets']->getUrl('blog/images/foursquare-2.png');?>" />
    <figcaption class="foursquare-figure-2">Figure 2 - Plotting FourSquare venues using the Google Maps API.</figcaption>
</figure>

<h4>What have we learned so far?</h4>
<p>
To summarise, we have learned how to create and use the modules component. We also learned how to use services in order to encapsulate the API code and use it via Controllers. We have learned how to render views, specify custom css/js templates within them and extend base views. We also learned how to integrate javascript and run ajax calls to a controller to get json responses back.
Hopefully, this article clarifies the development workflow of the framework and gives you a starting point to improve your development skills in a structured, maintainable and simple way.
</p>

<h4>References</h4>
<p>Here are a series of links that contain information supplementary to what we covered above:</p>
<ul>
    <li>Skeleton app: <a href="http://www.ppi.io/docs/getting-started.html" target="_blank" title="http://www.ppi.io/docs/getting-started.html">http://www.ppi.io/docs/getting-started.html</a> </li>
    <li>Modules: <a href="http://www.ppi.io/docs/modules.html" target="_blank" title="http://www.ppi.io/docs/modules.html">http://www.ppi.io/docs/modules.html</a> </li>
    <li>Routing: <a href="http://www.ppi.io/docs/routing.html" target="_blank" title="http://www.ppi.io/docs/routing.html">http://www.ppi.io/docs/routing.html</a> </li>
    <li>Controllers: <a href="http://www.ppi.io/docs/controllers.html" target="_blank" title="http://www.ppi.io/docs/controllers.html">http://www.ppi.io/docs/controllers.html</a> </li>
    <li>Templating: <a href="http://www.ppi.io/docs/templating.html" target="_blank" title="http://www.ppi.io/docs/templating.html">http://www.ppi.io/docs/templating.html</a> </li>
<!--Services: -->
</ul>
