<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <!--  Mobile viewport optimized: j.mp/bplateviewport -->
   	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
   	<title>PPI Framework</title>
   	<meta name="description" content="ppi is an open source php meta-framework. we have taken the good bits from Symfony2, ZendFramework2 & Doctrine2 and combined them together to create a solid and very easy web application framework. ppi is fully PSR compliant. ppi can be considered the boilerplate of PHP frameworks">
    <meta name="keywords" content="ppi is an open source php meta-framework. we have taken the good bits from Symfony2, ZendFramework2 & Doctrine2 and combined them together to create a solid and very easy web application framework. ppi is fully PSR compliant. ppi can be considered the boilerplate of PHP frameworks">
   	<meta name="author" content="Paul Dragoonis">
    
    <meta property="og:title" content="PPI Framework: the php meta framework" />
    <meta property="og:site_name" content="PPI Framework: the php meta framework"/>
    <meta property="og:url" content="http://www.ppi.io"/>
    <meta property="og:type" content="website"> 
    <meta property="og:image" content="<?=$view['assets']->getUrl('images/opengraph.png');?>"/>
    
    <title><?php $view['slots']->output('title', 'PPI Skeleton Application') ?></title>
    
    <!-- CSS Stuff -->
    <link href="<?=$view['assets']->getUrl('css/libs/github-highlight.css');?>" rel="stylesheet">
    <link href="<?=$view['assets']->getUrl('css/libs/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=$view['assets']->getUrl('css/main.css');?>" rel="stylesheet">
    <link href="<?=$view['assets']->getUrl('css/docs.css');?>" rel="stylesheet">
    
    <!-- /CSS Stuff -->
    
    <!-- JS Head Stuff -->
    <script src="<?=$view['assets']->getUrl('js/libs/modernizr-2.5.3.min.js');?>"></script>
    <?php $view['slots']->output('include_js_head'); ?>
    <!-- /JS Head Stuff -->
    
</head>

<body class="docsbase">

    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6. -->
    <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    
    <div class="topbar clearfix docs-header" data-dropdown="dropdown" id="header">
        
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
                                <li><a href="<?=$view['router']->generate('About');?>">About</a></li>
                                <li class=""><a href="<?=$view['router']->generate('Homepage');?>community">Community</a></li>
                                <li class=""><a href="<?=$view['router']->generate('Projects');?>">Projects</a></li>
                                <li class="dropdown docs-dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Documentation <b class="caret icon-white"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=$view['router']->generate('DocsIndex', array('page' => 'getting-started'));?>">Getting Started</a></li>
                                        <li><a href="<?=$view['router']->generate('DocsIndex', array('page' => 'application'));?>">The Skeleton Application</a></li>
                                        <li><a href="<?=$view['router']->generate('DocsIndex', array('page' => 'modules'));?>">Modules</a></li>
                                        <li><a href="<?=$view['router']->generate('DocsIndex', array('page' => 'routing'));?>">Routing</a></li>
                                        <li><a href="<?=$view['router']->generate('DocsIndex', array('page' => 'controllers'));?>">Controllers</a></li>
                                        <li><a href="<?=$view['router']->generate('DocsIndex', array('page' => 'templating'));?>">Templating</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="docspage-content">
        
        <!-- Begin Flash Message Injection -->
        <?php
        $flashNames = array('info' => 'info', 'success' => 'success', 'error' => 'error', 'warning' => 'block', 'notice' => 'block');
        $flashHeadings = array('info' => 'Heads Up!', 'error' => 'Oops!', 'success' => 'Well done!', 'block' => 'Warning!');
        
        if($view['session']->hasFlashes()):
        ?>
        <div class="flashes">
        <?php
            foreach($view['session']->getFlashes() as $flashName => $flashes):
                $alertClass = isset($flashNames[$flashName]) ? $flashNames[$flashName] : 'info';
                foreach($flashes as $flash):
        ?>
                <div class="alert alert-<?=$alertClass?>">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-info-sign"></i>
                    <strong class="alert-heading"><?=$flashHeadings[$alertClass];?></strong>
                    <span><?=$flash;?></span>
                </div>    
        <?php
                    endforeach;
            endforeach;
        ?>
        </div>
        <!-- End of Flash Message Injection -->
        <?php
        endif;
        ?>
        
        <!-- Begin dynamic page output -->
        <div id="action-content">
        <?php $view['slots']->output('_content'); ?>
        </div>
        <!-- End dynamic page output -->
        
    </div>
    
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-20964741-1']);
        _gaq.push(['_trackPageview']);
        
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    
<!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->
    <script>window.jQuery || document.write('<script src="<?=$view['assets']->getUrl('js/libs/jquery-1.8.0.min.js');?>"><\/script>')</script>
    
    <!-- JS Body Stuff -->
    <script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/highlight.js');?>"></script>
    <script type="text/javascript" src="<?=$view['assets']->getUrl('js/docs-child.js');?>"></script>
    <!-- /JS Body Stuff -->

</body>

</html>
