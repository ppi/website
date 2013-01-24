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
    
    <title><?php $view['slots']->output('title', 'PPI Framework') ?></title>
    
    <link href="<?=$view['assets']->getUrl('css/libs/bootstrap.css');?>" rel="stylesheet">
    <link href="<?=$view['assets']->getUrl('css/main.css');?>" rel="stylesheet">
    <link href="<?=$view['assets']->getUrl('css/docs-frame.css');?>" rel="stylesheet">
    <link href="<?=$view['assets']->getUrl('css/docs.css');?>" rel="stylesheet">
    
</head>

<body>

<?= $view->render('::header.html.php'); ?>

<div class="toc-mobile meny" style="">
    <div class="toc-mobile-content">
        <p class="heading">Table of Contents</p>
        <ul class="items"></ul>
    </div>
</div>

<div class="contents" id="frame-container">
    <iframe src="<?=$view['router']->generate('DocsViewFile', array('page' => $page));?>"></iframe>
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

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->
<script>window.jQuery || document.write('<script src="<?=$view['assets']->getUrl('js/libs/jquery-1.8.0.min.js');?>"><\/script>')</script>


<!-- JS Body Stuff -->
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/meny.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/jquery.scrollTo.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/jquery.serialScroll.min.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/jquery.localscroll.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/docs.js');?>"></script>
<!-- /JS Body Stuff -->

</body>
</html>