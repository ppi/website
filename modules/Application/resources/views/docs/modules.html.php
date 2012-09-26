<?php
$toc = array(
    'introduction' => 'Introduction',
    'module-class' => 'The Module.php class',
    'init' => 'Init',
    'configuration' => 'Configuration',
    'routing' => 'Routing',
    'conclusion' => 'Conclusion'
);
?>

<div id="toc-data"><?=json_encode($toc);?></div>

<div class="content-box docs-page">

    <div class="row-fluid">

        <section class='content'>

            <h1>Modules</h1>

            <a class="next-article top btn btn-green" href="<?=$view['router']->generate('DocsIndex', array('page' => 'routing'));?>">Routing <i class="icon-arrow-right icon-white"></i></a>

            <p id='introduction' class="section-title">Introduction</p>

            <p>By default, one module is provided with the SkeletonApp, named "Application". It provides a simple
                route pointing to the homepage. A simple controller to handle the "home" page of the application.
                This demonstrates using routes, controllers and views within your module.</p>

            <p id='module-structure' class="section-title">Module Structure</p>

            <p>Your module starts with Module.php. You can have configuration on your module. Your can have routes which result in controllers getting dispatched. Your controllers can render view templates.</p>
            <pre><code>
modules/

    Application/
                
        Module.php
    
        Controller/
            Index.php
        
        resources/
        
            views/
                index/index.html.php
                index/list.html.php
        
            config/
                config.php
                routes.yml
        
            </code></pre>

                <p id='module-class' class="section-title">The Module.php class</p>
                <p>Every PPI module looks for a Module.php class file, this is the starting point for your module. </p>
                
            <pre><code>
&lt;?php
namespace Application;

use PPI\Module\Module as BaseModule
use PPI\Autoload;

class Module extends BaseModule {
    
    protected $_moduleName = 'Application';
    
    function init($e) {
        Autoload::add(__NAMESPACE__, dirname(__DIR__));
    }

}
            </code></pre>

                <p id='init' class="section-title">Init</p>

                <p>The above code shows you the Module class, and the all important <b>init()</b> method. Why is it
                    important? If you remember from <b>The Skeleton Application</b> section previously, we have defined
                    in our <b>modules.config.php</b> config file an <b>activeModules</b> option, when PPI is booting up
                    the modules defined activeModules it looks for each module's init() method and calls it.</p>

                <p class="tip">The init() method is run for every page request, and should not perform anything heavy.
                    It is considered bad practice to utilize these methods for setting up or configuring instances of
                    application resources such as a database connection, application logger, or mailer.</p>

                <p id='modules-resources' class="section-title">Your modules resources</p>

                <p>/Application/resources/ is where non-PHP-class files live such as config files (resources/config) and
                    views (resources/views). We encourage you to put your own custom config files in /resources/config/
                    too.</p>

                <p id='configuration' class="section-title">Configuration</p>

                <p>Expanding on from the previous code example, we're now adding a getConfig() method. This must return
                    a raw php array. All the modules with getConfig() defined on them will be merged together to create
                    'modules config' and this is merged with your global app's configuration file at <b>/app/app.config.php</b>.
                    Now from any controller you can get access to this config by doing <b>$this->getConfig()</b>. More
                    examples on this later in the Controllers section.</b></p>
            <pre><code>
&lt;?php
class Module extends BaseModule {

protected $_moduleName = 'Application';

    public function init($e) {
        Autoload::add(__NAMESPACE__, dirname(__DIR__));
    }
    
    public function getConfig() {
        return include(__DIR__ . '/resources/config/config.php');
    }

}
            </code></pre>

                <p id='routing' class="section-title">Routing</p>

                <p>The getRoutes() method currently is re-using the Symfony2 routing component. It needs to return a
                    Symfony RouteCollection instance. This means you can setup your routes using PHP, YAML or XML.</p>
            
            <pre><code>
class Module extends BaseModule {

    protected $_moduleName = 'Application';
    
    public function init($e) {
        Autoload::add(__NAMESPACE__, dirname(__DIR__));
    }
    
    /**
    * Get the configuration for this module
    *
    * @return array
    */
    public function getConfig() {
        return include(__DIR__ . '/resources/config/config.php');
    }
    
    /**
    * Get the routes for this module, in YAML format.
    *
    * @return \Symfony\Component\Routing\RouteCollection
    */
    public function getRoutes() {
        return $this->loadYamlRoutes(__DIR__ . '/resources/config/routes.yml');
    }

}
            </code></pre>

                <p id='conclusion' class="section-title">Conclusion</p>

                <p>So, what have we learnt in this section so far? We learnt how to initialize our module, and how to
                    obtain configuration options and routes from it. </p>

                <p>PPI will boot up all the modules and call the getRoutes() method on them all. It will merge the
                    results together and match them against a request URI such as <b>/blog/my-blog-title</b>. When a
                    matching route is found it dispatches the controller specified in that route.</p>

                <p>Lets move onto the <b>Routing</b> section to check out what happens next.</p>
            </article>

            <a class="prev-article btn btn-green" href="<?=$view['router']->generate('DocsIndex', array('page' => 'application'));?>"><i class="icon-arrow-left icon-white"></i> The Skeleton Application</a>
            <a class="next-article bottom btn btn-green" href="<?=$view['router']->generate('DocsIndex', array('page' => 'routing'));?>">Routing <i class="icon-arrow-right icon-white"></i></a>

        </section>

    </div>
</div>