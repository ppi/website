<?php
if(isset($isAjax) && $isAjax == false):
	include_once($viewDir . $actionFile);
else:
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php include($viewDir . 'elements/head.php'); ?>
<body>
<?php include($viewDir . 'elements/header.php'); ?>
<div id="wrapper">
    <section class="main-content-container">
	    <!-- .main-content-contrainer-inner -->
        <div class="main-content-container-inner">
            <div class="header-separator"><div class="fl green-2"></div><div class="fl green-3"></div><div class="fl green-4"></div></div>
	        <!-- .main-content -->
            <div class="fl main-content">
			<?php include_once($viewDir . $actionFile); ?>
            </div>
	        <!-- /.main-content -->
        </div>
	    <!-- /.main-content-container-inner -->
    </section>
</div> <!-- #wrapper -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="scripts/jquery-1.6.1.js"%3E%3C/script%3E'))</script>
<!--<script type="text/javascript" src="--><?//= $baseUrl; ?><!--scripts/common.js"></script>-->
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
<!--[if lt IE 7 ]>
<script src="scripts/libs/dd_belatedpng.js"></script>
<script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg backgrounds </script>
<![endif]-->

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</body>
</html>
<?php
endif;
?>

