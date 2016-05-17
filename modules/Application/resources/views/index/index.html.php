<?php $view->extend('::base.html.php'); ?>
<div id="home-page">

    <div class="top-container clearfix">

        <div class="top">
            <div class="intro">
                <div class="heading heading-area">
                    <p class="heading-text">
                        <a class="logo" href="<?= $view['router']->generate('Homepage'); ?>" title="PPI"><img
                                src="<?= $view['assets']->getUrl('images/ppi-white.png'); ?>" alt="Logo"
                                style="height: 40px;"></a>
                        <span>The PHP Framework Engine</span>
                    </p>

                    <div class="social-icons" style="display: none">
                        <a href="http://twitter.com/ppi_framework"
                           tutorial-geolocation-with-foursquare-and-google-mapst="_blank"><img
                                src="<?= $view['assets']->getUrl('images/twitter2.png'); ?>" alt="Twitter" width="38"/></a>
                        <a href="https://plus.google.com/communities/100606932222119087997" target="_blank"><img
                                src="<?= $view['assets']->getUrl('images/googleplus.png'); ?>" width="38"/></a>
                    </div>
                </div>

                <p class="desc">
                    PPI is a framework delivery engine.
                    Using the concept of microservices, it lets you choose which parts of frameworks you wish to use on
                    a per-feature basis.
                    As such each feature makes its own independent decisions, allowing you to pick the best tools from
                    the best PHP frameworks </p>

            </div>
        </div>


    </div>


    <div class="middle clearfix">

        <div class="section-heading">
            <p class="heading-text">Key Features</p>
        </div>

        <ul class="list clearfix">
            <li>
                <a class="title" href="http://docs.ppi.io/latest/book/application.html" title="">Lightweight</a>

                <p class="desc">Everything is component based, so you don't get everything by default, but gradaully
                    slot in what you need</p>
            </li>
            <li>
                <a class="title" href="http://docs.ppi.io/latest/book/modules.html" title="">Clean Modular Design</a>

                <p class="desc">Light and simple modules, extending from Zend Framework's Module system.</p>
            </li>
            <li>
                <a class="title" href="http://docs.ppi.io/latest/book/routing.html" title="">Routing</a>

                <p class="desc">Each feature can pick from a variety of supported routers.</p>
            </li>
            <li>
                <a class="title" href="http://docs.ppi.io/latest/book/templating.html" title="">Templating</a>

                <p class="desc">Each feature can pick from a variety of supported templating engines</p>
            </li>
            <li>
                <a class="title" href="http://docs.ppi.io/latest/book/datasource.html" title="">Databases</a>

                <p class="desc">Our powerful datasource component easily loads up popular DB libraries.</p>
            </li>

            <li>
                <a class="title" href="<?= $view['router']->generate('Community'); ?>" title="">Found issues?</a>

                <p class="desc">Let us know on <a href="https://github.com/ppi" target="_blank">GitHub</a></p>
            </li>

            <li>
                <a class="title" href="<?= $view['router']->generate('Community'); ?>" title="">Get in touch</a>

                <p class="desc">We chat on <a href="https://gitter.im/ppi/framework" target="_blank">Gitter</a></p>
            </li>

            <li>
                <a class="title" href="<?= $view['router']->generate('Community'); ?>" title="">The community</a>

                <p class="desc">and have <a href="/gplus">GooglePlus</a>, <a href="/facebook">Facebook</a> groups, or
                    follow us on <a href="/twitter">Twitter</a>.</p>
            </li>

        </ul>
    </div>


    <div class="news-area">
        <div class="heading heading-area">
            <span>Blog posts</span>
        </div>
        <ul class="posts-list">
            <li>
                <a href="<?= $view['router']->generate('BlogView', array('postID' => '4', 'title' => 'the-official-interview')); ?>"
                   title="">The Official PPI Interview</a></li>
            <li>
                <a href="<?= $view['router']->generate('BlogView', array('postID' => '3', 'title' => 'new-sphinx-powered-documentation-system')); ?>"
                   title="">New Sphinx Powered Documentation System</a></li>
            <li>
                <a href="<?= $view['router']->generate('BlogView', array('postID' => '1', 'title' => 'tutorial-geolocation-with-foursquare-and-google-maps')); ?>"
                   title="">Tutorial: GeoLocation with Foursquare and Google Maps</a></li>
            <li><a href="<?= $view['router']->generate('Blog'); ?>" title="New Blog Launched">New Blog Launched</a>
            </li>
            <li><a href="https://plus.google.com/communities/100606932222119087997"
                   title="Google plus community launched">Google plus community launched</a></li>

        </ul>
    </div>


</div>


<?php $view['slots']->start('include_css'); ?>
<link href="<?= $view['assets']->getUrl('css/home.css'); ?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?= $view['assets']->getUrl('js/home.js'); ?>"></script>
<?php $view['slots']->stop(); ?>
