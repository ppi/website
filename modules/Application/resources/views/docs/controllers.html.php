<?php
$toc = array(
    'introduction' => 'Introduction',
    'example-controllers' => 'Example controller',
    'generating-urls-using-routes' => 'Generating urls using routes',
    'redirecting-to-routes' => 'Redirecting to routes',
    'post-values' => 'Working with POST values',
    'query-string-params' => 'Working with QueryString parameters',
    'server-variables' => 'Working with server variables',
    'cookie-values' => 'Working with cookies',
    'session-values' => 'Working with session values',
    'config-values' => 'Working with the config',
    'is-method' => 'Working with the is() method',
    'ip-useragent' => 'Getting the users IP or UserAgent',
    'flash-messages' => 'Working with flash messages',
    'get-env' => 'Getting the current environment'
);

$pagingData = array(
    'prev' => array('title' => 'Controllers', 'href' => 'controllers.html'),
    'next' => array('title' => '', 'href' => '')
);

?>

<div id="toc-data" style="display: none;"><?=json_encode($toc);?></div>
<div id="paging-data" style="display: none"><?=json_encode($pagingData);?></div>

<div class="section-subbar clearfix">
    <a class="prev-page" title="Getting Started"><img src="<?=$view['assets']->getUrl('images/docs/previous-page.png');?>" alt="Previous"></a>
    <div class="main-title">Controllers</div>
    <a class="next-page" title="Modules"><img src="<?=$view['assets']->getUrl('images/docs/next-page.png');?>" alt="Previous"></a>
</div>
    
