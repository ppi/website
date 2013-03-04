<h4>What are we going to cover?</h4>
<p>In this article, we're going to learn how to work with the framework as a whole by writing a real-world application: making a module, controller, routes, templates (views) and services. In order to achieve this we are will use the Foursquare API, and APC for caching the API lookups. We will plot venues from Foursquare in Google Maps for display.</p> 

<h4>What functionality will we achieve?</h4>
<p>The purpose of this module is to place Foursquare venues on a Google Map based on your current location as a user.</p>

<p class="note">If you are as desperate to try this out as we are, and want to see the code instead of reading the article, you can grab the actual module here: <a href="https://github.com/ppi/foursquare-tutorial-module" title="https://github.com/ppi/foursquare-tutorial-module" target="_blank">https://github.com/ppi/foursquare-tutorial-module</a>.</p>

<h4>Preparing the skeleton app</h4>
<p>We assume that you have already set up the skeleton application (<a href="http://www.ppi.io/docs/2.0/getting_started.html" title="details here">details here</a>) and that you have the credentials for the Foursquare API (If not, grab them here: <a href="https://developer.foursquare.com" target="_blank">https://developer.foursquare.com</a>).</p>

<h4>Creating the Foursquare Module</h4>
<p>First of all, let's create the Foursquare module. For that, open your terminal, change to your ppi skeleton app’s directory and run the following command:</p>
<script src="https://gist.github.com/4498280.js"></script>
    
<p>This will ask you to confirm the modules directory path. Just press enter and you should see something like this:</p>
<script src="https://gist.github.com/4617112.js"></script>
    
<p>Now update your <b>./app/modules.config.php</b> file by adding <b>FoursquareModule</b> onto the end. It should look something like this:</p>
<script src="https://gist.github.com/4617134.js"></script>

<h4>Creating the Map</h4>
    
<h5>Adding the Route</h5>
<p>First of all, we need to add a route. Go ahead and edit your <b>./modules/FoursquareModule/resources/config/routes.yml</b> file</p>
<script src="https://gist.github.com/4617315.js"></script>

<h5>The Controller</h5>
<p>Now, we are going to load the Map on our view, so edit your Controller's index action by updating the <b>./modules/FoursquareModule/Controller/Index.php</b> file.</p>
<script src="https://gist.github.com/4559122.js"></script>

<h5>Creating the Views</h5>
<p>
    Let's edit the <b>./modules/FoursquareModule/resources/views/index/index.html.php</b> view file and add the following code:
</p>
<script src="https://gist.github.com/4491599.js"></script>

<h5>Adding some style</h5>
<p>We need to add a height and width for our Map container so go ahead and add the following CSS to the <b>./public/foursquare/css/index.css</b> file:</p>
<script src="https://gist.github.com/4498274.js"></script>

<h5>Using the Google Maps API </h5>

<p>Next, lets use the Google Maps API in order to show the map on our view, add the following Javascript to the <b>./public/foursquare/js/index.js</b> file:</p>
<script src="https://gist.github.com/4559462.js"></script>

<p>Now, you can point your browser to <b>http://yourhost/foursquare-tutorial/public/foursquare/</b>. You should see a page similar to Figure 1 below.</p>
<p class="note">We are essentially loading a Google Map with geolocation enabled and you should hopefully be taken to where you live on the map with no Foursquare integration yet.</p>
<figure>
    <img src="<?=$view['assets']->getUrl('blog/images/foursquare-1.png');?>" />
    <figcaption class="foursquare-figure-1">Figure 1 - Google Maps API</figcaption>
</figure>

<p class="note">
    You can see a live demonstration of Figure 1 by clicking <a href="http://demos.ppi.io/foursquare/" target="_blank">here</a>
</p>

<h3></h3>

<h4>Setting up Foursquare: Adding Foursquare credentials</h4>
<p>First, lets update our <b>config.php</b> file to store your Foursquare secure credentials to talk to the Foursquare API. So in your <b>./modules/FoursquareModule/resources/config/config.php</b> file add the following code:</p>

<p class="note">Replace the placeholders with your own Foursquare credentials.</p>
<script src="https://gist.github.com/4491440.js"></script>

<h4>Implementing the API calls</h4>
<p>The majority of our work  will not be done in a framework-specific layer, like a controller. It's will be in a generic PHP class which can be used from any part of the project. You can even take this class and use it in any PHP project as long as you pass in the dependencies it requires — such as config keys and the cache library. Read on to understand more.</p>
<p>In the following <b>ApiHandler</b> class we have pre-selected some random categoryids for you, so you can fetch some venues from Foursquare. In our getVenues() function we're making the calls to Foursquare's API and fetching the venues from a given location. We then store the results in our injected <b>$this->cache</b> object for later re-use.</p>
    
<p>Go ahead and create the file: <b>./modules/FoursquareModule/Classes/ApiHandler.php</b>, and put the following contents into it:</p></p>
<script src="https://gist.github.com/4491584.js"></script>

<h4>Building our service</h4>
<p>We're not going to directly access ApiHandler from our controller class, it's going to be set up as a <a href="<?=$view['router']->generate('DocsIndex', array('page' => 'services'));?>" title="" target="_blank">service</a>. In your <b>./modules/FourSquareModule/Module.php</b> file's <b>getServiceConfig()</b> method add the following code:</p>
<script src="https://gist.github.com/4491612.js"></script>

<h4>Connecting the dots</h4>
<p><b>The controller and routes</b></p>
<p>We need a route and corresponding controller action that can respond to the user's Ajax call once the Google Map loads. It will initiate API calls to Foursquare and return venues to be placed onto the map.</p>
<p>Here is our new route. Update your <b>./modules/FoursquareModule/resources/config/routes.yml</b> file by adding:</p>
<script src="https://gist.github.com/4491607.js"></script>

<p>Here is our updated controller with our new <b>getVenuesAction()</b> action. Update <b>./modules/FoursquareModule/Controller/Index.php</b> replacing what is already in there:</p>
<script src="https://gist.github.com/4491602.js"></script>

<h4>Plotting the venues on a Google Map</h4>

<p>That bit of Javascript code above is pretty simple. Here's what it does:</p>
<ol>
    <li>Get the user's location if it can. If the browser doesn't have those capabilities then use a default location.</li>
    <li>Create a Map using the Google Maps API.</li>
    <li>Performs an Ajax call to the controller in order to fetch the venues, giving it lat/long coordinates.</li>
    <li>After getting a JSON object back from the Ajax call, process it and plot each venue on the map.</li>
</ol>
    
<p>Now replace your <b>./public/foursquare/js/index.js</b> file with the content of the following gist link:</p>
<p class="note">As the size of the Javascript file is now very large we don't want to include it in this article. You can <a href="https://gist.github.com/4491595" title="View index.js" target="_blank">view it here</a></p>

<h4>Let's make it happen!</h4>
<p>Now browse to <b>/foursquare/</b> in your application. This will trigger <b>Foursquare_Index</b> route and load the map for you. An Ajax call occurs in the background. Within a few seconds you'll see the markets drop onto the map. You should see something similar to Figure 2 shown below:</p>

<figure>
    <img src="<?=$view['assets']->getUrl('blog/images/foursquare-2.png');?>" />
    <figcaption class="foursquare-figure-2">Figure 2 - Plotting Foursquare venues using the Google Maps API.</figcaption>
</figure>

<p class="note">
    You can see a live demonstration of Figure 2 by clicking <a href="http://demos.ppi.io/foursquare/venues" target="_blank">here</a>
</p>

<h4>What have we learned so far?</h4>
<p>
To summarise, we have learned how to create and use the modules component. We also learned how to use services in order to encapsulate API code, and how to use them in our Controllers. We have learned how to render views, specify custom css/js templates within them and extend base views. We also learned how to integrate Javascript and run Ajax calls to a controller to get JSON responses back.
Hopefully, this article clarifies the development workflow of the PPI framework, and gives you a starting point to improve your development skills in a structured, maintainable and simple way.
</p>

<h4>References</h4>
<p>Here is a series of links that contain information supplementary to what we covered above:</p>
<ul>
    <li>Skeleton app: <a href="http://www.ppi.io/docs/2.0/getting_started.html" target="_blank" title="http://www.ppi.io/docs/2.0/getting_started.html">http://www.ppi.io/docs/2.0/getting-started.html</a> </li>
    <li>Modules: <a href="http://www.ppi.io/docs/2.0/modules.html" target="_blank" title="http://www.ppi.io/docs/2.0/modules.html">http://www.ppi.io/docs/2.0/modules.html</a> </li>
    <li>Routing: <a href="http://www.ppi.io/docs/2.0/routing.html" target="_blank" title="http://www.ppi.io/docs/2.0/routing.html">http://www.ppi.io/docs/2.0/routing.html</a> </li>
    <li>Controllers: <a href="http://www.ppi.io/docs/2.0/controllers.html" target="_blank" title="http://www.ppi.io/docs/2.0/controllers.html">http://www.ppi.io/docs/2.0/controllers.html</a> </li>
    <li>Templating: <a href="http://www.ppi.io/docs/2.0/templating.html" target="_blank" title="http://www.ppi.io/docs/2.0/templating.html">http://www.ppi.io/docs/2.0/templating.html</a> </li>
<!--Services: -->
</ul>
