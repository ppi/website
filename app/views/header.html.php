<div class="topbar clearfix" data-dropdown="dropdown" id="header">
    <div class="topbar-inner">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="logo-item"><a class="logo" href="<?=$view['router']->generate('Homepage');?>" title="PPI"><img src="<?=$view['assets']->getUrl('images/ppi-white.png');?>" alt="Logo" height="25"></a></li>
                            <li class=""><a href="<?=$view['router']->generate('Homepage');?>">Home</a></li>
                            <li class=""><a href="<?=$view['router']->generate('About');?>">About</a></li>
                            <li class=""><a href="<?=$view['router']->generate('Blog');?>">Blog</a></li>
                            <li class=""><a href="<?=$view['router']->generate('Community');?>">Community</a></li>
                            <li class=""><a href="<?=$view['router']->generate('Downloads');?>">Downloads</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Documentation <b class="caret icon-white"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/getting_started.html">Getting Started</a></li>
                                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/application.html">The Skeleton App</a></li>
                                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/modules.html">Modules</a></li>
                                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/routing.html">Routing</a></li>
                                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/controllers.html">Controllers</a></li>
                                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/templating.html">Templating</a></li>
                                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/services.html">Services</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>