<div class="content-box docs-page">
    
    <section>
    
    <p class="section-title" id='introduction'>Introduction</p>
    <p>So what is a controller? A controller is just a PHP class, like any other that you've created before, but the intention of it, is to have a bunch of methods on it called <b>actions</b>. The idea is: each <b>route</b> in your system will execute an <b>action</b> method. Examples of action methods would be your <b>homepage</b> or <b>blog post page</b>. The job of a controller is to perform a bunch of code and respond with some HTTP content to be sent back to the browser. The response could be a HTML page, a JSON array, XML document or to redirect somewhere. Controllers in PPI are ideal for making anything from web services, to web applications, to just simple html-driven websites.</p>
        
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
        
    <p class="section-title" id='post-values'>Working with POST values</p>
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
    }
        
    </code></pre>
    
    <p class="section-title" id='query-string-params'>Working with QueryString parameters</p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
    
        // The URL is /blog/?action=show&id=453221
        public function queryStringAction() {
        
            var_dump($this->getQueryString()->get('action')); // string('show')
            var_dump($this->getQueryString()->has('id')); // bool(true)
        
            // Get all the query string values
            $allValues = $this->queryString();
        
        }
        
    </code></pre>
    
    <p class="section-title" id='server-variables'>Working with server variables</p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
        public function serverAction() {
            
            $this->getServer()->set('myKey', 'myValue');
        
            var_dump($this->getServer()->get('myKey')); // string('myValue')
        
            var_dump($this->getServer()->has('myKey')); // bool(true)
        
            var_dump($this->getServer()->remove('myKey'));
            var_dump($this->getServer()->has('myKey')); // bool(false)
        
            // Get all server values
            $allServerValues =  $this->server();
            
        }
    }
        
    </code></pre>
    
    <p class="section-title" id='cookie-values'>Working with cookies</p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
        public function cookieAction() {
        
            $this->getCookie()->set('myKey', 'myValue');
        
            var_dump($this->getCookie()->get('myKey')); // string('myValue')
        
            var_dump($this->getCookie()->has('myKey')); // bool(true)
        
            var_dump($this->getCookie()->remove('myKey'));
            var_dump($this->getCookie()->has('myKey')); // bool(false)
        
            // Get all the cookies
            $cookies = $this->cookies();
        
        }
    }
    
    </code></pre>
    
    <p class="section-title" id='session-values'>Working with session values</p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
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
    
    <p class="section-title" id='config-values'>Working with the config</p>
    <p>Using the <b>getConfig()</b> method we can obtain the config array. This config array is the result of ALL the configs returned from all the modules, merged with your application's global config.</p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
        public function configAction() {
        
            $config = $this->getConfig();
        
            switch($config['mailer']) {
        
                case 'swift':
                    break;
        
                case 'sendgrid':
                    break;
        
                case 'mailchimp':
                    break;
        
            }
        }
    }
    
    </code></pre>
    
    <p class="section-title" id='is-method'>Working with the is() method</p>
    <p>The is() method is a very expressive way of coding and has a variety of options you can send to it. The method always returns a boolean as you are saying <b>"is this the case?"</b></p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
        public function isAction() {
        
            if($this->is('ajax')) {}
        
            if($this->is('post') {}
            if($this->is('patch') {}
            if($this->is('put') {}
            if($this->is('delete') {}
        
            // ssl, https, secure: are all the same thing
            if($this->is('ssl') {}
            if($this->is('https') {}
            if($this->is('secure') {}
            
        }
    }
    
    </code></pre>
    
    <p class="section-title" id='ip-useragent'>Getting the users IP or UserAgent</p>
    <p>Getting the user's IP address or user agent is very trivial.</p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
        public function userAction() {
        
            $userIP = $this->getIP();
            $userAgent = $this->getUserAgent();
        }
    }
    
    </code></pre>
    
    <p class="section-title" id='flash-messages'>Working with flash messages</p>
    <p>A flash message is a notification that the user will see on the <b>next</b> page that is rendered. It's basically a setting stored in the session so when the user hits the next designated page it will display the message, and then disappear from the session. Flash messages in PPI have different <b>types</b>. These types can be <b>'error', 'warning', 'success'</b>, this will determine the color or styling applied to it. For a success message you'll see a positive green message and for an error you'll see a negative red message.</p>
    <p>Review the following action, it is used to delete a blog item and you'll see a different flash message depending on the scenario.</p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
        public function deleteAction() {
        
            $blogID = $this->getPost()->get('blogID');
        
            if(empty($blogID)) {
                $this->setFlash('error', 'Invalid BlogID Specified');
                return $this->redirectToRoute('Blog_Index');
            }
        
            $bs = $this->getBlogStorage();
        
            if(!$bs->existsByID($blogID)) {
                $this->setFlash('error', 'This blog ID does not exist');
                return $this->redirectToRoute('Blog_Index');
            }
        
            $bs->deleteByID($blogID);
            $this->setFlash('success', 'Your blog post has been deleted');
            return $this->redirectToRoute('Blog_Index');
        }
    }
    
    </code></pre>
    
    <p class="section-title" id='get-env'>Getting the current environment</p>
    <p>You may want to perform different scenarios based on the site's environment. This is a configuration value defined in your global application config. The <b>getEnv()</b> method is how it's obtained.</p>
    <pre><code>
    &lt;?php
    namespace Application\Controller;
    
    use Application\Controller\Shared as BaseController;
    
    class Blog extends BaseController {
    
        public function envAction() {
        
            $env = $this->getEnv();
            switch($env) {
                case 'development':
                    break;
        
                case 'staging':
                    break;
        
                case 'production':
                default:
                    break;
                
            }
            
        }
    }
    
    </code></pre>
    
    <!--<a class="prev-article btn btn-green" href="--><?//=$view['router']->generate('DocsIndex', array('page' => 'routing'));?><!--"><i class="icon-arrow-left icon-white"></i> Routing</a>-->
    <!--<a class="next-article bottom btn btn-green" href="--><?//=$view['router']->generate('DocsIndex', array('page' => 'templating'));?><!--" title="templating">Templating <i class="icon-arrow-right icon-white"></i></a>-->
    
    <div class="spacer"></div>
    
    </section>

</div>
</div>